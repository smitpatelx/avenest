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
    $sql = "SELECT 
        listings.*, 
        owner.user_id AS owner_id, owner.first_name AS owner_fn, owner.last_name AS owner_ln,
        reporter.user_id AS reporter_id, reporter.first_name AS reporter_fn, reporter.last_name AS reporter_ln 
        FROM listings 
        INNER JOIN offensives ON offensives.listing_id = listings.listing_id 
        INNER JOIN persons AS owner ON owner.user_id = listings.user_id 
        INNER JOIN persons AS reporter ON reporter.user_id = offensives.user_id 
        WHERE (LOWER(listings.address) LIKE LOWER('$search_r') OR LOWER(listings.headline) LIKE LOWER('$search_r') OR LOWER(listings.description) LIKE LOWER('$search_r')) ORDER BY offensives.reported_on DESC LIMIT 200;";
    
    $result = pg_query($conn, $sql);
    
    $output = [];
    while($row = pg_fetch_assoc($result)){
        $output[] = $row;
    }
    // print_r($sql);
    echo json_encode($output);
}
?>