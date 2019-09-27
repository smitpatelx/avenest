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
?>
    <div class="text-center flex flex-wrap flex-col py-4 content-center">
        <p class="text-xl text-primary shadow-lg rounded w-1/3 bg-gray-200 py-2">
            Welcome <?php echo $_SESSION['email_s'] ?>
        </p>
    </div>

<?php
require("./footer.php");
?>