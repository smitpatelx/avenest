<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Welcome Page
-->
<?php
// Setting global variables for welcome page. 

$title  = "Welcome";
$file   = "Welcome.php";
$date   = "SEPT 15, 2019";
$banner = "Welcome";
$desc   = "Welcome page use to greet clients.";

require("./header.php");

?>
    <div>
    <!-- Displays a welcoming message -->
        Welcome 
    </div>

<?php
require("./footer.php");
?>