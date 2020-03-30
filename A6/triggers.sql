CREATE OR REPLACE FUNCTION update_member_score()
  RETURNS trigger AS
$$
BEGIN
	IF NEW.value = 'Upvote' THEN
		UPDATE member
			SET score = score + 1
			WHERE (id = (SELECT author from post, answer WHERE (post.id = answer.post AND NEW.voted = answer.post)));
	ELSE
		UPDATE member
			SET score = score - 1
			WHERE (id = (SELECT author from post, answer WHERE (post.id = answer.post AND NEW.voted = answer.post)));
	END IF;
   RETURN NEW;
END;
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS "vote_count" ON "vote";
CREATE TRIGGER vote_count BEFORE INSERT ON "vote"
    FOR EACH ROW EXECUTE PROCEDURE update_member_score();

--------

CREATE OR REPLACE FUNCTION update_member_best_answer_score()
	RETURNS trigger AS
$$
DECLARE member_to_update post.author%TYPE;
BEGIN
	IF OLD.best_answer <> NEW.best_answer THEN
		SELECT INTO member_to_update author FROM post WHERE NEW.best_answer = post.id;
		UPDATE member
			SET score = score + 10
			WHERE member_to_update = member.id;
	END IF;
RETURN NEW;
END;
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS best_answer_score on question;
CREATE TRIGGER best_answer_score BEFORE UPDATE ON question
	FOR EACH ROW EXECUTE PROCEDURE update_member_best_answer_score();

--------

CREATE OR REPLACE FUNCTION update_member_score_report()
	RETURNS trigger AS
$$
DECLARE member_to_update post.author%TYPE;
BEGIN
	SELECT INTO member_to_update author FROM post WHERE (NEW.reported = post.id);
	IF NEW.state = 'Approved' THEN
		UPDATE member SET score = score - 10 WHERE "member".id = member_to_update;
	END IF;
RETURN NEW;
END;
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS report_score ON report;
CREATE TRIGGER report_score AFTER UPDATE ON report
    FOR EACH ROW EXECUTE PROCEDURE update_member_score_report();

--------
	
CREATE OR REPLACE FUNCTION ban_member()
	RETURNS trigger AS
$$
DECLARE member_reports SMALLINT;
DECLARE member_reported post.author%TYPE;
BEGIN
	SELECT INTO member_reported author FROM post WHERE (NEW.reported = post.id);
	IF NEW.state = 'Approved' THEN
		SELECT INTO member_reports count(post.id) FROM report, post WHERE (post.author = member_reported AND report.reported = post.id AND report.state = 'Approved');
		IF member_reports >= 5 THEN
			UPDATE "member" SET banned = TRUE WHERE id = member_reported;
		END IF;
	END IF;
RETURN NEW;
END;
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS "ban" ON "report";
CREATE TRIGGER ban AFTER UPDATE ON "report"
    FOR EACH ROW EXECUTE PROCEDURE ban_member();

--------
	
CREATE OR REPLACE FUNCTION max_categories()
	RETURNS trigger AS
$$
DECLARE num_categories SMALLINT;
BEGIN
	SELECT INTO num_categories count(*)
		FROM question_category
		WHERE NEW.question = question_category.question;
	IF num_categories >= 5 THEN
		RAISE EXCEPTION 'A question can only have a maximum of 5 categories';
	END IF;
	RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS "check_max_categories" ON "question_category";
CREATE TRIGGER check_max_categories BEFORE INSERT on question_category
	FOR EACH ROW EXECUTE PROCEDURE max_categories();

--------

CREATE OR REPLACE FUNCTION min_categories()
	RETURNS trigger AS
$$
DECLARE num_categories SMALLINT;
BEGIN
	SELECT INTO num_categories count(*)
		FROM question_category
		WHERE NEW.question = question_category.question;
	IF num_categories <= 1 THEN
        RAISE EXCEPTION 'A question must have at least 1 category';
	END IF;
	RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS "check_min_categories" ON "question_category";
CREATE TRIGGER check_min_categories BEFORE DELETE on question_category
	FOR EACH ROW EXECUTE PROCEDURE min_categories();

--------

CREATE OR REPLACE FUNCTION notification_comment()
	RETURNS trigger AS 
$$
DECLARE notification_id notification.id%TYPE;
DECLARE author_post post.author%TYPE;
BEGIN
	SELECT INTO author_post author FROM post WHERE NEW.post = post.id;
 	INSERT INTO notification(notified) VALUES (author_post) RETURNING id INTO notification_id;
	INSERT INTO post_notif VALUES (notification_id, NEW.post);
	RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS comment_notification on "comment";
