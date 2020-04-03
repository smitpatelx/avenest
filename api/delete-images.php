<?php
ob_start();
session_start();
require_once('../includes/constants.php');
require_once('../includes/functions.php');
require_once('../includes/db.php');

if(is_post())
{
    $index = isset($_POST['index']) ? trimP('index') : null;
    $listing_id = trimP('listing_id');
    $user_id = ($_SESSION['user_s'])['user_id'];

    $conn = db_connect();
    $query = "SELECT images_path FROM listings WHERE listing_id='$listing_id' AND user_id='$user_id';";
    $result = pg_query($conn, $query);

    if (pg_num_rows($result) > 0) {
        $row = pg_fetch_assoc($result);
        $db_imgs = $row['images_path'];

        if($index!=null){
            //Delete Single Images
            $images_path = explode('_|', $db_imgs);

            //Delete Actual Image
            if($images_path[$index]!='./images/listing/default.svg') {
                unlink('.'.$images_path[$index]);
            }
            $images_path[$index]='./images/listing/default.svg';
            $images_path = implode('_|', $images_path);

            $update = "UPDATE listings SET images_path = '$images_path' WHERE listing_id='$listing_id' AND user_id='$user_id' RETURNING images_path;";
            $result2 = pg_query($conn, $update);
            $data = pg_fetch_assoc($result2);
            print_r($data['images_path']);
        } else {
            //Delete All Images
            $images_path = explode('_|', $db_imgs);
            foreach($images_path as $img){
                if($img!='./images/listing/default.svg') {
                    unlink('.'.$img);
                }
            }

            $images_path = ['./images/listing/default.svg','./images/listing/default.svg','./images/listing/default.svg','./images/listing/default.svg'];
            $images_path = implode('_|', $images_path);
            $update = "UPDATE listings SET images_path = '$images_path' WHERE listing_id='$listing_id' AND user_id='$user_id' RETURNING images_path;";
            $result2 = pg_query($conn, $update);
            
            if($result2){
                echo "All images deleted successfully;";
            } else {
                echo "Problem Deleting Image";
            }
        }
    } else {
        echo "Database Error Occured.";
    }

}
?>