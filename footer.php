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
                echo '<a href="./listing-search.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500"> 
                    Listings
                </a>
                <a href="./login.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500"> 
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
    <div class="w-full upperline-nav pt-2 pb-1"></div>
    
    <!-- Import jquery -->
    <script type="text/javascript" src="./includes/js/jquery.min.js"></script>
    <script type="text/javascript" src="./includes/js/notiflix.min.js"></script>
    <script type="text/javascript" src="./includes/js/js/all.min.js"></script>
    <script type="text/javascript" src="./includes/js/custom.js"></script>

    <?php 
        echo notification_message(); 
        // if(strlen(notification_message()) <= 0){
        //     unset($_SESSION['session_messages']);
        // }
    ?>
    
    <script type="text/javascript">
        Notiflix.Loading.Init({ svgColor:"#0365f3", }); 
        Notiflix.Loading.Pulse();

        $(window).bind("load", function () {
            Notiflix.Notify.Init({ distance:"50px", info: {background:"#0c82d8",}, }); 
            Notiflix.Loading.Remove();
        });
    </script>
</body>
</html>