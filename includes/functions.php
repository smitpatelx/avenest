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
        header("LOCATION: ./aup.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == CLIENT){
        header("LOCATION: ./welcome.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == INCOMPLETE){
        header("LOCATION: ./aup.php");
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

function create_pagination($current_page,$total_pages){
    $output = "";
    if($current_page>1){
        $output .= '<a href="./listing-search-results.php?page='.(1).'" class="py-2 px-3 m-1 shadow-lg rounded text-gray-500 border border-solid border-gray-400 hover:border-gray-800 hover:text-gray-800 bg-transparent"><i class="fas fa-chevron-left"></i><i class="fas fa-chevron-left"></i></a>';
        $output .= '<a href="./listing-search-results.php?page='.($current_page-1).'" class="py-2 px-3 m-1 shadow-lg rounded text-gray-500 border border-solid border-gray-400 hover:border-gray-800 hover:text-gray-800 bg-transparent"><i class="fas fa-chevron-left"></i></a>';
    }
    for($i = 1; $i <= $total_pages; $i++){
        // 1<=10+5
        if($i <= ($current_page + 5) && $i >= ($current_page - 5)) {
            if($i == $current_page){
                $output .= '<a href="./listing-search-results.php?page='.$i.'" class="leading-tight py-2 px-3 m-1 shadow-lg rounded text-white bg-gray-500">'.$i.'</a>';
            } else {
                $output .= '<a href="./listing-search-results.php?page='.$i.'" class="leading-tight py-2 px-3 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">'.$i.'</a>';
            }
        }
    }
    if($current_page<$total_pages){
        $output .= '<a href="./listing-search-results.php?page='.($current_page+1).'" class="py-2 px-3 m-1 shadow-lg rounded text-gray-500 border border-solid border-gray-400 hover:border-gray-800 hover:text-gray-800 bg-transparent"><i class="fas fa-chevron-right"></i></a>';
        $output .= '<a href="./listing-search-results.php?page='.($total_pages).'" class="py-2 px-3 m-1 shadow-lg rounded text-gray-500 border border-solid border-gray-400 hover:border-gray-800 hover:text-gray-800 bg-transparent"><i class="fas fa-chevron-right"></i><i class="fas fa-chevron-right"></i></a>';
    }
    echo $output;
}

function random_str($length = 10, $keyspace = '#$&@!0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ#$&@!') {
    $str = '';
    $max = mb_strlen($keyspace, '8bit') - 1;
    if ($max < 1) {
        throw new Exception('$keyspace must be at least two characters long');
    }
    for ($i = 0; $i < $length; ++$i) {
        $str .= $keyspace[random_int(0, $max)];
    }
    return $str;
}

function json_response($code = 200,$message = null)
{
    // clear the old headers
    header_remove();
    // set the actual code
    http_response_code($code);
    // set the header to make sure cache is forced
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    // treat this as json
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        500 => '500 Internal Server Error'
        );
    // ok, validation error, or failure
    header('Status: '.$status[$code]);
    // return the encoded json
    return json_encode(array(
        'status' => $code < 300, // success or not?
        'message' => $message
        ));
}

?>