<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Disabled users
-->
<?php
$title  = "Disabled Users";
$file   = "disabled-users.php";
$date   = "SEPT 15, 2019";
$banner = "Disabled Users";
$desc   = "Disabled users use to greet admin.";
require("./header.php");

if(isset($_SESSION['user_type_s'])){
    if ($_SESSION['user_type_s'] == AGENT){
        header("LOCATION: ./dashboard.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == DISABLED){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == CLIENT){
        header("LOCATION: ./welcome.php");
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
    <div class="w-full flex flex-wrap justify-center items-center py-4 px-3">
        <h1 class="text-2xl text-primary-500 font-semibold">Disabled Users</h1>
        <!-- User Component Vue.js-->

    </div>
<?php
require("./footer.php");
?>