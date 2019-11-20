<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Function
-->
<?php

function display_copyright(){
    echo "<p class='text-lg text-gray-500 font-semibold'>@copyright - ".date("Y")." avenest</p>";
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
    }else if ($_SESSION['user_type_s'] == INCOMPLETE){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }
}

function notification_message(){
    if( isset($_SESSION['session_messages']) ) {
        $msgs = $_SESSION['session_messages'];
        $color = isset($_SESSION['session_messages_c']) ? $_SESSION['session_messages_c'] : 'bg-green-600 text-white';
        $icon = isset($_SESSION['session_messages_i']) ? $_SESSION['session_messages_i'] : 'fas fa-check';
        $output = "";
        $output .= "<div>";
        foreach($msgs as $msg){
            $output .= "<Notification icon='".$icon."' color='".$color."' msg='".$msg."' :timeout='3000'/>";
        }
        $output .= "</div>";
        unset($_SESSION['session_messages']);
        return $output;
    }
}

function is_valid_postal_code($value)
{
    //to remove all whitespace in between
    $trimvalue = preg_replace('/\s+/', '', $value);

    //to determine valid canada postal code. validation information from https://en.wikipedia.org/wiki/Postal_codes_in_Canada
    if(preg_match("/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i", $trimvalue))
    { 
        //postal code is valid
        return true;
    }
    else {
        //postal code is in-valid
        return false;
    }
}

function senetize_sentence($value){
    //remove underscore and add space instead
    $v = preg_replace("/[\_]/"," ", $value);
    $v2 = trim(ucwords($v));
    return $v2;
}

function valid_phone_number($phonenumber) {

    $phonenumber = preg_replace("/[^\d]/","",$phonenumber);

    $areacode = substr($phonenumber, 0, 3);
    $exchange = substr($phonenumber, 3, 3);
    $dial_sequence = substr($phonenumber, 6, 4);
    
    if ( ($areacode < MAX_AREA_CODE && $areacode > MIN_AREA_CODE) 
    && ($exchange < MAX_AREA_CODE && $exchange > MIN_AREA_CODE)
    && ($dial_sequence < MAX_DIAL_SEQUENCE && $dial_sequence > MIN_DIAL_SEQUENCE)) {
        return true;
    } else {
        return false;
    }
}

function display_phone_number($phonenumber)
{
    // Allow only Digits, remove all other characters.
    $phonenumber = preg_replace("/[^\d]/","",$phonenumber);
    
    // get phonenumber length.
    $length = strlen($phonenumber);
    
    // if phonenumber = 10
    if($length == 10) {
        $phonenumber = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1)$2-$3", $phonenumber);
    }
    else if($length > 10) {
        $extra = "";
        $extra = $length - 10;
        $nonextra = substr($phonenumber, 0, 10);
        $phonenumber = preg_replace("/^1?(\d{3})(\d{3})(\d{4})$/", "($1)$2-$3", $nonextra)." ext.".substr($phonenumber, -$extra);
    }

    return $phonenumber;
}

function is_bit_set($power, $decimal) {
	if((pow(2,$power)) & ($decimal)) 
		return 1;
	else
		return 0;
}

function sum_check_box($array)
{
	$num_checks = count($array); 
	$sum = 0;
	for ($i = 0; $i < $num_checks; $i++)
	{
	  $sum += $array[$i]; 
	}
	return $sum;
}

?>