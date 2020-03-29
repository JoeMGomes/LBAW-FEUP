CREATE OR REPLACE FUNCTION update_member_score()
  RETURNS trigger AS
$vote_count$
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
$vote_count$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS "vote_count" ON "vote";
CREATE TRIGGER vote_count BEFORE INSERT ON "vote"
    FOR EACH ROW EXECUTE PROCEDURE update_member_score();

--------
	
CREATE OR REPLACE FUNCTION ban_member()
	RETURNS trigger AS
$ban$
BEGIN
	--DELETE from post
	--WHERE () 
END;
$ban$ LANGUAGE plpgsql;

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