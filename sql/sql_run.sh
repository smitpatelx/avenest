#!/bin/sh
psql -d group04_db -U group04_admin <<OMG
BEGIN;

\i ./sequences/user_id_seq.sql
\i ./sequences/listing_sequence.sql
\i ./users.sql
\i ./listings.sql
\i ./bathrooms.sql
\i ./bedrooms.sql
\i ./city.sql
\i ./house_type.sql
\i ./images.sql
\i ./listing_status.sql
\i ./persons.sql
\i ./petfriendly.sql
\i ./preferred_contact_method.sql
\i ./property_options.sql
\i ./provinces.sql
\i ./salutations.sql
\i ./favourites.sql
\i ./offensives.sql

COMMIT;
OMG

#eof
