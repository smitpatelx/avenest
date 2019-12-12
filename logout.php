<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
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

    //unset all cookies
    unset($_COOKIE);
    //destroy LOGIN_COOKIE
    setcookie('LOGIN_COOKIE', '', time()-1000);

    session_start();
    $session_messages[] = "Successfully logged out";

    $_SESSION['session_messages'] = $session_messages;
}

header("Location: ./login.php"); //Redirecting user to home page
ob_flush();  //Flushing output buffer