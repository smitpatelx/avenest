<?php
ob_start();
require('./includes/constants.php');
require('./includes/functions.php');
require('./includes/db.php');
session_start();
?>
<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Header section
-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>AveNest | <?php echo($title); ?></title>
    
    <link rel="icon" type="image/png" sizes="32x32" href="./images/logo2.png">
    <!-- Import google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/webd3201.css"/>
    <link rel="stylesheet" href="./css/all.min.css"/>
    <link rel="stylesheet" href="./css/tailwind.min.css"/>
    <link rel="stylesheet" href="./css/notiflix.min.css"/>

    <!-- Import jquery -->
    <script type="text/javascript" src="./includes/js/jquery.min.js" async></script>
    <script type="text/javascript" src="./includes/js/js/all.min.js" async></script>
    <script type="text/javascript" src="./includes/js/notiflix.min.js"></script>
    
</head>
<body>
    <script>
        Notiflix.Notify.Init({ distance:"100px", info: {background:"#0c82d8",}, }); 
        // Notiflix.Notify.Success('Sol lucet omnibus');
        Notiflix.Loading.Init({ svgColor:"#0365f3", }); 
        Notiflix.Loading.Pulse();
        Notiflix.Loading.Remove(1000);
    </script>
    <div class="w-full upperline-nav"></div>
    <div class="bg-white flex flex-wrap py-6 px-24">
        <div class="w-1/4">
            <a href="./index.php">
                <img src="./images/avenest.png" alt="AveNest" style="width:170px;">
            </a>
        </div>
        <div class="w-3/4 justify-end flex flex-wrap flex-row font-semibold text-lg uppercase">
            <a href="./index.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500">
                Home
            </a>
            <a href="./login.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500"> 
                Login
            </a>
            <a href="./register.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500"> 
                Register
            </a>
            <a href="./logout.php" class="px-3 py-1 mr-3 text-blue-600 hover:text-gray-500">
                Logout
            </a>
        </div>
    </div>
    