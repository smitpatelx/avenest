<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Variables file
-->
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
    
//Constant for forms
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
?>