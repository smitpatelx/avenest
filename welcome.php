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

$cookie_currentUser = [ 
    'user_type' => $_SESSION['user_type_s'],
    'email' => $_SESSION['email_s'],
    'last_access' => $_SESSION['last_access_s'],
    'user_id' => $_SESSION['user_id_s']
];
print("<br/><br/>");
print_r($cookie_currentUser);
?>
    <div>
        Welcome
    </div>

<?php
require("./footer.php");
?>