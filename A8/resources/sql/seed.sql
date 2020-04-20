DROP MATERIALIZED VIEW IF EXISTS "total_question";
DROP MATERIALIZED VIEW IF EXISTS "total_answer";
DROP TABLE IF EXISTS "bookmark";
DROP TABLE IF EXISTS "administrator";
DROP TABLE IF EXISTS "vote_notif";
DROP TABLE IF EXISTS "post_notif";
DROP TABLE IF EXISTS "report_notif";
DROP TABLE IF EXISTS "notification";
DROP TABLE IF EXISTS "report";
DROP TABLE IF EXISTS "edit_log";
DROP TABLE IF EXISTS "vote";
DROP TABLE IF EXISTS "question_category";
DROP TABLE IF EXISTS "category";
DROP TABLE IF EXISTS "comment";
ALTER TABLE IF EXISTS "question"
DROP COLUMN IF EXISTS best_answer;
DROP TABLE IF EXISTS "answer";
DROP TABLE IF EXISTS "question";
DROP TABLE IF EXISTS "post";
DROP TABLE IF EXISTS "member";
DROP TYPE IF EXISTS "report_type";
DROP TYPE IF EXISTS "report_state";
DROP TYPE IF EXISTS "vote_type";

-- Types
CREATE TYPE report_type as ENUM( 
    'Inappropriate Language',
    'Offensive Towards Others',
    'Spreading Misinformation',
    'Spam',
    'Other'
);

CREATE TYPE report_state as ENUM(
    'Unread',
    'Approved',
    'Rejected'
);

CREATE TYPE vote_type as ENUM(
    'Upvote',
    'Downvote'
);

-- Tables
CREATE TABLE "member" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    "name" text NOT NULL,
    "password" text NOT NULL,
    photo_url text NOT NULL DEFAULT 'default.jpg',
    banned BOOLEAN NOT NULL DEFAULT FALSE,
    membership_date date DEFAULT now() NOT NULL, 
    score int NOT NULL DEFAULT 0,
	remember_token text
);

CREATE TABLE "post" (
    id SERIAL PRIMARY KEY,
    author integer REFERENCES "member" (id) NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    text_body text NOT NULL
);

CREATE TABLE "question" (
    post INTEGER PRIMARY KEY REFERENCES "post"(id) ON DELETE CASCADE,
    title text NOT NULL
);

CREATE TABLE "answer" (
    post INTEGER PRIMARY KEY REFERENCES "post"(id) ON DELETE CASCADE,
    question INTEGER  NOT NULL REFERENCES "question" (post) ON DELETE CASCADE
);

ALTER TABLE "question"
ADD COLUMN best_answer INTEGER REFERENCES "answer"(post);

CREATE TABLE "comment" (
    post INTEGER PRIMARY KEY REFERENCES "post"(id) ON DELETE CASCADE,
    answer INTEGER NOT NULL REFERENCES "answer" (post) ON DELETE CASCADE
);

CREATE TABLE "category" (
    id SERIAL PRIMARY KEY,
    name text NOT NULL,
    color INTEGER NOT NULL
);
CREATE TABLE "question_category" (
    question INTEGER NOT NULL REFERENCES "question" (post) ON DELETE CASCADE,
    category INTEGER NOT NULL REFERENCES "category" (id) ON DELETE CASCADE,
    PRIMARY KEY (question, category) 
);

CREATE TABLE "vote" (
    voted INTEGER NOT NULL REFERENCES "answer" (post) ON DELETE CASCADE,
    voter INTEGER NOT NULL REFERENCES "member" (id) ON DELETE CASCADE,
    "value" vote_type NOT NULL,
	PRIMARY KEY (voted, voter) 
);

CREATE TABLE "edit_log" (
    id SERIAL PRIMARY KEY,
    post INTEGER NOT NULL REFERENCES "post"(id) ON DELETE CASCADE,
    edit_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL ,
    old_body text NOT NULL
);

