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
    $sql = "SELECT listings.*, offensives.user_id AS off_user FROM listings INNER JOIN offensives ON (listings.listing_id = offensives.listing_id) WHERE (LOWER(address) LIKE LOWER('$search_r') OR LOWER(headline) LIKE LOWER('$search_r') OR LOWER(description) LIKE LOWER('$search_r')) ORDER BY offensives.reported_on DESC LIMIT 200;";
    $result = pg_query($conn, $sql);
    
    $output = [];
    while($row = pg_fetch_assoc($result)){
        $output[] = $row;
    }
    // print_r($sql);
    echo json_encode($output);
}
?>