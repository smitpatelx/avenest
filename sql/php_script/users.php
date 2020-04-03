<?php
include('../../includes/constants.php');
include('../../includes/db.php');
include('../../includes/functions.php');
require './randoms.php';

$conn = db_connect();
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

    $current_date = date("Y-m-d",time());

        $query1 = "SELECT * 
        FROM users
        WHERE users.email_address = \$1";

        $prepare1 = db_prepare('user_exist', $query1);
        $exe1 = db_execute('user_exist', array($email));
        
        if(pg_num_rows($exe1) > 0){
            
        } else {
            $users_query = "INSERT INTO users (password, user_type, email_address, enrol_date, last_access) 
                        VALUES (\$1, \$2, \$3, \$4, \$5) RETURNING user_id;";
            $users_prepare =  db_prepare('insert_new_user', $users_query);
            $users_exe = db_execute('insert_new_user', array($password, $user_type, $email, $current_date, $current_date));

            $currentUser = pg_fetch_assoc($users_exe);

            $user_id = $currentUser['user_id'];

            $persons_query = "INSERT INTO persons (user_id, first_name, last_name, street_address_1, street_address_2, city, province, postal_code, primary_phone_number, secondry_phone_number, fax_number, salutation, preferred_contact_method)  
                        VALUES ($user_id, '$first_name', '$last_name', '$address_1', '', $city, $province, '$postal_code', '$primary_phone_number' , '$secondry_phone_number' , '' , $salutation , '$contact_method' );";
            $persons_prepare =  pg_query(db_connect(), $persons_query);

            if($persons_exe){

                echo $x."\n";
            } else {
                $error .= "<br/>Error inserting in persons";
            }
        }
    
}
?>