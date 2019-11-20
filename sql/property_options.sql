-- FILE: 						property_options.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS property_option;

CREATE TABLE property_option(
    value SMALLINT PRIMARY KEY,
    property VARCHAR(30) NOT NULL
);

INSERT INTO property_option (value, property) VALUES (0, 'Waterfront');
INSERT INTO property_option (value, property) VALUES (1, 'Garage');
INSERT INTO property_option (value, property) VALUES (2, 'AC');
INSERT INTO property_option (value, property) VALUES (4, 'Pool');
INSERT INTO property_option (value, property) VALUES (8, 'Acreage');