<?php
ob_start();
session_start();
require_once('../includes/constants.php');
require_once('../includes/functions.php');
require_once('../includes/db.php');

if(is_get())
{
    $search = isset($_GET['search']) ? $_GET['search'] :'';
    $search_r = "%".$search."%";

    $user_id = ($_SESSION['user_s'])['user_id'];

    $conn = db_connect();
    $sql = "SELECT * FROM listings WHERE listings.user_id = '$user_id' AND (address LIKE '$search_r' OR headline LIKE '$search_r' OR description LIKE '$search_r') ORDER BY updated_on ASC;";
    $result = pg_query($conn, $sql);
    
    $output = [];
    while($row = pg_fetch_assoc($result)){
        $output[] = $row;
    }
    // print_r($sql);
    echo json_encode($output);
}
?>