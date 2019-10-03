<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Admin Page
-->
<?php
$title  = "Admin";
$file   = "Admin.php";
$date   = "SEPT 15, 2019";
$banner = "Admin";
$desc   = "Admin page use to greet admin.";
require("./header.php");
?>

<div class="text-center flex flex-wrap flex-col py-4 content-center">
    <p class="text-xl text-primary shadow-lg rounded w-1/3 bg-gray-200 py-2">
        Admin, Welcome <?php echo $_SESSION['email_s'] ?>.
    </p>
</div>

<?php
require("./footer.php");
?>