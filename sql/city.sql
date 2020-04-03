-- FILE: 						city.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS city;

CREATE TABLE city(
    value SMALLINT PRIMARY KEY,
    property VARCHAR(30) NOT NULL
);

INSERT INTO city (value, property) VALUES (1, 'ajax');
INSERT INTO city (value, property) VALUES (2, 'brooklin');
INSERT INTO city (value, property) VALUES (4, 'bowmanville');
INSERT INTO city (value, property) VALUES (8, 'oshawa');
INSERT INTO city (value, property) VALUES (16, 'pickering');
INSERT INTO city (value, property) VALUES (32, 'port perry');
INSERT INTO city (value, property) VALUES (64, 'whitby');
INSERT INTO city (value, property) VALUES (128, 'clarington');
INSERT INTO city (value, property) VALUES (256, 'scugog');
INSERT INTO city (value, property) VALUES (512, 'brampton');
INSERT INTO city (value, property) VALUES (1024, 'toronto');
INSERT INTO city (value, property) VALUES (2048, 'bowmanville');
INSERT INTO city (value, property) VALUES (4096, 'courtice');