DROP TABLE if exists USER;
DROP TABLE if exists PRODUCT; 
DROP TABLE if exists COUNTRY;
DROP TABLE if exists MANUFACTURER;
DROP TABLE if exists PRODUCT_ORIGINAL;
DROP TABLE if exists REVIEW;
DROP TABLE if exists QUESTION;
DROP TABLE if exists ANSWER;

CREATE TABLE USER (
id	                INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
user_name			VARCHAR(20)	NOT NULL,
gender		        VARCHAR(10) NOT NULL,
age		            CHAR(3) NOT NULL
);

CREATE TABLE PRODUCT (
id	            INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
product_name			VARCHAR(20),
description		        VARCHAR(10),
date_of_release         date
);

CREATE TABLE COUNTRY (
id 			        CHAR(5),
country_name		VARCHAR(20)
); 

CREATE TABLE MANUFACTURER (
id	                        INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
manufacturer_name			VARCHAR(20)	NOT NULL,
country_id	                VARCHAR(10),
FOREIGN KEY (country_id) REFERENCES COUNTRY(id)
);

CREATE TABLE PRODUCT_ORIGINAL (
product_id	            INTEGER NOT NULL,
manufacturer_id         INTEGER NOT NULL,

PRIMARY KEY (product_id, manufacturer_id),
FOREIGN KEY (product_id) REFERENCES PRODUCT(id),
FOREIGN KEY (manufacturer_id) REFERENCES MANUFACTURER(id)
);

CREATE TABLE REVIEW (
review_id	            INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
product_id              INT(3),
review_user_id          INT(3),
manufacturer_id         INT(3),
title                   VARCHAR(100),
review_detail           text default '',
date_of_post            VARCHAR(20),
rating                  INT(1),


FOREIGN KEY (product_id) REFERENCES PRODUCT(id),
FOREIGN KEY (manufacturer_id) REFERENCES MANUFACTURER(id),
FOREIGN KEY (review_user_id) REFERENCES USER(id)
);


CREATE TABLE QUESTION (
question_id	            INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
product_id              INT(3),
question                VARCHAR(600),
ask_user_id             INT(3),
date_of_post            date,

FOREIGN KEY (product_id) REFERENCES PRODUCT(id),
FOREIGN KEY (ask_user_id) REFERENCES USER(id)
);

CREATE TABLE ANSWER (
answer_id	            INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
question_id				INT(3),
product_id              INT(3),
ans_user_id             INT(3),
answer 					VARCHAR(600),
date_of_post            date,

FOREIGN KEY (product_id) REFERENCES PRODUCT(id),
FOREIGN KEY (ans_user_id) REFERENCES USER(id)
);



INSERT INTO QUESTION VALUES (null,	4,	"Question 1"	,3	,"20-1-2017");
INSERT INTO QUESTION VALUES (null,	6,	"Question 2"	,4	,"21-2-2017");
INSERT INTO QUESTION VALUES (null,	3,	"Question 3"   ,15	,"22-3-2017");
INSERT INTO QUESTION VALUES (null,	3,	"Question 4"	,2	,"20-4-2017");
INSERT INTO QUESTION VALUES (null,	10,	"Question 5"	,6	,"21-5-2017");
INSERT INTO QUESTION VALUES (null,	1,  "Question 6"	,7	,"20-6-2017");
INSERT INTO QUESTION VALUES (null,	9,	"Question 7"	,1	,"20-7-2017");
INSERT INTO QUESTION VALUES (null,	3,	"Question 8"	,8	,"20-8-2017");
INSERT INTO QUESTION VALUES (null,	10,	"Question 9"	,2	,"29-8-2017");
INSERT INTO QUESTION VALUES (null,  10,	"Question 10"	,2	,"21-8-2017");

INSERT INTO ANSWER VALUES (null,	1,	4,	9,	"Answer 1",	"20-1-2018");
INSERT INTO ANSWER VALUES (null,	1,	4,	14,	"Answer 2",	"21-2-2018");
INSERT INTO ANSWER VALUES (null,	3,	3,	1,	"Answer 3",	"22-3-2018");
INSERT INTO ANSWER VALUES (null,	3,	3,	6,	"Answer 4",	"23-3-2018");
INSERT INTO ANSWER VALUES (null,	4,	3,	8,	"Answer 5",	"24-3-2018");
INSERT INTO ANSWER VALUES (null,	5,	10,	15,	"Answer 6",	"25-3-2018");
INSERT INTO ANSWER VALUES (null,	4,	3,	3,	"Answer 7",	"25-3-2018");
INSERT INTO ANSWER VALUES (null,	1,	4,	3,	"Answer 8",	"25-3-2018");
INSERT INTO ANSWER VALUES (null,	9,	10,	3,	"Answer 9",	"25-3-2018");
INSERT INTO ANSWER VALUES (null,	10,	10,	2,	"Answer 10","26-3-2018");
INSERT INTO ANSWER VALUES (null,	3,	3,	3,	"Answer 11","26-3-2019");


