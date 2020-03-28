
-- NULL ROWS TO ENSURE NOT NULL CONSTRAINS DONT BREAK
INSERT INTO member VALUES('null@null.com', 'Not a Person', 'unBreakablePassWordNullMember');
INSERT INTO post VALUES(1, DEFAULT, "");

-- Members insert
INSERT INTO "member" VALUES ("rita@rita.com",                      "Mateo Watson","zH-38ptu_FlmsZK9QiMGbN1f0"); --2
INSERT INTO "member" VALUES ("henrique@henrique.com",              "Isaac Johnson","ERJ-1qztcS.gC9F3uB_LTWrOo"); 
INSERT INTO "member" VALUES ("jose@jose.com",                      "Nathan Walker","oN9Jrp.3LPOuMQTf_x0Z-IK7C"); 
INSERT INTO "member" VALUES ("david@david.com",                    "Samuel Peterson","ybPadnKXTgjhwD50v1AkoHulf"); 
INSERT INTO "member" VALUES ("Ow7aA_c4VHUY2BtE6SD9@kcgaifuzqb.com","Gabriel Wright","UEelc0VPNtXRpLh6TDunr4SYW"); 
INSERT INTO "member" VALUES ("rZVq9UseDbMTLp1R0IAk@pawinfqelu.com","Logan Scott","s.dI-f19qHbgX3woEBJ4GivhP"); 
INSERT INTO "member" VALUES ("RwTKp4A_UFdWHkt8J-DS@cbnhdysato.com","Caleb White","QEsPAv_cYj.ktXFziyufHCVlM"); 
INSERT INTO "member" VALUES ("SAWnP.I-NRdxqeo1Xifk@hrqtwdxnig.com","Matthew Peterson","EhL3xK1RsY2ilSTu4FeMG_O8U"); 
INSERT INTO "member" VALUES ("x3ULFg0ze9bhyn1wfu7W@mkbxdrecwg.com","Caleb Roberts","VYb412kueGXsT8JpfA-cd.jUM"); 
INSERT INTO "member" VALUES ("V_2uxfYELBXhDpJ3sON7@frmknuczlb.com","Sebastian Davis","._56AjECVR8FBQk2nMGYLIcJD"); 
INSERT INTO "member" VALUES ("SL-ktV7YHmNo4nWCGgsO@lixajygfcb.com","Daniel Evans","_Owmbv5hLI-Tx2rnzE0eViC9q"); 
INSERT INTO "member" VALUES ("Yo84ytNv-QJ3djcXg0Rn@obeyudsmhq.com","Luke Martin","gdTQ4I1Rpf-_8cbhYPD5.7Xz0"); 
INSERT INTO "member" VALUES ("JM6Rymi3Lg.nXucKDvao@vrecazjhdx.com","James Butler","F-83G6nHOsuiXe5jNpPTQMlRf"); 
INSERT INTO "member" VALUES ("XWZ5rApe1IsMo8h6vDBV@cirboyhajt.com","Lincoln Wright","qbi21hO4NrxyHX7PGzTeBUs5k"); 
INSERT INTO "member" VALUES ("pxw3GsJF_tVK7MDYnRdy@necvwfsqhi.com","Aiden Jackson","40T8wqBnXIz5WZejC6JsVlFL3"); 
INSERT INTO "member" VALUES ("k.H3564F1KelBJhLAEDt@tnuihzbwkq.com","Thomas Thompson","Yy0kFfTul9jCtzdhDwsB4MSA3"); 
INSERT INTO "member" VALUES ("MDyhLV7pZurYfnl3K.oR@lsxzaibuoe.com","Owen Collins","AUs9Q3bk_cunroP2VSN684C71"); 
INSERT INTO "member" VALUES ("hP5jSpNlmcKYCDzB0a3r@etjzvxpqkh.com","Thomas Edwards",".b08dCiAjsyvJOTB3znm9wk_p"); 
INSERT INTO "member" VALUES ("Fw5ReL_YETdpCjymJxG0@bldgpqivmc.com","Carter Cook","zCI_Md6LXkjGo4bfYBJ7S.OmZ"); 
INSERT INTO "member" VALUES ("DLxeJbX87iKWIl460Y_v@hipztjgodv.com","Julian Evans","utTHCQs1ARYJrNjwhodIiSXEg"); --21

