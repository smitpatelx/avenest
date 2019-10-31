<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Listing Create Page
-->
<?php
$title  = "Listing Create";
$file   = "listing-create.php";
$date   = "SEPT 15, 2019";
$banner = "Listing Create";
$desc   = "Listing Create page use to create listing.";
require("./header.php");

if(isset($_SESSION['user_type_s'])){
    if ($_SESSION['user_type_s'] == DISABLED){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == CLIENT){
        header("LOCATION: ./welcome.php");
        ob_flush();  //Flushing output buffer after redirection
    }
} else {
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}
?>

    <div>
        Listing Create
    </div>

<?php
require("./footer.php");
?>