INSERT INTO USER VALUES (null,	'Amy',		'Female',	41);
INSERT INTO USER VALUES (null,	'Bob',		'Male',		22);
INSERT INTO USER VALUES (null,	'Candy',	'Female',	63);
INSERT INTO USER VALUES (null,	'Dina',		'Female',	14);
INSERT INTO USER VALUES (null,	'Edwin',	'Male',		15);
INSERT INTO USER VALUES (null,	'Frank',	'Male',		16);
INSERT INTO USER VALUES (null,	'Gigi',		'Female',	27);
INSERT INTO USER VALUES (null,	'Helen',	'Female',	48);
INSERT INTO USER VALUES (null,	'Ivy',		'Female',	59);
INSERT INTO USER VALUES (null,	'Jacky',	'Male',		10);
INSERT INTO USER VALUES (null,	'Kelly',	'Female',	11);
INSERT INTO USER VALUES (null,	'Louis',	'Male',		12);
INSERT INTO USER VALUES (null,	'Lily',		'Female',	13);
INSERT INTO USER VALUES (null,	'Mary',		'Female',	14);
INSERT INTO USER VALUES (null,	'Nancy',	'Female',	16);

INSERT INTO PRODUCT VALUES (null,	'Apple iPhone X',		"iPhone X features a new all-screen design. Face ID, which makes your face your password. And the most powerful and smartest chip ever in a smartphone.",                                                                               '30-1-2017');            
INSERT INTO PRODUCT VALUES (null,	'Canon PowerShot S110',	'The PowerShot S110 packs a world of advancements into its sleek, pocket-sized body.',                                      																											'5-10-2017');
INSERT INTO PRODUCT VALUES (null,	'Samsung Galaxy 9',		'The camera that takes beautiful photos in different kinds of light. Infinity Display. Intelligent Scan. AR Emoji. Water-resistant. Wireless Charging. Super Slow-mo. Dual Camera. Quick Command. Stereo Speakers. Live Translation.',  '6-10-2017');
INSERT INTO PRODUCT VALUES (null,	'Apple iPad Pro',		'The new 10.5-inch iPad Pro comes with a screen nearly 20 per cent larger than the 9.7‑inch model, so you get more room to do more.',       				                															'7-10-2017');
INSERT INTO PRODUCT VALUES (null,	'Huawei P10',			'Co-engineered with Leica, the Huawei P10 makes every shot a cover shot. Change the way the world sees you, through the lens of the Huawei P10.',																						'8-10-2017');
INSERT INTO PRODUCT VALUES (null,	'Canon EOS 600D',		'The Good Flip-out, high-resolution LCD screen. Wireless flash control. Digital zoom function in video recording can be really useful (at 3x).',																						'9-10-2017');
INSERT INTO PRODUCT VALUES (null,	'Canon EOS 5D3',		'The Canon EOS 5D Mark III is Canons flagship model and the benchmark for all SLR cameras in the market, used by enthusiasts and professional alike.', 																				    '1-11-2017');
INSERT INTO PRODUCT VALUES (null,	'Apple Macbook Pro',	'The ultimate pro notebook, MacBook Pro features faster processors, upgraded memory, the Apple T2 chip and a Retina display with True Tone technology.',																				'2-11-2017');
INSERT INTO PRODUCT VALUES (null,	'Fujifilm X-Pro1',		'The Fujifilm X Series X-Pro1 paves the way for enhanced photographic creativity. The FUJINON XF lens featured was designed especially for the X-Pro1.',																				'3-11-2017');                                    
INSERT INTO PRODUCT VALUES (null,	'Vivo R11',				"Oppo R11 vs Viv V5 Mobile Comparison - Compare Oppo R11 vs Vivo V5 Price in India, Camera, Size and other specifications at Gadgets Now.",		                                                                                        '4-11-2017');

INSERT INTO COUNTRY VALUES ("US", "United State");
INSERT INTO COUNTRY VALUES ("JP", "Japan");
INSERT INTO COUNTRY VALUES ("KR", "Korea");
INSERT INTO COUNTRY VALUES ("CN", "China");

INSERT INTO MANUFACTURER VALUES (null, "Apple",		"US");
INSERT INTO MANUFACTURER VALUES (null, "Canon",		"JP");
INSERT INTO MANUFACTURER VALUES (null, "Fuji",		"JP");
INSERT INTO MANUFACTURER VALUES (null, "Huawei",	"CN");
INSERT INTO MANUFACTURER VALUES (null, "Samsung",	"KR");
INSERT INTO MANUFACTURER VALUES (null, "Vivo",		"CN");
INSERT INTO MANUFACTURER VALUES (null, "Dell",		"US");

