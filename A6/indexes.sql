--- PERFORMANCE INDEXES ---

-- find the posts of one member
CREATE INDEX post_member ON post(author);

-- find quickly the answers of one question
CREATE INDEX answer_question ON answer (question);

-- find quickly the comments of one answer
CREATE INDEX comment_answer ON comment (answer);

-- find categories of question quickly
CREATE INDEX category_question ON question_category (question);

-- find votes to one answer
CREATE INDEX vote_answer ON vote(voted);

-- find edit logs of one post
CREATE INDEX edit_post ON edit_log (post);

-- find reports of one post
CREATE INDEX report_post ON report (reported);

-- find reports by their state
CREATE INDEX report_state ON report(state);

-- find notifications of one member
CREATE INDEX notif_member ON notification(notified);

-- find bookmarks of one member
CREATE INDEX bookmark_member ON bookmark (member);

--- FULL TEXT SEARCH


-- TODO TRIGGERS TO TSVECTOR SEARCH