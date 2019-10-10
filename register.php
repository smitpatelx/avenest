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
?>

    <!-- These classes directly impact the design of the website in multiple ways-->
    <div class="w-full flex flex-wrap justify-center">
        <div class="w-2/3 h-auto object-cover">
            <!-- import an image nicely-->
            <img src="./images/room-34V7TVQQFsU-unsplash.jpg" alt="Image Side" class="object-fit w-full"/>
        </div>

        <!-- This form controls the whole page -->
        <form class="h-auto w-1/3 p-4 shadow-inner" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-600 my-2 text-2xl mt-10 font-headline">Register</p>
            <p class="text-left font-semibold text-gray-500 my-2">All fields are compulsary</p>

            <div class="flex flex-wrap flex-row mt-10 xl:mt-20">
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-semibold py-2 text-gray-500">First Name</p>
                    <input type="text" name="first_name" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg"/>
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <p class="text-lg font-semibold py-2 text-gray-500">Last Name</p>
                    <input type="text" name="last_name" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg"/>
                </div>
            </div>
            <div>
                <p class="text-lg font-semibold py-2 text-gray-500">Email</p>
                <input type="text" name="email" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg my-2"/>
            </div>
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-semibold py-2 text-gray-500">Password</p>
                    <input type="password" name="password" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg"/>
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <p class="text-lg font-semibold py-2 text-gray-500">Confirm Password</p>
                    <input type="password" name="confirm_password" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg"/>
                </div>
            </div>
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <input type="submit" value="Register" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-primary hover:bg-transparent text-white hover:text-primary border hover:border-blue-600 font-semibold cursor-pointer"/>
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <input type="reset" value="Reset" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow rounded-lg bg-gray-300 hover:bg-transparent  text-black hover:text-gray-600 border hover:border-blue-600 font-semibold cursor-pointer"/>
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