CREATE TABLE "report" (
    id SERIAL PRIMARY KEY,
    reported INTEGER REFERENCES "post"(id) NOT NULL,
    reporter INTEGER REFERENCES "member"(id) NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    "type" report_type NOT NULL,
    offense text,
    "state" report_state NOT NULL DEFAULT 'Unread'
);

CREATE TABLE "notification" (
    id SERIAL PRIMARY KEY,
    notified INTEGER NOT NULL REFERENCES "member"(id) ON DELETE CASCADE,
    "read" BOOLEAN DEFAULT FALSE NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE "post_notif" (
    notif INTEGER PRIMARY KEY REFERENCES "notification"(id) ON DELETE CASCADE,
    post INTEGER NOT NULL REFERENCES "post"(id) ON DELETE CASCADE
);

CREATE TABLE "vote_notif" (
    notif INTEGER PRIMARY KEY REFERENCES "notification"(id) ON DELETE CASCADE,
    voted INTEGER NOT NULL REFERENCES "answer"(post) ON DELETE CASCADE,
    voter INTEGER NOT NULL REFERENCES "member"(id) ON DELETE CASCADE,
    FOREIGN KEY (voted,voter) REFERENCES "vote" ON DELETE CASCADE
);

CREATE TABLE "report_notif" (
    notif INTEGER PRIMARY KEY REFERENCES "notification"(id) ON DELETE CASCADE,
    report INTEGER NOT NULL REFERENCES "report"(id) ON DELETE CASCADE
);

CREATE TABLE "administrator" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    "name" text NOT NULL,
    "password" text NOT NULL
);

CREATE TABLE "bookmark" (
    member INTEGER NOT NULL REFERENCES "member"(id) ON DELETE CASCADE,
    bookmark INTEGER NOT NULL REFERENCES "question"(post) ON DELETE CASCADE,
    PRIMARY KEY (member, bookmark)
);

CREATE MATERIALIZED VIEW total_question AS 
    SELECT post.id as id, author, date, text_body, title, best_answer, 
			name, photo_url, membership_date, score, banned
    FROM post, question, member
    WHERE post.id = question.post and post.author = member.id;

CREATE MATERIALIZED VIEW total_answer AS 
	SELECT post.id as id, author, date, text_body as answer, question, 
			name, photo_url, membership_date, score, banned
	FROM post, answer, member
	WHERE post.id= answer.post and post.author = member.id;

--- TRIGGERS ---
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
	UPDATE report set reporter = 1
		WHERE reporter = OLD.id;
RETURN OLD;
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

	
---------

CREATE OR REPLACE FUNCTION disjoint_question()
	RETURNS trigger AS 
$$
DECLARE answer answer.post%TYPE;
		comment comment.post%TYPE;
BEGIN
	SELECT INTO answer post FROM answer WHERE NEW.post = answer.post;
	SELECT INTO comment post FROM comment WHERE NEW.post = comment.post;
	IF answer IS NULL AND comment IS NULL THEN 
		RETURN NEW;
	END IF;
RETURN NULL;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS question_disjoint on question;
CREATE TRIGGER question_disjoint BEFORE INSERT ON question
	FOR EACH ROW EXECUTE PROCEDURE disjoint_question();
		
---------

CREATE OR REPLACE FUNCTION disjoint_answer()
	RETURNS trigger AS 
$$
DECLARE question question.post%TYPE;
		comment comment.post%TYPE;
BEGIN
	SELECT INTO question post FROM question WHERE NEW.post = question.post;
	SELECT INTO comment post FROM comment WHERE NEW.post = comment.post;
	IF question IS NULL AND comment IS NULL THEN 
		RETURN NEW;
	END IF;
RETURN NULL;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS answer_disjoint on answer;
CREATE TRIGGER answer_disjoint BEFORE INSERT ON answer
	FOR EACH ROW EXECUTE PROCEDURE disjoint_answer();
		
---------

CREATE OR REPLACE FUNCTION disjoint_comment()
	RETURNS trigger AS 
$$
DECLARE answer answer.post%TYPE;
		question question.post%TYPE;
