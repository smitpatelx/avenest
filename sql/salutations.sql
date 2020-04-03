-- FILE: 						salutations.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS salutations;
CREATE TABLE salutations (
    value INTEGER PRIMARY KEY,
    salutation VARCHAR(7)
);

INSERT INTO salutations (value, salutation) VALUES (1, 'Ms.');
INSERT INTO salutations (value, salutation) VALUES (2, 'Mr.');
INSERT INTO salutations (value, salutation) VALUES (4, 'Master');
INSERT INTO salutations (value, salutation) VALUES (8, 'Miss');
INSERT INTO salutations (value, salutation) VALUES (16, 'Mrs.');
