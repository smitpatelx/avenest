<?php
ob_start();
session_start();
require_once('../includes/constants.php');
require_once('../includes/functions.php');
require_once('../includes/db.php');

if(is_post())
{
    $listing_id = trimP('post_id');
    $user_id = trimP('user_id');
    $isliked = trimP('liked');

    $conn=db_connect();
    if ($isliked=='true') {
        $query = "INSERT INTO favourites ( mix_id, listing_id, user_id ) VALUES ('$listing_id$user_id', '$listing_id', '$user_id');";
        $result = pg_query($conn, $query);

        if ($result) {
            echo "Like Inserted";
        } else {
            echo pg_last_error($conn);
        }
    } else {
        $query = "DELETE FROM favourites WHERE listing_id='$listing_id' AND user_id='$user_id';";
        $result = pg_query($conn, $query);

        if ($result) {
            echo "Like DELETED";
        } else {
            echo pg_last_error($conn);
        }
    }
}
?>