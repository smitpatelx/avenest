<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Function
-->
<?php

function display_copyright(){
    echo "<p class='text-lg text-black text-center'>@copyright - ".date("Y")." avenest</p>";
}

function is_get(){
    return $_SERVER["REQUEST_METHOD"] == "GET" ? true : false;
}

function is_post(){
    return $_SERVER["REQUEST_METHOD"] == "POST" ? true : false;
}

function trimP($var){
    return trim($_POST[$var]);
}

function trimG($var){
    return trim($_GET[$var]);
}

function hashmd5($var){
    return hash(MD5, $var);
}

function user_redirection() {
    if ($_SESSION['user_type_s'] == ADMIN){
        header("LOCATION: ./admin.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == AGENT){
        header("LOCATION: ./dashboard.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == DISABLED){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == CLIENT){
        header("LOCATION: ./welcome.php");
        ob_flush();  //Flushing output buffer after redirection
    }
}

function notification_message(){
    if( isset($_SESSION['session_messages']) ) {
        $msgs = $_SESSION['session_messages'];
        $output = "";
        $output .= "<script>Notiflix.Notify.Init({ distance:'60px', info: {background:'#0c82d8',}, }); ";
        foreach($msgs as $msg){
            $output .= "Notiflix.Notify.Success('".$msg."');";
        }
        $output .= "</script>";
        unset($_SESSION['session_messages']);
        return $output;
    }
}

?>