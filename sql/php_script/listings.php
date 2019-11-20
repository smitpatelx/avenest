<?php
include('../../includes/constants.php');
include('../../includes/db.php');
include('../../includes/functions.php');
require './randoms.php';

$conn = db_connect();

$sql_user_a = "SELECT user_id FROM users WHERE user_type='a';";
$res = pg_query($conn, $sql_user_a);
// $usersss=pg_fetch_array($res);
$user_id_arr = [];
while ($usersss=pg_fetch_array($res)) {
    $user_id_arr[] = $usersss[0];
}

foreach(range(0, 1100) as $x) {
    $first_name = $first_names[$x];
    $last_name = $last_names[$x];
    $password = hashmd5('smitpatelx');
    $user_type = $user_types[array_rand($user_types)];
    $email = $first_name.$email_addresss[array_rand($email_addresss)];
    $address_1 = $street_address_1s[$x];
    $address_2 = $street_address_2s[$x];
    $city = $cities[array_rand($cities)];
    $postal_code = $postalcodes[array_rand($postalcodes)];
    $primary_phone_number = preg_replace('/\s/', '', $primary_phone_numbers[$x]);
    $secondry_phone_number = preg_replace('/\s/', '', $secondry_phone_numbers[$x]);
    $salutation = $salutations[array_rand($salutations)];
    $province = $provinces[array_rand($provinces)];
    $contact_method = $p_c_m[array_rand($p_c_m)];
    
    $price=mt_rand(100000, 999999);
    $user_id=$user_id_arr[array_rand($user_id_arr)];
    $listing_status = $listing_statuses[array_rand($listing_statuses)];
    $property_option = $property_options_s[array_rand($property_options_s)];
    $headline="Posted by ".$first_name;
    $description="dsa das d asd dsad";
    $area = mt_rand(10000, 99999);
    $bedrooms = array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
    $bathrooms = array_rand([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]);
    $pets_friendly= array_rand([1, 0]);

    $current_date = date("Y-m-d",time());

    $images_path = ['./images/listing/default.svg','./images/listing/default.svg','./images/listing/default.svg','./images/listing/default.svg'];
    $images_path = implode('_|', $images_path);

    $listings_query = "INSERT INTO listings( user_id, status, price, headline, description, postal_code, images_path, city, property_options, province, bedrooms, bathrooms, address, area, phone, pets_friendly, created_on, updated_on)   
                VALUES (\$1, \$2, \$3, \$4, \$5, \$6, \$7, \$8, \$9, \$10, \$11, \$12, \$13, \$14 , \$15, \$16, \$17, \$18);";

    $listings_prepare =  db_prepare('insert_new_listing', $listings_query);
    $listings_exe = db_execute('insert_new_listing', array($user_id, $listing_status, $price, $headline, $description, $postal_code, $images_path, $city, $property_option, $province, $bedrooms, $bathrooms, $address_1, $area, $primary_phone_number, $pets_friendly, $current_date, $current_date));

    if($listings_exe) {
        echo $x."<br/>";
    } else {
        $error .= "<br/>Database error.";
    }
    
}
// echo $password;
?>