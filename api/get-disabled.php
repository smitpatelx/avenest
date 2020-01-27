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
        persons.*, 
        users.email_address AS email_address, users.enrol_date AS enrol_date, users.last_access AS last_access 
        FROM persons 
        INNER JOIN users ON users.user_id = persons.user_id 
        WHERE (
            LOWER(persons.first_name) LIKE LOWER('$search_r') OR LOWER(persons.postal_code) LIKE LOWER('$search_r') OR LOWER(persons.last_name) LIKE LOWER('$search_r') OR LOWER(persons.primary_phone_number) LIKE LOWER('$search_r') OR LOWER(users.email_address) LIKE LOWER('$search_r')
        ) AND
        users.user_type='d'
        ORDER BY users.enrol_date DESC LIMIT 200;";
    
    $result = pg_query($conn, $sql);
    
    $output = [];
    while($row = pg_fetch_assoc($result)){
        $output[] = $row;
    }
    // print_r($sql);
    echo json_encode($output);
}
?>