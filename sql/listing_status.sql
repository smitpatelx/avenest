-- FILE: 						listing_status.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS listing_status;

CREATE TABLE listing_status(
value CHAR(1) PRIMARY KEY,
property VARCHAR(30) NOT NULL
);

INSERT INTO listing_status(value, property) VALUES ('o', 'open');
INSERT INTO listing_status(value, property) VALUES ('c', 'closed');
INSERT INTO listing_status(value, property) VALUES ('s', 'sold');
INSERT INTO listing_status(value, property) VALUES ('h', 'hidden');