CREATE TRIGGER comment_notification AFTER INSERT on "comment"
	FOR EACH ROW EXECUTE PROCEDURE notification_comment();

--------

CREATE OR REPLACE FUNCTION notification_answer()
	RETURNS trigger AS 
$$
DECLARE notification_id notification.id%TYPE;
DECLARE author_post post.author%TYPE;
BEGIN
	SELECT INTO author_post author FROM post WHERE NEW.post = post.id;
 	INSERT INTO notification(notified) VALUES (author_post) RETURNING id INTO notification_id;
	INSERT INTO post_notif VALUES (notification_id, NEW.post);
	RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS answer_notification on "answer";
CREATE TRIGGER answer_notification AFTER INSERT on "answer"
	FOR EACH ROW EXECUTE PROCEDURE notification_answer();

--------

CREATE OR REPLACE FUNCTION notification_vote()
	RETURNS trigger AS 
$$
DECLARE notification_id notification.id%TYPE;
DECLARE author_post post.author%TYPE;
BEGIN
	IF NEW.value = 'Upvote' THEN
		SELECT INTO author_post author FROM post, answer WHERE (NEW.voted = answer.post);
 		INSERT INTO notification(notified) VALUES (author_post) RETURNING id INTO notification_id;
		INSERT INTO vote_notif VALUES (notification_id, NEW.voted, NEW.voter);
	END IF;
	RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS vote_notification on "vote";
CREATE TRIGGER vote_notification AFTER INSERT on "vote"
	FOR EACH ROW EXECUTE PROCEDURE notification_vote();

-------

CREATE OR REPLACE FUNCTION log_edit()
	RETURNS trigger AS
$$
BEGIN
	IF NEW.text_body = OLD.text_body THEN
	RETURN NULL;
	ELSE
		INSERT INTO edit_log(post, old_body) VALUES (OLD.id, OLD.text_body);
	END IF;
RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS edit_log on post;
CREATE TRIGGER edit_log AFTER UPDATE on post
	FOR EACH ROW EXECUTE PROCEDURE log_edit();

------

CREATE OR REPLACE FUNCTION self_vote()
	RETURNS trigger AS
$$
DECLARE author_post post.author%TYPE;
BEGIN
	SELECT INTO author_post author FROM post, answer WHERE (NEW.voted = answer.post AND answer.post = post.id);
	IF NEW.voter = author_post THEN
		RAISE EXCEPTION 'A member cannot upvote itself';
		RETURN NULL;
	END IF;
RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS vote_self on vote;
CREATE TRIGGER vote_self BEFORE INSERT on vote
	FOR EACH ROW EXECUTE PROCEDURE self_vote();

------

CREATE OR REPLACE FUNCTION self_report()
	RETURNS trigger AS
$$
DECLARE author_post post.author%TYPE;
BEGIN
	SELECT INTO author_post author FROM post WHERE NEW.reported = post.id;
	IF NEW.reporter = author_post THEN
		RAISE EXCEPTION 'A member cannot report itself';
		RETURN NULL;
	END IF;
RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS report_self on report;
CREATE TRIGGER report_self BEFORE INSERT on report
	FOR EACH ROW EXECUTE PROCEDURE self_report();

------

CREATE OR REPLACE FUNCTION delete_user()
 	RETURNS trigger AS 
$$
BEGIN
	UPDATE post set author = 1
		WHERE author = OLD.id;
	UPDATE vote set voter = 1
		WHERE voter = OLD.id;
	UPDATE report set reporter = 1
		WHERE reporter = OLD.id;
	UPDATE vote_notif set voter = 1
		WHERE voter = OLD.id;
RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS user_delete on member;
CREATE TRIGGER user_delete BEFORE DELETE on member
	FOR EACH ROW EXECUTE PROCEDURE delete_user();

-----

CREATE OR REPLACE FUNCTION report_notification()
	RETURNS trigger AS
$$
DECLARE notification_id notification.id%TYPE;
DECLARE author_post post.author%TYPE;
BEGIN
	SELECT INTO author_post author FROM  post WHERE OLD.reported = post.id;
	IF NEW.STATE = 'Approved' THEN
 		INSERT INTO notification(notified) VALUES (author_post) RETURNING id INTO notification_id;
		INSERT INTO report_notif VALUES (notification_id, NEW.id); 
	END IF;
RETURN NEW;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS notification_report on report;
CREATE TRIGGER notification_report AFTER UPDATE on report
	FOR EACH ROW EXECUTE PROCEDURE report_notification();

