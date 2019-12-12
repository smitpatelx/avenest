-- FILE: 						offensives.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        DEC 1, 2019

DROP TABLE IF EXISTS offensives CASCADE;
CREATE TABLE offensives (
	mix_id VARCHAR(30) NOT NULL PRIMARY KEY,
    listing_id INT NOT NULL REFERENCES listings(listing_id) ON DELETE CASCADE,
	user_id VARCHAR(20) NOT NULL REFERENCES users(user_id) ON DELETE CASCADE
);

