-- Types

DROP TABLE IF EXISTS "administrator";
DROP TABLE IF EXISTS "vote_notif";
DROP TABLE IF EXISTS "post_notif";
DROP TABLE IF EXISTS "notification";
DROP TABLE IF EXISTS "best_answer";
DROP TABLE IF EXISTS "report";
DROP TABLE IF EXISTS "edit_log";
DROP TABLE IF EXISTS "vote";
DROP TABLE IF EXISTS "question_category";
DROP TABLE IF EXISTS "category";
DROP TABLE IF EXISTS "comment";
DROP TABLE IF EXISTS "answer";
DROP TABLE IF EXISTS "question";
DROP TABLE IF EXISTS "post";
DROP TABLE IF EXISTS "member";
DROP TYPE IF EXISTS "report_type";

CREATE TYPE report_type as ENUM( 
    'Inappropriate Language',
    'Offensive Towards Others',
    'Spreading Misinformation',
    'Spam',
    'Other'
);

-- Tables

CREATE TABLE "member" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    "name" text NOT NULL,
    "password" text NOT NULL,
    photo_url text,
    banned BOOLEAN NOT NULL DEFAULT FALSE,
    membership_date date DEFAULT now() NOT NULL, 
    score int NOT NULL
);

CREATE TABLE "post" (
    id SERIAL PRIMARY KEY,
    id_member integer references "member" (id) NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    text_body text NOT NULL
);

CREATE TABLE "question" (
    id_post INTEGER PRIMARY KEY REFERENCES "post"(id),
    title text NOT NULL
);

CREATE TABLE "answer" (
    id_post INTEGER PRIMARY KEY REFERENCES "post"(id),
    id_question INTEGER REFERENCES "question" (id_post) NOT NULL
);

CREATE TABLE "comment" (
    id_post INTEGER PRIMARY KEY REFERENCES "post"(id),
    id_answer INTEGER REFERENCES "answer" (id_post) NOT NULL
);

CREATE TABLE "category" (
    id_name text PRIMARY KEY,
    color INTEGER NOT NULL
);

CREATE TABLE "question_category" (
    id_question INTEGER REFERENCES "question" (id_post) NOT NULL,
    id_category text REFERENCES "category" (id_name) NOT NULL,
    PRIMARY KEY (id_question, id_category) 
);

CREATE TABLE "vote" (
    id_answer INTEGER REFERENCES "answer" (id_post) NOT NULL,
    id_member INTEGER REFERENCES "member" (id) NOT NULL,
    "value" INTEGER NOT NULL CHECK(((value = 1) OR (value = -1))),
    PRIMARY KEY (id_answer, id_member) 
);

CREATE TABLE "edit_log" (
    id SERIAL PRIMARY KEY,
    id_post INTEGER REFERENCES "post"(id) NOT NULL,
    edit_date TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL ,
    old_body text NOT NULL
);

CREATE TABLE "report" (
    id_post INTEGER REFERENCES "post"(id) NOT NULL,
    id_member INTEGER REFERENCES "member"(id) NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL,
    "type" report_type NOT NULL,
    offense text,
    "state" INTEGER NOT NULL DEFAULT 0 CHECK(((state = -1) OR (state = 0) OR (state = 1))),
    PRIMARY KEY (id_post, id_member)
);

CREATE TABLE "best_answer" (
    id_question INTEGER REFERENCES "question"(id_post) NOT NULL,
    id_answer INTEGER REFERENCES "answer"(id_post) NOT NULL,
    PRIMARY KEY (id_question, id_answer)
);

CREATE TABLE "notification" (
    id SERIAL PRIMARY KEY,
    id_member INTEGER REFERENCES "member"(id) NOT NULL,
    "read" BOOLEAN DEFAULT FALSE NOT NULL,
    "date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL
);

CREATE TABLE "post_notif" (
    id_notif INTEGER PRIMARY KEY REFERENCES "notification"(id),
    id_post INTEGER REFERENCES "post"(id)
);

CREATE TABLE "vote_notif" (
    id_notif INTEGER PRIMARY KEY REFERENCES "notification"(id),
    id_member INTEGER REFERENCES "member"(id),
    id_answer INTEGER REFERENCES "answer"(id_post),
    FOREIGN KEY (id_member,id_answer) REFERENCES "vote"
);

CREATE TABLE "administrator" (
    id SERIAL PRIMARY KEY,
    email text NOT NULL UNIQUE,
    "name" text NOT NULL,
    "password" text NOT NULL
);