<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : OCT 30, 2019
DESCRIPTION     : Update Page
-->
<?php
// Setting global variables for welcome page. 

$title  = "Update";
$file   = "update.php";
$date   = "OCT 30, 2019";
$banner = "Update";
$desc   = "Update user information.";
require("./header.php");

if(!isset($_SESSION['user_type_s'])){
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}
?>
    <div class="text-center flex flex-wrap flex-col py-4 content-center">
        <p class="text-xl text-primary shadow-lg rounded w-1/3 bg-gray-200 py-2">
            Update User Info
        </p>
    </div>

<?php
require("./footer.php");
?>