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
<<<<<<< HEAD

require("./header.php");

?>
    <div>
    <!-- Displays a welcoming message -->
        Welcome 
=======
require("./header.php");
?>
    <div class="text-center flex flex-wrap flex-col py-4 content-center">
        <p class="text-xl text-primary shadow-lg rounded w-1/3 bg-gray-200 py-2">
            Welcome <?php echo $_SESSION['email_s'] ?>
        </p>
>>>>>>> 28dfdfec71a9cbf72af801aa38158c048f3f609d
    </div>

<?php
require("./footer.php");
?>