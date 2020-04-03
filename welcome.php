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

if(isset($_SESSION['user_type_s'])){
    if ($_SESSION['user_type_s'] == ADMIN){
        header("LOCATION: ./admin.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == AGENT){
        header("LOCATION: ./dashboard.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == DISABLED){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == INCOMPLETE){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }
} else {
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}
?>
    <div class="w-full flex flex-wrap justify-center content-center px-2 lg:px-10 py-4 lg:px-6">
        <p class="text-2xl text-primary-500 shadow-lg rounded w-1/3 bg-white py-2 font-headline font-semibold text-center">
            Welcome  <?php echo ($_SESSION['user_s'])['first_name']." ".($_SESSION['user_s'])['last_name'] ?>
        </p>
        <p class="text-lg text-primary-500 w-full py-2 font-headline font-semibold text-center underline">
            My Favourites List
        </p>
        <favourites-manage></favourites-manage>
    </div>

<?php
require("./footer.php");
?>