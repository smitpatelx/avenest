-- FILE: 						preferred_contact_method.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS preferred_contact_method;
CREATE TABLE preferred_contact_method (
    value SMALLINT PRIMARY KEY,
    method VARCHAR(1),
    method_name VARCHAR(12)
);

INSERT INTO preferred_contact_method (value, method, method_name) VALUES (1, 'e', 'E-mail');
INSERT INTO preferred_contact_method (value, method, method_name) VALUES (2, 'p', 'Phone');
INSERT INTO preferred_contact_method (value, method, method_name) VALUES (4, 'l', 'Letter Mail');