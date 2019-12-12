<?php
ob_start();
session_start();
require_once('../includes/constants.php');
require_once('../includes/functions.php');
require_once('../includes/db.php');

if(is_post())
{
    $listing_id = trimP('post_id');
    $user_id = ($_SESSION['user_s'])['user_id'];
    $isOffensive = trimP('isOffensive');
    $status = trimP('status');
    $current_date = date("Y-m-d",time());

    $conn=db_connect();
    if ($isOffensive=='true') {
        $query = "INSERT INTO offensives ( listing_id, user_id, reported_on, status ) VALUES ('$listing_id', '$user_id', '$current_date', '$status');";
        $result = pg_query($conn, $query);

        if ($result) {
            echo "Offensive Inserted";
        } else {
            echo pg_last_error($conn);
        }
    } else {
        $query = "DELETE FROM offensives WHERE listing_id='$listing_id' AND user_id='$user_id';";
        $result = pg_query($conn, $query);

        if ($result) {
            echo "Offensive DELETED";
        } else {
            echo pg_last_error($conn);
        }
    }
}
?>