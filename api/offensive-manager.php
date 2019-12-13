<?php
ob_start();
session_start();
require_once('../includes/constants.php');
require_once('../includes/functions.php');
require_once('../includes/db.php');

if(is_post())
{
    $listing_id = isset($_POST['listing_id']) ? trimP('listing_id') : null;
    $user_id = isset($_POST['user_id']) ? trimP('user_id') : null;

    if(!isset($_POST['case'])){
        exit();
    } else {
        $case = trimP('case');
    }

    $conn=db_connect();
    
    if($case=='delete_listing'){
        $query = "DELETE FROM listings WHERE listing_id='$listing_id';";
        $result = pg_query($conn, $query);

        if ($result) {
            echo json_response(200, 'Listing Deleted');
        } else {
            echo json_response(400, pg_last_error($conn));
        }

    } else if($case=='hide_listing'){
        $query = "UPDATE listings SET status='h' WHERE listing_id='$listing_id';";
        $result = pg_query($conn, $query);

        if ($result) {
            echo json_response(200, 'Listing Hidden');
        } else {
            echo json_response(400, pg_last_error($conn));
        }
    }  else if($case=='disable_reporting_user' || $case=='disable_owner'){
        $query = "UPDATE users SET user_type='d' WHERE user_id='$user_id';";
        $result = pg_query($conn, $query);

        if ($result) {
            //Delete All Favourites Related to Disabled Users
            $del_all_favs = "DELETE FROM favourites WHERE user_id='$user_id';";
            $result_fav = pg_query($conn, $del_all_favs);

            if ($result) {
                echo json_response(200, 'Success disabling user');
            } else {
                echo json_response(400, pg_last_error($conn));
            }
        } else {
            echo json_response(400, pg_last_error($conn));
        }
    } 
}
?>