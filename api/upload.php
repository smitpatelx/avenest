<?php
ob_start();
session_start();
require_once('../includes/constants.php');
require_once('../includes/functions.php');
require_once('../includes/db.php');

if(is_post())
{
    $index = trimP('index');
    $listing_id = trimP('listing_id');
    $url = $_FILES['url']['tmp_name'];
    $user_id = ($_SESSION['user_s'])['user_id'];
    
    $newimglocation = $_SERVER['DOCUMENT_ROOT'].IMAGE_PATH.$user_id."_".$listing_id.$index.".jpg";
    $img_url = "./images/listing/".$user_id."_".$listing_id.$index.".jpg";

    $uploaded = move_uploaded_file(
        $url, 
        $newimglocation
    );

    if($uploaded){
        $conn = db_connect();
        $query = "SELECT images_path FROM listings WHERE listing_id='$listing_id' AND user_id='$user_id';";
        $result = pg_query($conn, $query);

        if (pg_num_rows($result) > 0) {
            $row = pg_fetch_assoc($result);

            $db_imgs = $row['images_path'];
            $images_path = explode('_|', $db_imgs);
            
            $images_path[$index]=$img_url;

            $images_path = implode('_|', $images_path);
            

            $update = "UPDATE listings SET images_path = '$images_path' WHERE listing_id='$listing_id' AND user_id='$user_id' RETURNING images_path;";
            $result2 = pg_query($conn, $update);
            $data = pg_fetch_assoc($result2);
            print_r($data['images_path']);
        }
    } else {
        echo "File not uploaded";
    }
}
?>