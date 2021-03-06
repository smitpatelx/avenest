-- FILE: 						listings.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS listings CASCADE;

CREATE TABLE listings(
	listing_id int not null primary key default nextval('listing_id_seq'),
	user_id VARCHAR(20) NOT NULL REFERENCES users(user_id),
	status VARCHAR(1) NOT NULL,
	price NUMERIC NOT NULL,
	headline VARCHAR(100) NOT NULL,
	description VARCHAR(1000) NOT NULL,
	postal_code VARCHAR(6) NOT NULL,
	images_path TEXT NOT NULL,
	city INTEGER NOT NULL,
	property_options INTEGER NOT NULL,
	province INTEGER NOT NULL, 
	bedrooms INTEGER NOT NULL,
	bathrooms INTEGER NOT NULL,
	address VARCHAR(40) NOT NULL,	
	area INTEGER NOT NULL,
	phone VARCHAR(15) NOT NULL,
	pets_friendly INTEGER NOT NULL,
	created_on DATE NOT NULL,
	updated_on DATE NOT NULL
);

SELECT pg_catalog.setval('listing_id_seq', 10000, true);