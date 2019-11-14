<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : OCT 30, 2019
DESCRIPTION     : Update Page
-->
<?php
// Setting global variables for welcome page. 

$title  = "Update";
$file   = "update.php";
$date   = "OCT 30, 2019";
$banner = "Update";
$desc   = "Update user information.";
require("./header.php");

if(!isset($_SESSION['user_type_s'])){
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}

if(is_get())
{

    $errors=0;
    $error="";

    // Setting variables
    $salutations = $_SESSION['user_s']['salutation'];
    $first_name = $_SESSION['user_s']['first_name'];
    $last_name = $_SESSION['user_s']['last_name'];
    $email = $_SESSION['user_s']['email_address'];  
    $address_1 = $_SESSION['user_s']['street_address_1'];
    $address_2 = $_SESSION['user_s']['street_address_2'];
    $postal_code = $_SESSION['user_s']['postal_code'];
    $city = $_SESSION['user_s']['city'];
    $provinces = $_SESSION['user_s']['province'];
    $primary_phone_number = $_SESSION['user_s']['primary_phone_number'];
    $secondry_phone_number = $_SESSION['user_s']['secondry_phone_number'];
    $fax_number = $_SESSION['user_s']['fax_number'];
    $contact_method = $_SESSION['user_s']['preferred_contact_method'];
    $user_type = $_SESSION['user_s']['user_type'];

} else if(is_post())
{
    $salutations = trimP('salutations');
    $email = $_SESSION['user_s']['email_address'];
    $user_type = $_SESSION['user_s']['user_type'];
    $first_name = trimP('first_name');
    $last_name = trimP('last_name');
    $address_1 = trimP('address_1');
    $address_2 = trimP('address_2');
    $postal_code = trimP('postal_code');
    $city = trimP('city');
    $provinces = trimP('provinces');
    $primary_phone_number = trimP('primary_phone_number');
    $secondry_phone_number = trimP('secondry_phone_number');
    $fax_number = trimP('fax_number');
    $contact_method = $_POST['contact_method'];

    $errors=0;
    $error="";

    if(!isset($first_name) || empty($first_name))
    {
        $error .= "<br/>First Name is required";
        $errors+=1;
        $first_name = "";
    } else if(strlen($first_name) >= MAX_FIRST_NAME_LENGTH || strlen($first_name) <= MIN_FIRST_NAME_LENGTH ){
        $error .= "<br/>You entered \"".$first_name."\" "."First Name must be between ".MIN_FIRST_NAME_LENGTH." and ".MAX_FIRST_NAME_LENGTH."";
        $errors+=1;
        $first_name = "";
    }

    if(!isset($last_name) || empty($last_name))
    {
        $error .= "<br/>Last Name is required";
        $errors+=1;
        $last_name = "";
    } else if(strlen($last_name) >= MAX_LAST_NAME_LENGTH || strlen($last_name) <= MIN_LAST_NAME_LENGTH ){
        $error .= "<br/>You entered \"".$last_name."\" "."Last Name must be between ".MIN_LAST_NAME_LENGTH." and ".MAX_LAST_NAME_LENGTH."";
        $errors+=1;
        $last_name = "";
    }

    
    if(!isset($address_1) || empty($address_1))
    {
        $error .= "<br/>Address 1 is required";
        $errors+=1;
        $address_1 = "";
    } else if(strlen($address_1) >= MAX_ADDRESS_LENGTH || strlen($address_1) <= MIN_ADDRESS_LENGTH ){
        $error .= "<br/>You entered \"".$address_1."\" "."Address 1 must be between ".MIN_ADDRESS_LENGTH." and ".MAX_ADDRESS_LENGTH."";
        $errors+=1;
        $address_1 = "";
    }

    if(isset($address_2) && !empty($address_2))
    {
        if(strlen($address_2) >= MAX_ADDRESS_LENGTH || strlen($address_2) <= MIN_ADDRESS_LENGTH ){
            $error .= "<br/>You entered \"".$address_2."\" "."Address 2 must be between ".MIN_ADDRESS_LENGTH." and ".MAX_ADDRESS_LENGTH."";
            $errors+=1;
            $address_2 = "";
        }
    }
    
    if(!isset($postal_code) || empty($postal_code))
    {
        $error .= "<br/>Postal Code is required";
        $errors+=1;
        $postal_code = "";
    } else if(strlen($postal_code) != POSTAL_CODE_LENGTH ){
        $error .= "<br/>You entered \"".$postal_code."\" "."Postal Code must contains ".POSTAL_CODE_LENGTH." characters.";
        $errors+=1;
        $postal_code = "";
    } else if (!is_valid_postal_code($postal_code)) {
        $error .= "<br/>You entered \"".$postal_code."\" "."This canadian postal code is invalid."; 
        $errors+=1;
        $postal_code = "";
    }

    if(!isset($primary_phone_number) || empty($primary_phone_number))
    {
        $error .= "<br/>Primary Phone is required";
        $errors+=1;
        $primary_phone_number = "";
    } else if(!is_numeric($primary_phone_number)){
        $error .= "<br/>You entered \"".$primary_phone_number."\" "."Primary Phone must be numeric";
        $errors+=1;
        $primary_phone_number = "";
    } else if(strlen($primary_phone_number) > MAX_PHONE_LENGTH || strlen($primary_phone_number) < MIN_PHONE_LENGTH ){
        $error .= "<br/>You entered \"".$primary_phone_number."\" "."Primary Phone must be between ".MIN_PHONE_LENGTH." and ".MAX_PHONE_LENGTH."";
        $errors+=1;
        $primary_phone_number = "";
    } else if (!valid_phone_number($primary_phone_number)) {
        $error .= "<br/>You entered \"".$primary_phone_number."\" "."Invalid Primary Phone Number."; 
        $errors+=1;
        $primary_phone_number = "";
    }

    if(isset($secondry_phone_number) && !empty($secondry_phone_number))
    {
        if(!is_numeric($secondry_phone_number)){
            $error .= "<br/>You entered \"".$secondry_phone_number."\" "."Secondary Phone must be numeric";
            $errors+=1;
            $secondry_phone_number = "";
        } else if(strlen($secondry_phone_number) > MAX_PHONE_LENGTH || strlen($secondry_phone_number) < MIN_PHONE_LENGTH ){
            $error .= "<br/>You entered \"".$secondry_phone_number."\" "."Secondary Phone must be between ".MIN_PHONE_LENGTH." and ".MAX_PHONE_LENGTH."";
            $errors+=1;
            $secondry_phone_number = "";
        } else if (!valid_phone_number($secondry_phone_number)) {
            $error .= "<br/>You entered \"".$secondry_phone_number."\" "."Invalid Secondary Phone Number."; 
            $errors+=1;
            $secondry_phone_number = "";
        }
    }

    if(isset($fax_number) && !empty($fax_number))
    {
        if(!is_numeric($fax_number)){
            $error .= "<br/>You entered \"".$fax_number."\" "."Fax number must be numeric";
            $errors+=1;
            $fax_number = "";
        } else if(strlen($fax_number) >= MAX_FAX_LENGTH || strlen($fax_number) <= MIN_FAX_LENGTH ){
            $error .= "<br/>You entered \"".$fax_number."\" "."Fax number must be between ".MIN_FAX_LENGTH." and ".MAX_FAX_LENGTH."";
            $errors+=1;
            $fax_number = "";
        }
    }

    if(isset($contact_method) && !empty($contact_method))
    {
        if(is_numeric($contact_method)){
            $error .= "<br/>You entered \"".$contact_method."\" "."Contact Method must be alphabet.";
            $errors+=1;
            $contact_method = "";
        }
    }

    // If everything went smoothly, begin adding to database
    if($errors===0) {
        
        $persons_query = "UPDATE persons SET ( first_name, last_name, street_address_1, street_address_2, city, province, postal_code, primary_phone_number, secondry_phone_number, fax_number, salutation, preferred_contact_method)   
                    = ( \$1, \$2, \$3, \$4, \$5, \$6, \$7, \$8, \$9, \$10, \$11, \$12) WHERE user_id = \$13 RETURNING *;";

        $persons_prepare =  db_prepare('update_person', $persons_query);
        $persons_exe = db_execute('update_person', array($first_name, $last_name, $address_1, $address_2, $city, $provinces,
                $postal_code, $primary_phone_number, $secondry_phone_number, $fax_number, $salutations, $contact_method, $_SESSION['user_s']['user_id']));

        $currentPerson = pg_fetch_assoc($persons_exe);

        unset($currentPerson['user_id']);

        //Check if current data in sessions match new data
        foreach ($currentPerson as $key => $value) {
            if($currentPerson[$key] != $_SESSION['user_s'][$key]){
                echo "<br/>".$key." => ".$value;
                //If not, update session variable
                $_SESSION['user_s'][$key] = $currentPerson[$key];
            }
        }

        $cookie_currentUser =  $_SESSION['user_s'];
        $cookie_currentUser = implode("|",$cookie_currentUser);
        setcookie("LOGIN_COOKIE", $cookie_currentUser, COOKIE_LIFESPAN);

        $session_msg[] = "Updated Successfully";
        $_SESSION['session_messages'] = $session_msg;

        //Redirect user to their respective page after login
        user_redirection();
        exit();

    } else {
        $error .= "<br/>Something went wrong";
    }

}
?>

    <div class="w-full flex flex-wrap justify-center">
        <form class="h-auto w-full lg:w-2/3 xl:w-1/2 px-8 my-4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-700 my-2 text-4xl mt-10 font-headline">Update My Profile</p>
            <p class="pt-2 text-red-500 text-sm"><?php echo $error ?></p>

            <div class="flex flex-wrap flex-row mt-10">
                <?php build_simple_dropdown('salutations', 'salutation', $salutations); ?>
                <div class="w-1/3 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">First Name</p>
                    <input autofocus type="text" name="first_name" value="<?php echo $first_name; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/3 py-2">
                    <p class="text-lg font-normal py-2 text-black">Last Name</p>
                    <input type="text" name="last_name" value="<?php echo $last_name; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg focus:bg-gray-100"/>
                </div>
            </div>
            <div>
                <p class="text-lg font-normal py-2 text-black">Email-<span class="ml-2 text-red-500 font-semibold text-sm">Can't change your email</span></p>
                <input disabled='disabled' type="text" name="email" value="<?php echo $email; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-gray-100 focus:bg-gray-100"/>
            </div>
            <div class="border-t border-gray-500 my-4"></div>
            <div>
                <p class="text-lg font-normal py-2 text-black">Street Address 1</p>
                <input type="text" name="address_1" value="<?php echo $address_1; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"/>
            </div>
            <div>
                <p class="text-lg font-normal py-2 text-gray-600 flex flex-wrap justify-between content-center items-center">
                    <span>Street Address 2</span>
                    <span class="text-sm font-semibold text-blue-500 bg-white px-3 px-1 rounded shadow">Optional</span>
                </p>
                <input type="text" name="address_2" value="<?php echo $address_2; ?>" class="border border-solid border-blue-600 focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"/>
            </div>
            <div class="flex flex-wrap">
                <?php build_simple_dropdown('city', 'property', $city); ?>
                <?php build_simple_dropdown('provinces', 'province', $provinces); ?>
                <div class="w-1/3 py-2">
                    <p class="text-lg font-normal py-2 text-black">Postal Code</p>
                    <input type="text" name="postal_code" value="<?php echo $postal_code; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-full border-t border-gray-500 my-4"></div>
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Primary Phone</p>
                    <input type="text" name="primary_phone_number" value="<?php echo $primary_phone_number; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600 flex flex-wrap justify-between content-center items-center">
                        <span>Secondary Phone</span>
                        <span class="text-sm font-semibold text-blue-500 bg-white px-3 px-1 rounded shadow ">Optional</span>
                    </p>
                    <input type="text" name="secondry_phone_number" value="<?php echo $secondry_phone_number; ?>" class="border border-solid border-blue-600 focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600 flex flex-wrap justify-between content-center items-center">
                        <span>Fax</span>
                        <span class="text-sm font-semibold text-blue-500 bg-white px-3 px-1 rounded shadow ">Optional</span>
                    </p>
                    <input type="text" name="fax_number" value="<?php echo $fax_number; ?>" class="border border-solid border-blue-600 focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-full py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Preffered Contact Method</p>
                    <?php build_radio("preferred_contact_method", $contact_method) ?>
                </div>
            </div>
            <div class="border-t border-gray-500 my-4"></div>
            <div class="flex flex-wrap flex-row">

                <div class="w-full py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">User Type-<span class="ml-2 text-red-500 font-semibold text-sm">Can't change user type</span></p>
                    <div class="flex flex-wrap">
                        <label class="flex items-center mr-4">
                            <input disabled='disabled' <?php echo ($user_type=="c" ? "checked='checked'" : ""); ?> type="radio" name="user_type" value="c" class="focus:outline-none bg-white"/>
                            <span class="text-md font-semibold py-2 ml-2 text-gray-700 select-none">Clients</span>
                        </label>
                        <label class="flex items-center mr-4">
                            <input disabled='disabled' <?php echo ($user_type=="a" ? "checked='checked'" : ""); ?> type="radio" name="user_type" value="a" class="focus:outline-none py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                            <span class="text-md font-semibold py-2 ml-2 text-gray-700 select-none">Agent</span>
                        </label>
                    </div>
                </div>

            </div>
            <div class="flex flex-wrap flex-row justify-center">
                <div class="pr-3 py-2">
                    <input type="submit" value="Update" class="focus:outline-none focus:shadow-outline w-full py-2 px-3 shadow-lg rounded hover:bg-primary-500 bg-primary-300 text-white font-semibold cursor-pointer"/>
                </div>
                <div class="pr-3 py-2">
                    <input type="reset" value="Reset" class="focus:outline-none focus:shadow-outline w-full py-2 px-3 shadow-lg rounded bg-gray-500 hover:bg-gray-600 text-white font-semibold cursor-pointer"/>
                </div>
            </div>
            <div class="flex flex-wrap flex-col text-center p-2">
                <a href="./change-password.php" class="w-full font-semibold text-blue-600 hover:text-blue-700 underline">Change My Password</a>
            </div>
        </form>
    </div>

<?php
require("./footer.php");
?>