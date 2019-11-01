-- FILE: 						persons.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019

DROP TABLE IF EXISTS persons;
CREATE TABLE persons (
    user_id VARCHAR(20) PRIMARY KEY REFERENCES users (user_id) ON DELETE CASCADE,
    salutation VARCHAR(10) NOT NULL,
    first_name VARCHAR(128) NOT NULL,
    last_name VARCHAR (128) NOT NULL,
    street_address_1 VARCHAR(128) NOT NULL,
    street_address_2 VARCHAR(128), 
    city VARCHAR(64) NOT NULL, 
    province VARCHAR(2) NOT NULL, 
    postal_code VARCHAR(6) NOT NULL, 
    primary_phone_number VARCHAR(15) NOT NULL, 
    secondry_phone_number VARCHAR(15), 
    fax_number VARCHAR(15),
    preferred_contact_method VARCHAR(1) NOT NULL
);

INSERT INTO persons (user_id, first_name, last_name, street_address_1, street_address_2, city, province, postal_code, primary_phone_number, secondry_phone_number, fax_number, salutation, preferred_contact_method) 
VALUES (10001, 'Richi', 'Rich','40, almond hill','', 'oshawa', 'ON', 'L4K2B4', '5678768765', '', '', 'Mr.', 'e');
INSERT INTO persons (user_id, first_name, last_name, street_address_1, street_address_2, city, province, postal_code, primary_phone_number, secondry_phone_number, fax_number, salutation, preferred_contact_method) 
VALUES (10002,'Smit','Patel', '38, greenhill ave','', 'oshawa', 'ON', 'L4K2B4', '5678768765', '', '', 'Mr.', 'e');
INSERT INTO persons (user_id, first_name, last_name, street_address_1, street_address_2, city, province, postal_code, primary_phone_number, secondry_phone_number, fax_number, salutation, preferred_contact_method) 
VALUES (10003,'Smit','Patel', '38, greenhill ave','', 'oshawa', 'ON', 'L4K2B4', '5678768765', '', '', 'Mr.', 'e');
INSERT INTO persons (user_id, first_name, last_name, street_address_1, street_address_2, city, province, postal_code, primary_phone_number, secondry_phone_number, fax_number, salutation, preferred_contact_method) 
VALUES (10004,'Smit','Patel', '38, greenhill ave','', 'oshawa', 'ON', 'L4K2B4', '5678768765', '', '', 'Mr.', 'e');
INSERT INTO persons (user_id, first_name, last_name, street_address_1, street_address_2, city, province, postal_code, primary_phone_number, secondry_phone_number, fax_number, salutation, preferred_contact_method) 
VALUES (10005,'Smit','Patel', '38, greenhill ave','', 'oshawa', 'ON', 'L4K2B4', '5678768765', '', '', 'Mr.', 'e');
