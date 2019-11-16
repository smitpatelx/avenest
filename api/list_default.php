<?php
ob_start();
session_start();
require_once('../includes/constants.php');
require_once('../includes/functions.php');
require_once('../includes/db.php');

if(is_post())
{
    $selected = trimP('selected');
    $listing_id = trimP('listing_id');
    $user_id = ($_SESSION['user_s'])['user_id'];

    $conn = db_connect();
    $query = "SELECT images_path FROM listings WHERE listing_id='$listing_id' AND user_id='$user_id';";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) > 0) {
        $row = pg_fetch_assoc($result);

        $db_imgs = $row['images_path'];
        $images_path = explode('_|', $db_imgs);
        
        $val = $images_path[0];
        $images_path[0]=$images_path[$selected];
        $images_path[$selected]=$val;

        // print_r($images_path);
        $images_path = implode('_|', $images_path);
        

        $update = "UPDATE listings SET images_path = '$images_path' WHERE listing_id='$listing_id' AND user_id='$user_id' RETURNING images_path;";
        $result2 = pg_query($conn, $update);
        $data = pg_fetch_assoc($result2);
        print_r($data['images_path']);
    
    } else {
        echo "File not uploaded";
    }
}
?>