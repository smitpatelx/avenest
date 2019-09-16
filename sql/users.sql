-- FILE: 						users.sql
-- TITLE:						Avenest - User Tables Creation Script
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        SEPT 15, 2019

DROP TABLE IF EXISTS users CASCADE;
CREATE TABLE users (
    user_id VARCHAR(20) NOT NULL PRIMARY KEY default nextval('user_id_seq'),
    password VARCHAR(32) NOT NULL,
    user_type VARCHAR(2) NOT NULL,
    email_address VARCHAR(256) NOT NULL,
    enrol_date DATE NOT NULL,
    last_access DATE NOT NULL
);

INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) 
VALUES (10001, '1004c3d449a4002d2e167a7e0a3c063e','a', 'smita@avenest.com', '2019-09-16'::date,	'2019-09-16'::date);
INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) 
VALUES (10002, '1004c3d449a4002d2e167a7e0a3c063e','s', 'smits@avenest.com', '2019-09-16'::date,	'2019-09-16'::date);
INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) 
VALUES (10003, '1004c3d449a4002d2e167a7e0a3c063e','c', 'smitc@avenest.com', '2019-09-16'::date,	'2019-09-16'::date);
INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) 
VALUES (10004, '1004c3d449a4002d2e167a7e0a3c063e','d', 'smitd@avenest.com', '2019-09-16'::date,	'2019-09-16'::date);
INSERT INTO users (user_id, password, user_type, email_address, enrol_date, last_access) 
VALUES (10005, '1004c3d449a4002d2e167a7e0a3c063e','p', 'smitp@avenest.com', '2019-09-16'::date,	'2019-09-16'::date);

SELECT pg_catalog.setval('user_id_seq', 10005, true);