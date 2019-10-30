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

//Contact Methods
define('EMAIL', 'e');
define('PHONE', 'p');
define('POSTED_MAIL', 'm');

//Phone Number Area Codes Range
define('MAXIMUM_PREFIX', 999);
define('MINIMUM_PREFIX', 200);

//Listing Status
define('OPEN', 'o');
define('CLOSED', 'c');
define('SOLD', 's');

//Cookies life span
define('COOKIE_LIFESPAN', time() + (60*60*24*30));

//md5 hashing
define("MD5", "md5");

?>