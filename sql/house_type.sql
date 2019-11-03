-- FILE: 						house_type.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS house_type;

CREATE TABLE house_type(
value SMALLINT PRIMARY KEY,
property VARCHAR(30) NOT NULL
);

INSERT INTO house_type (value, property) VALUES (1 ,'mansion');
INSERT INTO house_type (value, property) VALUES (2 ,'semi detached');
INSERT INTO house_type (value, property) VALUES (4 ,'villa');
INSERT INTO house_type (value, property) VALUES (8 ,'condo');
INSERT INTO house_type (value, property) VALUES (16 ,'detached');
INSERT INTO house_type (value, property) VALUES (32 ,'beach house');
INSERT INTO house_type (value, property) VALUES (64 ,'appartments');