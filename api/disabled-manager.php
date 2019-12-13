<?php
ob_start();
session_start();
require_once('../includes/constants.php');
require_once('../includes/functions.php');
require_once('../includes/db.php');

if(is_post())
{
    $user_id = trimP('user_id');

    if(!isset($_POST['case'])){
        exit();
    } else {
        $case = trimP('case');
    }

    $conn=db_connect();
    
    if($case=='delete_user'){
        $query = "DELETE FROM users USING persons WHERE users.user_id='$user_id' AND persons.user_id='$user_id';";
        $result = pg_query($conn, $query);

        if ($result) {
            //Delete All Favourites Related to Pending Users
            $del_all_favs = "DELETE FROM favourites WHERE user_id='$user_id';";
            $result_fav = pg_query($conn, $del_all_favs);

            if ($result) {
                echo json_response(200, 'Success Deleting user');
            } else {
                echo json_response(400, pg_last_error($conn));
            }
        } else {
            echo json_response(400, pg_last_error($conn));
        }

    } else if($case=='approve_client'){
        $query = "UPDATE users SET user_type='c' WHERE user_id='$user_id';";
        $result = pg_query($conn, $query);

        if ($result) {
            echo json_response(200, 'Client Approved');
        } else {
            echo json_response(400, pg_last_error($conn));
        }
    } else if($case=='approve_agent'){
        $query = "UPDATE users SET user_type='a' WHERE user_id='$user_id';";
        $result = pg_query($conn, $query);

        if ($result) {
            echo json_response(200, 'Agent Approved');
        } else {
            echo json_response(400, pg_last_error($conn));
        }
    }
}
?>