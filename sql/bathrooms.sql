-- FILE: 						bathrooms.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS bathrooms;

CREATE TABLE bathrooms(
value SMALLINT PRIMARY KEY,
property TEXT NOT NULL
);

INSERT INTO bathrooms (value, property) VALUES (1, '1 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES (2, '2 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES (4, '3 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES (8, '4 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES (16, '5 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES (32, '6 Bathrooms');
INSERT INTO bathrooms (value, property) VALUES (64, 'More than 6');