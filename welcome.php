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

<<<<<<< HEAD
print_r($_COOKIE);

print("<br/><br/>");
$cookie_currentUser = explode("|",$_COOKIE['LOGIN_COOKIE']);
print_r($cookie_currentUser);
print("<br/><br/>");
print_r($cookie_currentUser[1]);
=======
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
    }
} else {
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}
>>>>>>> 8c2fefc75f8452d66d795556a95cf668228fbaee
?>
    <div>
        Welcome
    </div>

<?php
require("./footer.php");
?>