BEGIN
	SELECT INTO answer post FROM answer WHERE NEW.post = answer.post;
	SELECT INTO question post FROM question WHERE NEW.post = question.post;
	IF answer IS NULL AND question IS NULL THEN 
		RETURN NEW;
	END IF;
RETURN NULL;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS comment_disjoint on comment;
CREATE TRIGGER comment_disjoint BEFORE INSERT ON comment
	FOR EACH ROW EXECUTE PROCEDURE disjoint_comment();
	
---------

CREATE OR REPLACE FUNCTION disjoint_post()
	RETURNS trigger AS 
$$
DECLARE vote vote_notif.voted%TYPE;
		report report_notif.report%TYPE;
BEGIN
	SELECT INTO vote notif FROM vote_notif WHERE NEW.notif = vote_notif.voted;
	SELECT INTO report notif FROM report_notif WHERE NEW.notif = report_notif.report;
	IF vote IS NULL AND report IS NULL THEN 
		RETURN NEW;
	END IF;
RETURN NULL;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS post_disjoint on post_notif;
CREATE TRIGGER post_disjoint BEFORE INSERT ON post_notif
	FOR EACH ROW EXECUTE PROCEDURE disjoint_post();
		
---------

CREATE OR REPLACE FUNCTION disjoint_vote()
	RETURNS trigger AS 
$$
DECLARE post post_notif.post%TYPE;
		report report_notif.report%TYPE;
BEGIN
	SELECT INTO post notif FROM post_notif WHERE NEW.notif = post_notif.post;
	SELECT INTO report notif FROM report_notif WHERE NEW.notif = report_notif.report;
	IF post IS NULL AND report IS NULL THEN 
		RETURN NEW;
	END IF;
RETURN NULL;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS vote_disjoint on vote_notif;
CREATE TRIGGER vote_disjoint BEFORE INSERT ON vote_notif
	FOR EACH ROW EXECUTE PROCEDURE disjoint_vote();
	
---------

CREATE OR REPLACE FUNCTION disjoint_report()
	RETURNS trigger AS 
$$
DECLARE vote vote_notif.voted%TYPE;
		post post_notif.post%TYPE;
BEGIN
	SELECT INTO vote notif FROM vote_notif WHERE NEW.notif = vote_notif.voted;
	SELECT INTO post notif FROM post_notif WHERE NEW.notif = post_notif.post;
	IF vote IS NULL AND post IS NULL THEN 
		RETURN NEW;
	END IF;
RETURN NULL;
END
$$ LANGUAGE plpgsql;
DROP TRIGGER IF EXISTS report_disjoint on report_notif;
CREATE TRIGGER report_disjoint BEFORE INSERT ON report_notif
	FOR EACH ROW EXECUTE PROCEDURE disjoint_report();

--- INDEXES ---
--- PERFORMANCE INDEXES ---

-- find the posts of one member
CREATE INDEX post_member ON post USING btree (author);

-- find quickly the answers of one question
CREATE INDEX answer_question ON answer USING btree (question);

-- find quickly the comments of one answer
CREATE INDEX comment_answer ON comment USING btree (answer);

-- find categories of question quickly
CREATE INDEX category_question ON question_category USING btree (question);

-- find votes to one answer
CREATE INDEX vote_answer ON vote USING btree (voted);

-- find edit logs of one post
CREATE INDEX edit_post ON edit_log USING btree (post); 

-- find reports of one post
CREATE INDEX report_post ON report USING btree (reported);

-- find reports by their state
CREATE INDEX report_state ON report USING btree (state);

-- find notifications of one member
CREATE INDEX notif_member ON notification USING btree (notified);

-- find bookmarks of one member
CREATE INDEX bookmark_member ON bookmark USING btree (member);

--- FULL TEXT SEARCH
-- search on title
CREATE INDEX search_title ON question USING gin(to_tsvector('english', title));

--search on text_body
CREATE INDEX search_text ON post USING gist(to_tsvector('english', text_body));

--combined search of view total_question (post + question)
CREATE INDEX search_question ON total_question USING gist( 
    (setweight(to_tsvector('english', title), 'A') || 
    setweight(to_tsvector('english', text_body), 'B') 
));