INSERT INTO PRODUCT_ORIGINAL VALUES (1,		1);
INSERT INTO PRODUCT_ORIGINAL VALUES (2,		2);
INSERT INTO PRODUCT_ORIGINAL VALUES (3,		5);
INSERT INTO PRODUCT_ORIGINAL VALUES (4,		1);
INSERT INTO PRODUCT_ORIGINAL VALUES (5,		4);
INSERT INTO PRODUCT_ORIGINAL VALUES (6,		2);
INSERT INTO PRODUCT_ORIGINAL VALUES (7,		2);
INSERT INTO PRODUCT_ORIGINAL VALUES (8,		1);
INSERT INTO PRODUCT_ORIGINAL VALUES (9,		3);
INSERT INTO PRODUCT_ORIGINAL VALUES (10, 	6);

INSERT INTO REVIEW VALUES (null,	2,	1,	2,	"Such a bad camera",	"Had this camera for 32 months. Takes very good photos, however has a fatal lens design flaw. Google Powershot lens problem and be astounded how many have this problem. Canon Australia will fix it for $178.20!",	"20-1-2017", 1);
INSERT INTO REVIEW VALUES (null,	2,	2,	2,	"It's ok",	 			"have been using cameras since the early sixties, and know that every camera is a compromise, the smaller it gets the less capable. ( Generally ) So, to find a pocketable camera that gives results comparable to much larger units, is quite something.",	"21-2-2017", 2);
INSERT INTO REVIEW VALUES (null,	1,	3,	1,	"Good phone",			"This iPhone is definitely the best iPhone so far and it was nice to see a change in the appearance. The only downside to this phone is the Face ID that doesn't always work. Especially if in bed in the dark, then you need to put the phone straight in front of you to unlock. It's easier to unlock with iPhone 8.",	"22-3-2017",	5);
INSERT INTO REVIEW VALUES (null,	3,	4,	5,	"bad display",			"Absolutely bonkers in the looks department. Screen is to die for especially its Infinity Display.  Gets an occasional hiccup in its loops so hard resets have been necessary.",	"20-4-2017",	2);
INSERT INTO REVIEW VALUES (null,	6,	5,	2,	"it is ok???",			"As a beginner user, I find it easy to use. Before my photography course I was using the Auto function which I use every now and then when I don't want to fumble and use the Manual settings.", "21-5-2017",	3);
INSERT INTO REVIEW VALUES (null,	3,	15,	5,	"bad quality",			"Device screen has been broken even a small fall to ground with original flip case. Flip case not broken but the screen broken. Samsung screen not good enough and their expensive cover also not protecting the device.", "20-6-2017",	2);
INSERT INTO REVIEW VALUES (null,	5,	7,	4,	"like it!",				"I bought the p10 plus because of its amazing cameras. Turns out when using the video camera there is no sync between video and audio. I tried fixing it and took it to their lab.", "20-7-2017",	3);
INSERT INTO REVIEW VALUES (null,	7,	8,	2,	"Worth to buy",			"This is an in-depth review of the new Canon 5D Mark III, a highly anticipated DSLR update to the Canon 5D Mark II that was released back in 2008. Built on the success of the 5D Mark II and featuring the most advanced autofocus system Canon has released to date from its EOS-1D X line, the Canon 5D Mark III is a rather promising upgrade to the 5D line.",	"20-8-2017",	4);
INSERT INTO REVIEW VALUES (null,	10,	9,	5,	"unbearable!!",			"This phone has blocked 6 calls today even though I have turned off phone block. The security settings are unbearable. I do not like it taking over. I do not like the calendar it is confusing.", "20-9-2017",	2);
INSERT INTO REVIEW VALUES (null,	9,	10,	3,	"Perfect!!",			"Well, what can you say...perfect. Used this in Germany for a horse show and at Nurburgring - all moving objects and showed how versatile the focus system is. The 55-200 lens (optional) is unbelievable - sharp and anti-shake mechanism is very very impressive.", "20-10-2017",	5);
INSERT INTO REVIEW VALUES (null,	8,	11,	1,	"too bad~~~",			"Purchased this in December 2017 after being fed up with my slow Lenovo Windows laptop. Yes, it's price is hard to swallow, but it's made up for in performance, design, build quality and of course, the software. If you are in the Apple ecosystem, the MBP will be a no-brainer! Even without owning other Apple products (at the time of purchase), this was still on my 'to buy' list.", "10-10-2017",	1);
INSERT INTO REVIEW VALUES (null,	4,	12,	1,	"I like it!!~",			"I bought a iPad but not it IPad-pro. I found the iPad really helpful and I think IPad-pro is also really helpful, just like a person! You can use apps, and on the internet, you it can tell you answers of the question you asked. Just like what I am doing right NOW!!!",	"11-11-2017",	5);
















