<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Login Page
-->
<?php
$title  = "Login";
$file   = "login.php";
$date   = "SEPT 15, 2019";
$banner = "Login";
$desc   = "Login page includes fields for email and password.";
require("./header.php");
?>

    <div class="w-full flex flex-wrap justify-center">
        <div class="w-2/3 h-auto object-cover">
            <img src="./images/room-34V7TVQQFsU-unsplash.jpg" alt="room-34V7TVQQFsU-unsplash.jpg" class="object-fit w-full">
        </div>
        <form class="h-auto w-1/3 p-4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <p class="text-left font-bold text-gray-600 my-2 text-2xl mt-24">Login</p>
            <p class="text-left font-semibold text-gray-500 my-2">Email and Password needed</p>

            <input type="text" name="email" placeholder="Email" class="w-full p-2 shadow rounded-lg my-2 mt-24">
            <input type="password" name="password" placeholder="Password" class="w-full p-2 shadow rounded-lg my-2">
            <div class="flex flex-wrap flex-row">
                <div class="w-1/2 pr-2 py-2">
                    <input type="submit" value="Login" class="w-full p-2 shadow rounded-lg bg-blue-600 hover:bg-blue-700 text-white cursor-pointer">
                </div>
                <div class="w-1/2 pl-2 py-2">
                    <input type="reset" value="Reset" class="w-full p-2 shadow rounded-lg bg-gray-300 hover:bg-gray-600 text-black hover:text-white cursor-pointer">
                </div>
            </div>
            <div class="flex flex-wrap flex-col text-center p-2">
                <a href="./register.php" class="w-full font-semibold text-blue-600 hover:text-blue-700 underline">Do not have an account? Register Here</a>
            </div>
        </form>
    </div>

<?php
require("./footer.php");
?>