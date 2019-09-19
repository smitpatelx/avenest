<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Footer section
-->

    <div class="w-full flex flex-wrap flex-col">
        <div class="w-full flex flex-wrap flex-row justify-center text-lg font-semibold uppercase mt-6">
            <a href="./index.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500">
                Home
            </a>
            <?php

            if(isset($_SESSION['email_s'])){
                echo '<a href="./logout.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500">
                        Logout
                    </a>';
            } else {
                echo '<a href="./login.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500"> 
                    Login
                </a>
                <a href="./register.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500"> 
                    Register
                </a>';
            }
            ?>
            
        </div>
        <div class="w-full py-4 px-64 justify-center">
            <p class="text-sm text-gray-500 text-center">This website must not use for personal or commercial purpose without permission. We believe in strict copyright rules. This project is created as per the requirements mentioned in Course WEBD3201</p>
        </div>  
        <div class="w-full py-4 justify-center">
            <?php display_copyright() ?>
        </div> 
    </div>
    <div class="w-full upperline-nav py-2"></div>
    <?php echo notification_message(); ?>
</body>
</html>