-- Questions insert
--2
DECLARE post_id post.id%TYPE; 
INSERT INTO "post" VALUES (2, DEFAULT, "SO, I have this yellow jacket and I don't know how to wash it. How do I wash it? It is yellow. Please help.") RETURNING id INTO post_id;
INSERT INTO "question" VALUES(post_id, "How do I wash my yellow jacket?");
--3
DECLARE post_id2 post.id%TYPE;
INSERT INTO "post" VALUES(3, DEFAULT, "In order to wash your yellow jacket you need to use special yellow jacket
                        washing soap In order to wash your yellow jacket you need to use special
                        yellow jacket washing soap In order to wash your yellow jacket you need to
                        use special yellow jacket washing soap In order to wash your yellow jacket
                        you need to use special yellow jacket") RETURNING id INTO post_id2;
INSERT INTO "answer" VALUES(post_id2,post_id);
--4
DECLARE post_id3 post.id%TYPE;
INSERT INTO "post" VALUES(2, DEFAULT, "Indeed there is a special soap used for yellow jackets! Best answer for me!") RETURNING id INTO post_id3;
INSERT INTO "comment" VALUES(post_id3, post_id2);

UPDATE "question" 
    SET best_answer = post_id2
    WHERE post = post_id;
--5
INSERT INTO "post" VALUES(4, DEFAULT, "Soak it in rice... that might work...") RETURNING id INTO post_id2;
INSERT INTO "answer" VALUES(post_id2,post_id);

-- other question
--6
INSERT INTO "post" VALUES (2, DEFAULT, "How long can meat last in the fridge?") RETURNING id INTO post_id;
INSERT INTO "question" VALUES(post_id, "I don't know how long meat can last safe to be eaten");
--7
INSERT INTO "post" VALUES(5, DEFAULT, "About 5 days if uncooked or up to 3 days cooked") RETURNING id INTO post_id2;
INSERT INTO "answer" VALUES(post_id2,post_id);

UPDATE "question" 
    SET best_answer = post_id2
    WHERE post = post_id;

-- other question
--8
INSERT INTO "post" VALUES (4, DEFAULT, "How many potatoes should I buy for a week?") RETURNING id INTO post_id;
INSERT INTO "question" VALUES(post_id, "I'm lost in life");
--9
INSERT INTO "post" VALUES(10, DEFAULT, "At least 12 but it depends on how much you like mashed potatoes. I like thamn a lot so I buy 350 ate a time") RETURNING id INTO post_id2;
INSERT INTO "answer" VALUES(post_id2,post_id);

-- other question
--10
INSERT INTO "post" VALUES (17, DEFAULT, "If my elbows are red, should I change washing soap?") RETURNING id INTO post_id;
INSERT INTO "question" VALUES(post_id, "My elbows are red");
--11
INSERT INTO "post" VALUES(5, DEFAULT, "You should see a doctor") RETURNING id INTO post_id2;
INSERT INTO "answer" VALUES(post_id2,post_id);
--12
INSERT INTO "post" VALUES(3, DEFAULT, "Elbows are very sensible to new clothes or different body lotions. If you changed them recently keep that in mind.") RETURNING id INTO post_id2;
INSERT INTO "answer" VALUES(post_id2,post_id);

-- other question
--13
INSERT INTO "post" VALUES (10, DEFAULT, "Should I buy a pet?") RETURNING id INTO post_id;
INSERT INTO "question" VALUES(post_id, "I feel lonely and am thinking about buying/adopting a cat or a guinea pig. The only thnig I am not sure is if I would be able to take care of the poor animal since I sometime can be a bit busy with work. Does anyone have some tips and/or recomendations?
EDIT: the cat would be a sphinx because they dont drop too much hair");
--14
INSERT INTO "post" VALUES(12, DEFAULT, "In my opinion you should try a pet rock for a month. Keep a registry of the times you feed it, wash it , or clean its rock toilet. Do it for AT LEAST a month. If you can do that for that long to a rock, you surely can do that to an annoying demon spawn you call sphynx* or an overrated rat") RETURNING id INTO post_id2;
INSERT INTO "answer" VALUES(post_id2,post_id);

UPDATE "question" 
    SET best_answer = post_id2
    WHERE post = post_id;


-- Categories
INSERT INTO "category" VALUES("Laundry", 8297984);
INSERT INTO "category" VALUES("Cooking", 16502021);
INSERT INTO "category" VALUES("Health", 16684128);
INSERT INTO "category" VALUES("Finances", 8297984);
INSERT INTO "category" VALUES("Sexuality", 16502021);
INSERT INTO "category" VALUES("Work", 16684128);
INSERT INTO "category" VALUES("Relationships", 8297984);
INSERT INTO "category" VALUES("Household", 16502021);
INSERT INTO "category" VALUES("Pets", 14540253);
INSERT INTO "category" VALUES("Mental Health", 8029935);

-- categories question
INSERT INTO "question_category" VALUES(2, "Laundry");
INSERT INTO "question_category" VALUES(6, "Cooking");
INSERT INTO "question_category" VALUES(8, "Cooking");
INSERT INTO "question_category" VALUES(10, "Health");
INSERT INTO "question_category" VALUES(13,"Pets");

--vote
INSERT INTO "vote" VALUES(3,2, "Upvote");
INSERT INTO "vote" VALUES(3,4, "Upvote");
INSERT INTO "vote" VALUES(5,2, "Downvote");
INSERT INTO "vote" VALUES(5,6, "Downvote");
INSERT INTO "vote" VALUES(5,7, "Downvote");
INSERT INTO "vote" VALUES(7,2, "Downvote");
INSERT INTO "vote" VALUES(7,3, "Upvote");
INSERT INTO "vote" VALUES(7,6, "Upvote");
INSERT INTO "vote" VALUES(7,15,"Upvote");
INSERT INTO "vote" VALUES(9,3, "Upvote");
INSERT INTO "vote" VALUES(9,5, "Downvote");
INSERT INTO "vote" VALUES(9,8, "Upvote");
INSERT INTO "vote" VALUES(11,10,"Upvote");
INSERT INTO "vote" VALUES(12,4, "Upvote");
INSERT INTO "vote" VALUES(12,17,"Upvote");
INSERT INTO "vote" VALUES(14,8, "Upvote");
INSERT INTO "vote" VALUES(14,9, "Upvote");
INSERT INTO "vote" VALUES(14,10,"Downvote");
INSERT INTO "vote" VALUES(14,15,"Upvote");
INSERT INTO "vote" VALUES(14,19,"Upvote");
INSERT INTO "vote" VALUES(14,16,"Upvote");

--edit log
INSERT INTO "edit_log" VALUES(13,DEFAULT,"I feel lonely and am thinking about buying/adopting a cat or a guinea pig. The only thnig I am not sure is if I would be able to take care of the poor animal since I sometime can be a bit busy with work. Does anyone have some tips and/or recomendations?");

--report
--1
INSERT INTO "report" VALUES(5, 2, DEFAULT, "Spreading Misinformation", NULL, DEFAULT);

--administrator
INSERT INTO "administrator" VALUES("admin@admin.com", "SUPER ADMIN", "admin");

--bookmarks
INSERT INTO "bookmark" VALUES(2,6);
INSERT INTO "bookmark" VALUES(2,8);
INSERT INTO "bookmark" VALUES(8,2);
INSERT INTO "bookmark" VALUES(10,10);
INSERT INTO "bookmark" VALUES(6,13);
INSERT INTO "bookmark" VALUES(18,13);

--notifications

--post_notif
--1
INSERT INTO "notifications" VALUES(2, DEFAULT, DEFAULT);
INSERT INTO "post_notif" VALUES(1, 3);
--2
INSERT INTO "notifications" VALUES(3, DEFAULT, DEFAULT);
INSERT INTO "post_notif" VALUES(2, 2);
--3
INSERT INTO "notifications" VALUES(2, DEFAULT, DEFAULT);
INSERT INTO "post_notif" VALUES(3, 5);
--4
INSERT INTO "notifications" VALUES(2, DEFAULT, DEFAULT);
INSERT INTO "post_notif" VALUES(4, 7);
--5
INSERT INTO "notifications" VALUES(4, DEFAULT, DEFAULT);
INSERT INTO "post_notif" VALUES(5, 9);
--6
INSERT INTO "notifications" VALUES(17, DEFAULT, DEFAULT);
INSERT INTO "post_notif" VALUES(6, 11);
--7
INSERT INTO "notifications" VALUES(17, DEFAULT, DEFAULT);
INSERT INTO "post_notif" VALUES(7, 12);
--8
INSERT INTO "notifications" VALUES(10, DEFAULT, DEFAULT);
INSERT INTO "post_notif" VALUES(8, 14);

--vote_notif
--9
INSERT INTO "notifications" VALUES(3, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(9, 3, 2);
--10
INSERT INTO "notifications" VALUES(3, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(10, 3, 4);
--11
INSERT INTO "notifications" VALUES(5, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(11, 7, 3);
--12
INSERT INTO "notifications" VALUES(5, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(12, 7, 6);
--13
INSERT INTO "notifications" VALUES(5, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(13, 7, 15);
--14
INSERT INTO "notifications" VALUES(10, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(14, 9, 3);
--15
INSERT INTO "notifications" VALUES(10, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(15, 9, 8);
--16
INSERT INTO "notifications" VALUES(5, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(16, 11, 10);
--17
INSERT INTO "notifications" VALUES(3, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(17, 12, 4);
--18
INSERT INTO "notifications" VALUES(3, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(18, 12, 17);
--19
INSERT INTO "notifications" VALUES(12, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(19, 14, 8);
--20
INSERT INTO "notifications" VALUES(12, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(20, 14, 9);
--21
INSERT INTO "notifications" VALUES(12, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(21, 14, 15);
--22
INSERT INTO "notifications" VALUES(12, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(22, 14, 19);
--23
INSERT INTO "notifications" VALUES(12, DEFAULT, DEFAULT);
INSERT INTO "vote_notif" VALUES(23, 14, 6);

--report_notif
--24
INSERT INTO "notifications" VALUES(4, DEFAULT, DEFAULT);
INSERT INTO "report_notif" VALUES(24, 1);