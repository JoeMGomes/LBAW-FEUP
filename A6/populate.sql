
-- NULL ROWS TO ENSURE NOT NULL CONSTRAINS DONT BREAK
INSERT INTO member VALUES('null@null.com', 'Not a Person', 'unBreakablePassWordNullMember');
INSERT INTO post VALUES(1, DEFAULT, "");

-- Members insert
INSERT INTO "member" VALUES ("d5HuzL0s-y4rX8T_wJdD@oxtcvkdfwg.com","Mateo Watson","zH-38ptu_FlmsZK9QiMGbN1f0"); --2
INSERT INTO "member" VALUES ("FZTnL_yfpSrVREwCl5NB@zokmpvafsh.com","Isaac Johnson","ERJ-1qztcS.gC9F3uB_LTWrOo"); 
INSERT INTO "member" VALUES ("59e7izr3dFQPsjxvOotJ@dfehcpwjar.com","Nathan Walker","oN9Jrp.3LPOuMQTf_x0Z-IK7C"); 
INSERT INTO "member" VALUES ("FQH-1Ko95txZen8v620L@ectyhrpnqx.com","Samuel Peterson","ybPadnKXTgjhwD50v1AkoHulf"); 
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
DECLARE post_id post.id%TYPE; 
INSERT INTO "post" VALUES (2, DEFAULT, "SO, I have this yellow jacket and I don't know how to wash it. How do I wash it? It is yellow. Please help.") RETURNING id INTO post_id;
INSERT INTO "question" VALUES(post_id, "How do I wash my yellow jacket?");