-- FILE: 						salutations.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS salutations;
CREATE TABLE salutations (
    value INTEGER PRIMARY KEY,
    salutation VARCHAR(7)
);

INSERT INTO salutations (value, salutation) VALUES (1, 'Mr.');
INSERT INTO salutations (value, salutation) VALUES (2, 'Master');
INSERT INTO salutations (value, salutation) VALUES (4, 'Miss');
INSERT INTO salutations (value, salutation) VALUES (8, 'Mrs.');
INSERT INTO salutations (value, salutation) VALUES (16, 'Ms.');
