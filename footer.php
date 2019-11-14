<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Footer section
-->
    </div>
    <div class="w-full flex flex-wrap flex-col">
        <div class="w-full flex flex-wrap flex-row justify-center text-lg font-semibold uppercase mt-6">
            <a href="./index.php" class="px-3 py-1 mr-1 md:mr-3 text-blue-600 hover:text-gray-500">
                Home
            </a>
            <a href="./listing-search.php" class="px-3 py-1 mr-1 md:mr-3 text-blue-600 hover:text-gray-500"> 
                    Listings
            </a>
            <?php

            if(isset($_SESSION['user_type_s'])){
                echo '<a href="./logout.php" class="px-3 py-1 mr-1 md:mr-3 text-blue-600 hover:text-gray-500">
                        Logout
                    </a>';
            } else {
                echo '<a href="./login.php" class="px-3 py-1 mr-1 md:mr-3 text-blue-600 hover:text-gray-500"> 
                    Login
                </a>
                <a href="./register.php" class="px-3 py-1 mr-1 md:mr-3 text-blue-600 hover:text-gray-500"> 
                    Register
                </a>';
            }
            ?>
            
        </div>
        <div class="w-full py-4 px-4 lg:px-64 justify-center">
            <p class="text-sm text-gray-500 text-center">This website must not use for personal or commercial purpose without permission. We believe in strict copyright rules. This project is created as per the requirements mentioned in Course WEBD3201</p>
        </div>  
        <div class="w-full flex flex-wrap py-4 justify-between px-4">
            <?php display_copyright() ?>
            <p>
                <a href="http://validator.w3.org/check?uri=referer"><img
                src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
            </p>
        </div> 
    </div>
    <?php 
        echo notification_message(); 
    ?>
    </div>
    <div class="w-full upperline-nav py-4"></div>
    <!-- Import jquery -->
    <script type="text/javascript" src="./includes/js/jquery.min.js"></script>
    <script type="text/javascript" src="./includes/js/custom.js"></script>
    <noscript><strong>We're sorry but avenest doesn't work properly without JavaScript enabled. Please enable it to continue.</strong></noscript>
    
    <script src="./dist/js/app.js"></script>
</body>
</html>