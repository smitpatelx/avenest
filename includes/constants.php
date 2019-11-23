<?php

//Database constants
define('DB_NAME', 'avenest');
define('DB_HOST', '127.0.0.1');
define('DB_PORT', '5432');
define('DB_USER', 'smit');
define('DB_PASSWORD', 'smitpatelx');

//User Types Constants
define('ADMIN', 's');
define('AGENT', 'a');
define('CLIENT', 'c');
define('PENDING', 'p');
define('DISABLED', 'd');
define('INCOMPLETE', 'i');

//Cookies life span
define('COOKIE_LIFESPAN', time() + (60*60*24*30));

//md5 hashing
define("MD5", "md5");

//Forms Limits
define("MAX_PASSWORD", 20);
define("MIN_PASSWORD", 6);

define("EMAIL", "e");
define("PHONE", "p");
define("LETTER_MAIL", "l");

define("LISTING_STATUS_OPEN", "o");
define("LISTING_STATUS_CLOSE", "c");
define("LISTING_STATUS_SOLD", "s");
define("LISTING_STATUS_HIDDEN", "h");
    
//Constant for forms
define('MAX_HEADLINE_LENGTH', '100' );
define('MIN_HEADLINE_LENGTH', '2' );

define('MAX_DESCRIPTION_LENGTH', '1000' );
define('MIN_DESCRIPTION_LENGTH', '6' );

define('MAX_PRICE', '10000000' );
define('MIN_PRICE', '10000' );

define('MAX_USERNAME_LENGTH', '20' );
define('MIN_USERNAME_LENGTH', '6' );

define('MAX_PASSWORD_LENGTH', '16' );
define('MIN_PASSWORD_LENGTH', '5' );

define('MAX_FIRST_NAME_LENGTH', '20' );
define('MIN_FIRST_NAME_LENGTH', '3' );

define('MAX_LAST_NAME_LENGTH', '30' );
define('MIN_LAST_NAME_LENGTH', '3' );

define('MAX_EMAIL_LENGTH', '30' );
define('MIN_EMAIL_LENGTH', '5' );
    
define('MAX_ADDRESS_LENGTH', '30' );
define('MIN_ADDRESS_LENGTH', '6' );
    
define('POSTAL_CODE_LENGTH', '6' );
    
define('MAX_PHONE_LENGTH', '15' );
define('MIN_PHONE_LENGTH', '10' );
    
define('MAX_CITY_LENGTH', '17' );
define('MIN_CITY_LENGTH', '3' );

define('MAX_FAX_LENGTH', '15' );
define('MIN_FAX_LENGTH', '6' );

define('MAX_AREA_CODE', '999' );
define('MIN_AREA_CODE', '200' );

define('MAX_DIAL_SEQUENCE', '9999' );
define('MIN_DIAL_SEQUENCE', '0000' );

//Search Constants
define('MAX_SEARCH_RESULTS', '200' );
define('LISTINGS_PER_PAGE', '10' );

define('IMAGE_PATH', '/images/listing/');
?>