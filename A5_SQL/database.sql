-- Types

CREATE TYPE report_type as ENUM( 
    'Inappropriate Language',
    'Offensive Towards Others',
    'Spreading Misinformation',
    'Spam',
    'Other'
);

-- Tables

DROP TABLE IF EXISTS "member";
CREATE TABLE "member" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    "name" text NOT NULL,
    "password" text NOT NULL,
    photo_url text,
    score int NOT NULL,
    member_since date DEFAULT now() NOT NULL 
);

DROP TABLE IF EXISTS "post";
CREATE TABLE "post" (
    id SERIAL PRIMARY KEY,
    id_member integer references "member" (id) NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    text_body text NOT NULL
);

DROP TABLE IF EXISTS "question";
CREATE TABLE "question" (
    id_post INTEGER PRIMARY KEY REFERENCES "post"(id),
    title text NOT NULL
);

DROP TABLE IF EXISTS "answer";
CREATE TABLE "answer" (
    id_post INTEGER PRIMARY KEY REFERENCES "post"(id),
    id_question INTEGER REFERENCES "question" (id_post) NOT NULL
);

DROP TABLE IF EXISTS "comment";
CREATE TABLE "comment" (
    id_post INTEGER PRIMARY KEY REFERENCES "post"(id),
    id_answer INTEGER REFERENCES "answer" (id_post) NOT NULL
);

DROP TABLE IF EXISTS "category";
CREATE TABLE "category" (
    id_name text PRIMARY KEY,
    color INTEGER NOT NULL
);

DROP TABLE IF EXISTS "question_category";
CREATE TABLE "question_category" (
    id_question INTEGER REFERENCES "question" (id_post) NOT NULL,
    id_category text REFERENCES "category" (id_name) NOT NULL,
    PRIMARY KEY (id_question, id_category) 
);

DROP TABLE IF EXISTS "vote";
CREATE TABLE "vote" (
    id_answer INTEGER REFERENCES "answer" (id_post) NOT NULL,
    id_member INTEGER REFERENCES "member" (id) NOT NULL,
    "value" INTEGER NOT NULL CHECK(((value = 1) OR (value = -1))),
    PRIMARY KEY (id_answer, id_member) 
);

DROP TABLE IF EXISTS "edit_log";
CREATE TABLE "edit_log" (
    id SERIAL PRIMARY KEY,
    id_post INTEGER REFERENCES "post"(id) NOT NULL,
    edit_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL CHECK(edit_date > id_post.date),
    old_body text NOT NULL
);

DROP TABLE IF EXISTS "report";
CREATE TABLE "report" (
    id_post INTEGER REFERENCES "post"(id) NOT NULL,
    id_member INTEGER REFERENCES "member"(id) NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    "type" report_type NOT NULL,
    offense text,
    PRIMARY KEY (id_post, id_member)
);

DROP TABLE IF EXISTS "best_answer";
CREATE TABLE "best_answer" (
    id_question INTEGER REFERENCES "question"(id_post) NOT NULL,
    id_answer INTEGER REFERENCES "answer"(id_post) NOT NULL,
    PRIMARY KEY (id_question, id_answer)
);

DROP TABLE IF EXISTS "notification";
CREATE TABLE "notification" (
    id SERIAL PRIMARY KEY,
    id_member INTEGER REFERENCES "member"(id) NOT NULL,
    read BOOLEAN DEFAULT FALSE NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

DROP TABLE IF EXISTS "post_notif";
CREATE TABLE "post_notif" (
    id_notif INTEGER PRIMARY KEY REFERENCES "notification"(id),
    id_post INTEGER REFERENCES "post"(id)
);

DROP TABLE IF EXISTS "vote_notif";
CREATE TABLE "vote_notif" (
    id_notif INTEGER PRIMARY KEY REFERENCES "notification"(id),
    id_member INTEGER REFERENCES "member"(id),
    id_answer INTEGER REFERENCES "answer"(id_post),
    FOREIGN KEY (id_member,id_answer) REFERENCES "vote"
);

DROP TABLE IF EXISTS "administrator";
CREATE TABLE "administrator" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    "name" text NOT NULL,
    "password" text NOT NULL
);