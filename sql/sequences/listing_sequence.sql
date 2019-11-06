-- FILE: 						listing_sequence.sql
-- TITLE:						AveNest Listings
-- AUTHORS:						Smit Patel
-- LAST MODIFIED:		        OCT 30, 2019
drop sequence if exists listing_id_seq cascade;

create sequence listing_id_seq;
select setval('listing_id_seq', 10000);