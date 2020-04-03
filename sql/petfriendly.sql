-- FILE: 						petfriendly.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS pets_friendly;

CREATE TABLE pets_friendly(
value SMALLINT PRIMARY KEY,
property VARCHAR(3) NOT NULL
);

INSERT INTO pets_friendly (value, property) VALUES (1, 'yes');
INSERT INTO pets_friendly (value, property) VALUES (2, 'no');