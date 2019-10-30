<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Welcome Page
-->
<?php
$title  = "Welcome";
$file   = "Welcome.php";
$date   = "SEPT 15, 2019";
$banner = "Welcome";
$desc   = "Welcome page use to greet clients.";
require("./header.php");

print_r($_COOKIE);

print("<br/><br/>");
$cookie_currentUser = explode("|",$_COOKIE['LOGIN_COOKIE']);
print_r($cookie_currentUser);
print("<br/><br/>");
print_r($cookie_currentUser[1]);
?>
    <div>
        Welcome
    </div>

<?php
require("./footer.php");
?>