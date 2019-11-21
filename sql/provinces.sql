-- FILE: 						provinces.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS provinces;
CREATE TABLE provinces (
    value INTEGER PRIMARY KEY,
    province VARCHAR(2),
    province_long VARCHAR(30)
);

INSERT INTO provinces (value, province, province_long) VALUES (1, 'YT', 'Yukon');
INSERT INTO provinces (value, province, province_long) VALUES (2, 'AB', 'Alberta');
INSERT INTO provinces (value, province, province_long) VALUES (4, 'BC', 'British Columbia');
INSERT INTO provinces (value, province, province_long) VALUES (8, 'MB', 'Manitoba');
INSERT INTO provinces (value, province, province_long) VALUES (16, 'NB', 'New Brunswick');
INSERT INTO provinces (value, province, province_long) VALUES (32, 'NL', 'Newfoundland and Labrador');
INSERT INTO provinces (value, province, province_long) VALUES (64, 'NT', 'Northwest Territories');
INSERT INTO provinces (value, province, province_long) VALUES (128, 'NS', 'Nova Scotia');
INSERT INTO provinces (value, province, province_long) VALUES (256, 'NU', 'Nunavut');
INSERT INTO provinces (value, province, province_long) VALUES (512, 'ON', 'Ontario');
INSERT INTO provinces (value, province, province_long) VALUES (1024, 'PE', 'Prince Edward Island');
INSERT INTO provinces (value, province, province_long) VALUES (2048, 'QC', 'Quebec');
INSERT INTO provinces (value, province, province_long) VALUES (4096, 'SK', 'Saskatchewan');