--- FUNCTIONS --- 
-- add question
CREATE OR REPLACE FUNCTION add_question(author INTEGER, text_body text, title text)
RETURNS VOID AS $$
DECLARE post_id post.id%TYPE;
BEGIN
    INSERT INTO post(author, text_body) VALUES(author, text_body) RETURNING id INTO post_id;
    INSERT INTO question(post, title) VALUES(post_id, title);
	REFRESH MATERIALIZED VIEW total_question;
END;
$$ LANGUAGE plpgsql;

-- add answer
CREATE OR REPLACE FUNCTION add_answer(author INTEGER, text_body text, question INTEGER)
RETURNS VOID AS $$
DECLARE post_id post.id%TYPE;
BEGIN
    INSERT INTO post(author, text_body) VALUES(author, text_body) RETURNING id INTO post_id;
    INSERT INTO answer(post, question) VALUES(post_id, question);
	CLUSTER answer USING answer_question;
	REFRESH MATERIALIZED VIEW total_answer;
END;
$$ LANGUAGE plpgsql;

-- add comment
CREATE OR REPLACE FUNCTION add_comment(author INTEGER, text_body text, answer INTEGER)
RETURNS VOID AS $$
DECLARE post_id post.id%TYPE;
BEGIN
    INSERT INTO post(author, text_body) VALUES(author, text_body) RETURNING id INTO post_id;
    INSERT INTO comment(post, answer) VALUES(post_id, answer);
	CLUSTER comment USING comment_answer;
END;
$$ LANGUAGE plpgsql;

--- Populate --- 
-- NULL ROWS TO ENSURE NOT NULL CONSTRAINS DONT BREAK
INSERT INTO member(email, name, password) VALUES('null@null.com', 'Not a Person', 'unBreakablePassWordNullMember');
INSERT INTO post(author, text_body) VALUES(1, '');

