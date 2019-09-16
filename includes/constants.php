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
define('COOKIE_LIFESPAN', 2592000);

?>