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
?>

    <!-- These classes directly impact the design of the website in multiple ways-->
    <div class="w-full flex flex-wrap justify-center">
        <!-- This form controls the whole page -->
        <form class="h-auto w-1/2 px-8 my-4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-600 my-2 text-2xl mt-10 font-headline">Register to Unlock More</p>


            <div class="flex flex-wrap flex-row mt-10">
                <?php build_simple_dropdown('salutations', 'salutation', 'Mr.'); ?>
                <div class="w-1/3 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">First Name</p>
                    <input type="text" name="first_name" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
                </div>
                <div class="w-1/3 pl-2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Last Name</p>
                    <input type="text" name="last_name" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
                </div>
            </div>
            <div>
                <p class="text-lg font-normal py-2 text-gray-600">Email</p>
                <input type="text" name="email" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg my-2 bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
            </div>
            <div>
                <p class="text-lg font-normal py-2 text-gray-600">Street Address 1</p>
                <input type="text" name="address_1" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg my-2 bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
            </div>
            <div>
                <p class="text-lg font-normal py-2 text-gray-600">Street Address 2</p>
                <input type="text" name="address_2" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg my-2 bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
            </div>
            <div class="flex flex-wrap">
                <?php build_simple_dropdown('city', 'property', 'oshawa'); ?>
                <?php build_simple_dropdown('provinces', 'province', 'ON'); ?>
                <div class="w-1/3 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Postal Code</p>
                    <input type="text" name="postal_code" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
                </div>
                
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Primary Phone</p>
                    <input type="text" name="primary_phone_number" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
                </div>
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Secondary Phone</p>
                    <input type="text" name="secondry_phone_number" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
                </div>
            </div>
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Password</p>
                    <input type="password" name="password" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Confirm Password</p>
                    <input type="password" name="confirm_password" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
                </div>

                <div class="w-full py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Preffered Contact Method</p>
                    <?php build_radio("preferred_contact_method", 1) ?>
                </div>

                <div class="w-full py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">User Type</p>
                    <div class="flex flex-wrap">
                        <label class="flex items-center mr-4">
                            <input checked type="radio" name="user_type" value="c" class="focus:outline-none bg-white"/>
                            <p class="text-md font-semibold py-2 ml-2 text-gray-700">Clients</p>
                        </label>
                        <label class="flex items-center mr-4">
                            <input type="radio" name="user_type" value="a" class="focus:outline-none py-3 px-4 shadow rounded-lg bg-white border-solid border border-blue-400 focus:bg-gray-100"/>
                            <p class="text-md font-semibold py-2 ml-2 text-gray-700">Agent</p>
                        </label>
                    </div>
                </div>

            </div>
            <div class="flex flex-wrap flex-row justify-center">
                <div class="pr-3 py-2">
                    <input type="submit" value="Register" class="focus:outline-none focus:shadow-outline w-full py-3 px-6 shadow rounded-lg bg-primary hover:bg-blue-500 text-white font-semibold cursor-pointer"/>
                </div>
                <div class="pr-3 py-2">
                    <input type="reset" value="Reset" class="focus:outline-none focus:shadow-outline w-full py-3 px-6 shadow rounded-lg bg-gray-500 hover:bg-gray-600 text-white font-semibold cursor-pointer"/>
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