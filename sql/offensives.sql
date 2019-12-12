-- FILE: 						offensives.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        DEC 1, 2019

DROP TABLE IF EXISTS offensives CASCADE;
CREATE TABLE offensives (
	PRIMARY KEY(listing_id, user_id),
    listing_id INT NOT NULL REFERENCES listings(listing_id) ON DELETE CASCADE,
	user_id VARCHAR(20) NOT NULL REFERENCES users(user_id) ON DELETE CASCADE,
	reported_on DATE NOT NULL,
	status VARCHAR(1) NOT NULL
);

