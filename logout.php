<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Logout Page
-->
<?php
$title  = "Login";
$file   = "login.php";
$date   = "SEPT 15, 2019";
$banner = "Login";
$desc   = "Login page includes fields for email and password.";

session_start();

if ( isset( $_COOKIE[session_name()] ) ) {
    //unset all sessions
    unset($_SESSION);
    //clear session from disk
    session_destroy();
}

// if ( isset($_COOKIE["LOGIN_COOKIE"])){
//     //destroy LOGIN_COOKIE cookie 
//     unset($_COOKIE["LOGIN_COOKIE"]);
//     setcookie( 'LOGIN_COOKIE', time()-3600);
// } else {
//     print("cookie not set");
// }

// print_r($_SESSION);
// echo "\n\n\n";
// print_r($_COOKIE);

header("Location: ./index.php"); //Redirecting user to home page
ob_flush();  //Flushing output buffer