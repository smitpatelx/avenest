<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : NOV 11, 2019
DESCRIPTION     : Listing City Select
-->
<?php
$title  = "Listing City Select";
$file   = "listing-search.php";
$date   = "NOV 11, 2019";
$banner = "Listing City Select";
$desc   = "Listing City Select Page used to select a city";
require("./header.php");
?>
    <div class="text-center flex flex-wrap flex-col py-4 content-center container mx-auto justify-center">
        <p class="text-xl text-primary shadow-lg rounded w-auto lg:w-1/3 bg-white py-2 px-3 font-headline font-semibold">
            Select A City
        </p>
    </div>
<?php
require("./footer.php");
?>