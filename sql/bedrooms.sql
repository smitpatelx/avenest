-- FILE: 						bedrooms.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS bedrooms;

CREATE TABLE bedrooms(
value SMALLINT PRIMARY KEY,
property TEXT NOT NULL
);

INSERT INTO bedrooms (value, property) VALUES (1, '1 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES (2, '2 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES (4, '3 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES (8, '4 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES (16, '5 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES (32, '6 Bedrooms');
INSERT INTO bedrooms (value, property) VALUES (64, 'More than 6');