-- Members insert
INSERT INTO member(email, name, password) VALUES ('rita@rita.com',                      'Mateo Watson','zH-38ptu_FlmsZK9QiMGbN1f0'); --2
INSERT INTO member(email, name, password) VALUES ('henrique@henrique.com',              'Isaac Johnson','ERJ-1qztcS.gC9F3uB_LTWrOo'); 
INSERT INTO member(email, name, password) VALUES ('jose@jose.com',                      'Nathan Walker','oN9Jrp.3LPOuMQTf_x0Z-IK7C'); 
INSERT INTO member(email, name, password) VALUES ('david@david.com',                    'Samuel Peterson','ybPadnKXTgjhwD50v1AkoHulf'); 
INSERT INTO member(email, name, password) VALUES ('Ow7aA_c4VHUY2BtE6SD9@kcgaifuzqb.com','Gabriel Wright','UEelc0VPNtXRpLh6TDunr4SYW'); 
INSERT INTO member(email, name, password) VALUES ('rZVq9UseDbMTLp1R0IAk@pawinfqelu.com','Logan Scott','s.dI-f19qHbgX3woEBJ4GivhP'); 
INSERT INTO member(email, name, password) VALUES ('RwTKp4A_UFdWHkt8J-DS@cbnhdysato.com','Caleb White','QEsPAv_cYj.ktXFziyufHCVlM'); 
INSERT INTO member(email, name, password) VALUES ('SAWnP.I-NRdxqeo1Xifk@hrqtwdxnig.com','Matthew Peterson','EhL3xK1RsY2ilSTu4FeMG_O8U'); 
INSERT INTO member(email, name, password) VALUES ('x3ULFg0ze9bhyn1wfu7W@mkbxdrecwg.com','Caleb Roberts','VYb412kueGXsT8JpfA-cd.jUM'); 
INSERT INTO member(email, name, password) VALUES ('V_2uxfYELBXhDpJ3sON7@frmknuczlb.com','Sebastian Davis','._56AjECVR8FBQk2nMGYLIcJD'); 
INSERT INTO member(email, name, password) VALUES ('SL-ktV7YHmNo4nWCGgsO@lixajygfcb.com','Daniel Evans','_Owmbv5hLI-Tx2rnzE0eViC9q'); 
INSERT INTO member(email, name, password) VALUES ('Yo84ytNv-QJ3djcXg0Rn@obeyudsmhq.com','Luke Martin','gdTQ4I1Rpf-_8cbhYPD5.7Xz0'); 
INSERT INTO member(email, name, password) VALUES ('JM6Rymi3Lg.nXucKDvao@vrecazjhdx.com','James Butler','F-83G6nHOsuiXe5jNpPTQMlRf'); 
INSERT INTO member(email, name, password) VALUES ('XWZ5rApe1IsMo8h6vDBV@cirboyhajt.com','Lincoln Wright','qbi21hO4NrxyHX7PGzTeBUs5k'); 
INSERT INTO member(email, name, password) VALUES ('pxw3GsJF_tVK7MDYnRdy@necvwfsqhi.com','Aiden Jackson','40T8wqBnXIz5WZejC6JsVlFL3'); 
INSERT INTO member(email, name, password) VALUES ('k.H3564F1KelBJhLAEDt@tnuihzbwkq.com','Thomas Thompson','Yy0kFfTul9jCtzdhDwsB4MSA3'); 
INSERT INTO member(email, name, password) VALUES ('MDyhLV7pZurYfnl3K.oR@lsxzaibuoe.com','Owen Collins','AUs9Q3bk_cunroP2VSN684C71'); 
INSERT INTO member(email, name, password) VALUES ('hP5jSpNlmcKYCDzB0a3r@etjzvxpqkh.com','Thomas Edwards','.b08dCiAjsyvJOTB3znm9wk_p'); 
INSERT INTO member(email, name, password) VALUES ('Fw5ReL_YETdpCjymJxG0@bldgpqivmc.com','Carter Cook','zCI_Md6LXkjGo4bfYBJ7S.OmZ'); 
INSERT INTO member(email, name, password) VALUES ('DLxeJbX87iKWIl460Y_v@hipztjgodv.com','Julian Evans','utTHCQs1ARYJrNjwhodIiSXEg');
INSERT INTO member(email, name, password) VALUES ('teste@teste.com','Teste Teste','$2y$10$w7Ehqro.QydJYidC8hY9DO1g23r3slmjXANDpVOjUX5EjUWXF4b5K');

-- Questions insert
--2 
SELECT add_question(2, 
    'SO, I have this yellow jacket and I dont know how to wash it. How do I wash it? It is yellow. Please help.', 
    'How do I wash my yellow jacket?');
