-- FILE: 						favourites.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS favourites CASCADE;
CREATE TABLE favourites (
	mix_id VARCHAR(30) NOT NULL PRIMARY KEY,
    listing_id INT NOT NULL REFERENCES listings(listing_id) ON DELETE CASCADE,
	user_id VARCHAR(20) NOT NULL REFERENCES users(user_id) ON DELETE CASCADE
);

