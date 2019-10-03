<?php
ob_start();
session_start();
require('./includes/constants.php');
require('./includes/functions.php');
require('./includes/db.php');
?>
<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
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
    
    <link rel="icon" type="image/png" href="./images/logo2.png"/>
    <!-- Import google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800|Playfair+Display:400,500,600,700,800" rel="stylesheet"/>
    <link rel="stylesheet" href="./css/webd3201.css"/>
    <link rel="stylesheet" href="./css/all.min.css"/>
    <link rel="stylesheet" href="./css/tailwind.min.css"/>
    <link rel="stylesheet" href="./css/notiflix.min.css"/>
    
</head>
<body>
    <!-- <div class="justify-center content-center bg-transparent-black">
        <div class="lds-ripple"><div></div><div></div></div>
    </div> -->
    <div class="w-full upperline-nav"></div>
    <div class="bg-white flex flex-wrap py-6 px-24">
        <div class="w-1/4">
            <a href="./index.php">
                <img src="./images/avenest.png" alt="AveNest" style="width:170px;"/>
            </a>
        </div>
        <div class="w-3/4 justify-end flex flex-wrap flex-row font-semibold text-lg uppercase">
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
    </div>
    