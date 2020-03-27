SELECT author from post, answer WHERE (post.id = answer.post);

CREATE OR REPLACE FUNCTION update_member_score()
  RETURNS trigger AS
$vote_count$
BEGIN
	IF NEW.value = "Upvote" THEN
		UPDATE member
			SET score = score + 1
			WHERE (id = (SELECT author from post, answer WHERE (post.id = answer.post AND NEW.voted = awnser.post)));
	ELSE
		UPDATE member
			SET score = score - 1
			WHERE (id = (SELECT author from post, answer WHERE (post.id = answer.post AND NEW.voted = awnser.post)));
	END IF;
   RETURN NEW;
END;
$vote_count$ LANGUAGE plpgsql;

DROP TRIGGER IF EXISTS "vote_count" ON "vote";
CREATE TRIGGER vote_count BEFORE INSERT ON "vote"
    FOR EACH ROW EXECUTE PROCEDURE update_member_score();