--3
SELECT add_answer(3,'In order to wash your yellow jacket you need to use special yellow jacket
                        washing soap In order to wash your yellow jacket you need to use special
                        yellow jacket washing soap In order to wash your yellow jacket you need to
                        use special yellow jacket washing soap In order to wash your yellow jacket
                        you need to use special yellow jacket',2);
--4
SELECT add_comment(2, 'Indeed there is a special soap used for yellow jackets! Best answer for me!', 3);

UPDATE question 
    SET best_answer = 3
    WHERE post = 2;
--5
SELECT add_answer(4, 'Soak it in rice... that might work...', 2);

------- other question
--6
SELECT add_question(2, 'How long can meat last in the fridge?','I dont know how long meat can last safe to be eaten');

--7
SELECT add_answer(5, 'About 5 days if uncooked or up to 3 days cooked', 6);

UPDATE question 
    SET best_answer = 7
    WHERE post = 6;

------- other question
--8
SELECT add_question(4, 'How many potatoes should I buy for a week?', 'I am lost in life');

--9
SELECT add_answer(10, 'At least 12 but it depends on how much you like mashed potatoes. I like thamn a lot so I buy 350 ate a time',8);

------- other question
--10
SELECT add_question(17, 'If my elbows are red, should I change washing soap?','My elbows are red');

--11
SELECT add_answer(5, 'You should see a doctor',10);

--12
SELECT add_answer(3, 'Elbows are very sensible to new clothes or different body lotions. If you changed them recently keep that in mind.',10);

-------- other question
--13
SELECT add_question(10, 'Should I buy a pet?', 'I feel lonely and am thinking about buying/adopting a cat or a guinea pig. The only thnig I am not sure is if I would be able to take care of the poor animal since I sometime can be a bit busy with work. Does anyone have some tips and/or recomendations?');

UPDATE post SET text_body = 'I feel lonely and am thinking about buying/adopting a cat or a guinea pig. The only thnig I am not sure is if I would be able to take care of the poor animal since I sometime can be a bit busy with work. Does anyone have some tips and/or recomendations?
EDIT: the cat would be a sphinx because they dont drop too much hair' WHERE id = 13;

--14
SELECT add_answer(12, 'In my opinion you should try a pet rock for a month. Keep a registry of the times you feed it, wash it , or clean its rock toilet. Do it for AT LEAST a month. If you can do that for that long to a rock, you surely can do that to an annoying demon spawn you call sphynx* or an overrated rat',13);
UPDATE question 
    SET best_answer = 14
    WHERE post = 13;

-- Categories
--1
INSERT INTO category(name, color) VALUES('Laundry', 8297984);
--2
INSERT INTO category(name, color) VALUES('Cooking', 16502021);
--3
INSERT INTO category(name, color) VALUES('Health', 16684128);
--4
INSERT INTO category(name, color) VALUES('Finances', 8297984);
--5
INSERT INTO category(name, color) VALUES('Sexuality', 16502021);
--6
INSERT INTO category(name, color) VALUES('Work', 16684128);
--7
INSERT INTO category(name, color) VALUES('Relationships', 8297984);
--8
INSERT INTO category(name, color) VALUES('Household', 16502021);
--9
INSERT INTO category(name, color) VALUES('Pets', 14540253);
--10
INSERT INTO category(name, color) VALUES('Mental Health', 8029935);

-- categories question
INSERT INTO question_category VALUES(2, 1);
INSERT INTO question_category VALUES(6, 2);
INSERT INTO question_category VALUES(8, 2);
INSERT INTO question_category VALUES(10,3);
INSERT INTO question_category VALUES(13,9);

--vote
INSERT INTO vote VALUES(3,2, 'Upvote');
INSERT INTO vote VALUES(3,4, 'Upvote');
INSERT INTO vote VALUES(5,2, 'Downvote');
INSERT INTO vote VALUES(5,6, 'Downvote');
INSERT INTO vote VALUES(5,7, 'Downvote');
INSERT INTO vote VALUES(7,2, 'Downvote');
INSERT INTO vote VALUES(7,3, 'Upvote');
INSERT INTO vote VALUES(7,6, 'Upvote');
INSERT INTO vote VALUES(7,15,'Upvote');
INSERT INTO vote VALUES(9,3, 'Upvote');
INSERT INTO vote VALUES(9,5, 'Downvote');
INSERT INTO vote VALUES(9,8, 'Upvote');
INSERT INTO vote VALUES(11,10,'Upvote');
INSERT INTO vote VALUES(12,4, 'Upvote');
INSERT INTO vote VALUES(12,17,'Upvote');
INSERT INTO vote VALUES(14,8, 'Upvote');
INSERT INTO vote VALUES(14,9, 'Upvote');
INSERT INTO vote VALUES(14,10,'Downvote');
INSERT INTO vote VALUES(14,15,'Upvote');
INSERT INTO vote VALUES(14,19,'Upvote');
INSERT INTO vote VALUES(14,16,'Upvote');

--report
--1
INSERT INTO report(reported, reporter, type, offense) VALUES(5, 2, 'Spreading Misinformation', NULL);

--administrator
INSERT INTO administrator(email, name, password) VALUES('admin@admin.com', 'SUPER ADMIN', 'admin');

--bookmarks
INSERT INTO bookmark VALUES(2,6);
INSERT INTO bookmark VALUES(2,8);
INSERT INTO bookmark VALUES(8,2);
INSERT INTO bookmark VALUES(10,10);
INSERT INTO bookmark VALUES(6,13);
INSERT INTO bookmark VALUES(18,13);