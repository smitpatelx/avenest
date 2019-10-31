<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Register Page
-->
<?php
// Initialize basic variables
$title  = "Register";
$file   = "Register.php";
$date   = "SEPT 15, 2019";
$banner = "Register";
$desc   = "Register page includes fields for email, user information and password.";
require("./header.php");

if(isset($_SESSION['user_type_s'])){
    if ($_SESSION['user_type_s'] == ADMIN){
        header("LOCATION: ./admin.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == AGENT){
        header("LOCATION: ./dashboard.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == DISABLED){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == CLIENT){
        header("LOCATION: ./welcome.php");
        ob_flush();  //Flushing output buffer after redirection
    }
}

if(is_get())
{
    

    $errors=0;
    $error="";

    if(isset($_COOKIE['REG_COOKIE']))
    {
        $reg_cookie = explode("|",$_COOKIE['REG_COOKIE']);
        print_f($reg_cookie);
    }
    else{
        // Setting variables
        $salutations = "Mr.";
        $first_name = "";
        $last_name = "";
        $email = "";  
        $address_1 = "";
        $address_2 = "";
        $postal_code = "";
        $city = "";
        $provinces = "";
        $primary_phone_number = "";
        $secondry_phone_number = "";
        $fax_number = "";
        $fax_number = "";
        $password = "";
        $confirm_password = "";
    } 
} else if(is_post())
{
    $salutations = trimP('salutations');
    $first_name = trimP('first_name');
    $last_name = trimP('last_name');
    $email = trimP('email');  
    $address_1 = trimP('address_1');
    $address_2 = trimP('address_2');
    $postal_code = trimP('postal_code');
    $city = trimP('city');
    $provinces = trimP('provinces');
    $primary_phone_number = trimP('primary_phone_number');
    $secondry_phone_number = trimP('secondry_phone_number');
    $fax_number = trimP('fax_number');
    $fax_number = trimP('fax_number');
    $password = trimP('password');
    $confirm_password = trimP('confirm_password');

    if(!isset($first_name) || empty($first_name))
    {
        $email_helper = "First Name is required";
        $errors+=1;
        $first_name = "";
    } else if(strlen($first_name) >= 50 || strlen($first_name) <= 6 ){
        $email_helper = "You entered \"".$email."\" "."First Name must be between 6 and 50";
        $errors+=1;
        $first_name = "";
    }
}
?>

    <!-- These classes directly impact the design of the website in multiple ways-->
    <div class="w-full flex flex-wrap justify-center">
        <!-- This form controls the whole page -->
        <form class="h-auto w-1/2 px-8 my-4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-600 my-2 text-2xl mt-10 font-headline">Register to Unlock More</p>
            <p class="pt-2 text-red-500 text-sm"><?php echo $error ?></p>

            <div class="flex flex-wrap flex-row mt-10">
                <?php build_simple_dropdown('salutations', 'salutation', 'Mr.'); ?>
                <div class="w-1/3 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">First Name</p>
                    <input type="text" name="first_name" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/3 py-2">
                    <p class="text-lg font-normal py-2 text-black">Last Name</p>
                    <input type="text" name="last_name" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg focus:bg-gray-100"/>
                </div>
            </div>
            <div>
                <p class="text-lg font-normal py-2 text-black">Email</p>
                <input type="text" name="email" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"/>
            </div>
            <div class="border-t border-gray-500 my-4"></div>
            <div>
                <p class="text-lg font-normal py-2 text-black">Street Address 1</p>
                <input type="text" name="address_1" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"/>
            </div>
            <div>
                <p class="text-lg font-normal py-2 text-gray-600 flex flex-wrap justify-between content-center items-center">
                    <span>Street Address 2</span>
                    <span class="text-sm font-semibold text-blue-500 bg-white px-3 px-1 rounded shadow border border-solid border-blue-600">Optional</span>
                </p>
                <input type="text" name="address_2" class="border border-solid border-blue-600 focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"/>
            </div>
            <div class="flex flex-wrap">
                <?php build_simple_dropdown('city', 'property', 'oshawa'); ?>
                <?php build_simple_dropdown('provinces', 'province', 'ON'); ?>
                <div class="w-1/3 py-2">
                    <p class="text-lg font-normal py-2 text-black">Postal Code</p>
                    <input type="text" name="postal_code" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-full border-t border-gray-500 my-4"></div>
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Primary Phone</p>
                    <input type="text" name="primary_phone_number" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600 flex flex-wrap justify-between content-center items-center">
                        <span>Secondary Phone</span>
                        <span class="text-sm font-semibold text-blue-500 bg-white px-3 px-1 rounded shadow border border-solid border-blue-600">Optional</span>
                    </p>
                    <input type="text" name="secondry_phone_number" class="border border-solid border-blue-600 focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600 flex flex-wrap justify-between content-center items-center">
                        <span>Fax</span>
                        <span class="text-sm font-semibold text-blue-500 bg-white px-3 px-1 rounded shadow border border-solid border-blue-600">Optional</span>
                    </p>
                    <input type="text" name="fax_number" class="border border-solid border-blue-600 focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-full py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Preffered Contact Method</p>
                    <?php build_radio("preferred_contact_method", 1) ?>
                </div>
            </div>
            <div class="border-t border-gray-500 my-4"></div>
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Password</p>
                    <input type="password" name="password" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Confirm Password</p>
                    <input type="password" name="confirm_password" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>

                <div class="w-full py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">User Type</p>
                    <div class="flex flex-wrap">
                        <label class="flex items-center mr-4">
                            <input checked type="radio" name="user_type" value="c" class="focus:outline-none bg-white"/>
                            <p class="text-md font-semibold py-2 ml-2 text-gray-700 select-none">Clients</p>
                        </label>
                        <label class="flex items-center mr-4">
                            <input type="radio" name="user_type" value="a" class="focus:outline-none py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                            <p class="text-md font-semibold py-2 ml-2 text-gray-700 select-none">Agent</p>
                        </label>
                    </div>
                </div>

            </div>
            <div class="flex flex-wrap flex-row justify-center">
                <div class="pr-3 py-2">
                    <input type="submit" value="Register" class="focus:outline-none focus:shadow-outline w-full py-3 px-6 shadow-lg rounded-lg bg-primary hover:bg-blue-500 text-white font-semibold cursor-pointer"/>
                </div>
                <div class="pr-3 py-2">
                    <input type="reset" value="Reset" class="focus:outline-none focus:shadow-outline w-full py-3 px-6 shadow-lg rounded-lg bg-gray-500 hover:bg-gray-600 text-white font-semibold cursor-pointer"/>
                </div>
            </div>
            <div class="flex flex-wrap flex-col text-center p-2">
                <a href="./login.php" class="w-full font-semibold text-blue-600 hover:text-blue-700 underline">Already Registered? Login Here</a>
            </div>
        </form>
    </div>

<?php
require("./footer.php");
?>