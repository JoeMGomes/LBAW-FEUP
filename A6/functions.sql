-- add question
CREATE OR REPLACE FUNCTION add_question(author INTEGER, text_body text, title text)
RETURNS VOID AS $$
DECLARE post_id post.id%TYPE;
BEGIN
    INSERT INTO post(author, text_body) VALUES(author, text_body) RETURNING id INTO post_id;
    INSERT INTO question(post, title) VALUES(post_id, title);
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