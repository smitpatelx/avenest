<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Register Page
-->
<?php
$title  = "Register";
$file   = "Register.php";
$date   = "SEPT 15, 2019";
$banner = "Register";
$desc   = "Register page includes fields for email, user information and password.";
require("./header.php");
?>

    <div class="w-full flex flex-wrap justify-center">
        <div class="w-2/3 h-auto object-cover">
            <img src="./images/room-34V7TVQQFsU-unsplash.jpg" alt="Image Side" class="object-fit w-full">
        </div>
        <form class="h-auto w-1/3 p-4" method="post">
            <p class="text-left font-bold text-gray-600 my-2 text-2xl mt-24">Register</p>
            <p class="text-left font-semibold text-gray-500 my-2">All fields are compulsary</p>

            <div class="flex flex-wrap flex-row mt-10 xl:mt-20">
                <div class="w-1/2 pr-2 py-2">
                    <input type="text" name="first_name" placeholder="First name" class="w-full py-3 px-4 shadow rounded-lg">
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <input type="text" name="last_name" placeholder="Last name" class="w-full py-3 px-4 shadow rounded-lg">
                </div>
            </div>
            <input type="text" placeholder="Email" class="w-full py-3 px-4 shadow rounded-lg my-2">
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <input type="password" name="password" placeholder="Password" class="w-full py-3 px-4 shadow rounded-lg">
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <input type="password" name="confirm_password" placeholder="Confirm Password" class="w-full py-3 px-4 shadow rounded-lg">
                </div>
            </div>
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <input type="submit" value="Register" class="w-full py-3 px-4 shadow rounded-lg bg-primary hover:bg-transparent text-white hover:text-primary border hover:border-blue-600 font-semibold cursor-pointer">
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <input type="reset" value="Reset" class="w-full py-3 px-4 shadow rounded-lg bg-gray-300 hover:bg-transparent  text-black hover:text-gray-600 border hover:border-blue-600 font-semibold cursor-pointer">
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