<?php
ob_start();
session_start();
require_once('./includes/constants.php');
require_once('./includes/functions.php');
require_once('./includes/db.php');
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
    <div class="w-full upperline-nav"></div>
    <div class="bg-gray-200">
    <div class="flex flex-wrap py-6 px-4 md:px-24 justify-between">
        <div class="w-auto md:w-1/2">
            <a href="./index.php">
                <img src="./images/avenest.png" alt="AveNest" style="height:30px; width:170px;"/>
            </a>
        </div>
        <div class="w-auto md:w-1/2 justify-end flex flex-wrap flex-row font-semibold text-lg uppercase">
            <a href="./index.php" class="px-3 py-1 mr-1 lg:mr-3 text-blue-600 hover:text-gray-500">
                Home
            </a>
            <a href="./listing-search.php" class="hidden md:flex px-3 py-1 mr-1 lg:mr-3 text-blue-600 hover:text-gray-500"> 
                Listings
            </a>
            <div id="trigger" class="flex flex-wrap flex-col">
                <div class="w-full cursor-pointer flex flex-wrap my-auto items-center justify-center mr-1 lg:mr-3 text-blue-600 hover:text-gray-500">
                    <?php
                     if(isset($_SESSION['user_type_s'])){ ?>
                        <svg viewBox="0 0 24 24" class="mt-1 w-6 h-6 fill-current text-primary">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M8 0C5.79 0 4 1.79 4 4s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm2.1 4a2.1 2.1 0 10-4.2 0 2.1 2.1 0 004.2 0zm4 9c0-.64-3.13-2.1-6.1-2.1-2.97 0-6.1 1.46-6.1 2.1v1.1h12.2V13zM0 13c0-2.66 5.33-4 8-4s8 1.34 8 4v3H0v-3z"/>
                        </svg>
                     <?php } else { ?>
                        <svg viewBox="0 0 18 10" class="w-6 h-6 fill-current text-primary">
                            <path fill-rule="evenodd" d="M4 2V0h14v2H4zM2 6h14V4H2v2zm-2 4h14V8H0v2z" clip-rule="evenodd"/>
                        </svg>
                     <?php } ?>
                </div>
                <div class="relative">
                    <div tabindex="0" id="target" class="z-50 absolute hidden flex-wrap bg-white p-2 rounded-lg shadow-lg" style="width:13rem; margin-left:-11rem;">
                        <?php

                        echo '<a href="./listing-search.php" class="flex md:hidden w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600"> 
                                Listings
                            </a>';
                        if(isset($_SESSION['user_type_s'])){
                            if ($_SESSION['user_type_s'] == ADMIN){
                                echo '<a href="#" class="cursor-default mb-4 flex w-full bg-blue-500 rounded px-3 py-1 text-base font-semibold normal-case text-white"> 
                                        Admin
                                    </a>';
                            }else if ($_SESSION['user_type_s'] == AGENT){
                                echo '<a href="#" class="cursor-default mb-4 flex w-full bg-yellow-500 rounded px-3 py-1 text-base font-semibold normal-case text-black"> 
                                        Agent
                                    </a>';
                            }else if ($_SESSION['user_type_s'] == DISABLED){
                                echo '<a href="#" class="cursor-default mb-4 flex w-full bg-red-500 rounded px-3 py-1 text-base font-semibold normal-case text-white"> 
                                        Disabled
                                    </a>';
                            }else if ($_SESSION['user_type_s'] == CLIENT){
                                echo '<a href="#" class="cursor-default mb-4 flex w-full bg-green-500 rounded px-3 py-1 text-base font-semibold normal-case text-white"> 
                                        Client
                                    </a>';
                            }else if ($_SESSION['user_type_s'] == INCOMPLETE){
                                echo '<a href="#" class="cursor-default mb-4 flex w-full bg-red-500 rounded px-3 py-1 text-base font-semibold normal-case text-white"> 
                                        Incomplete
                                    </a>';
                            }

                            echo '<a href="./logout.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600">
                                    Logout
                                </a>
                                <a href="./change-password.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600">
                                    Change Password
                                </a>
                                <a href="./update.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600">
                                    Update Info
                                </a>';

                                if ($_SESSION['user_type_s'] == ADMIN){
                                    echo '<a href="./admin.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600">
                                        Dashboard
                                    </a>';
                                    echo '<a href="./listing-create.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600">
                                        Listing Create
                                    </a>';
                                }else if ($_SESSION['user_type_s'] == AGENT){
                                    echo '<a href="./dashboard.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600">
                                        Dashboard
                                    </a>';
                                    echo '<a href="./listing-create.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600">
                                        Listing Create
                                    </a>';
                                }else if ($_SESSION['user_type_s'] == CLIENT){
                                    echo '<a href="./welcome.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600">
                                        Dashboard
                                    </a>';
                                }
                        } else {
                            echo '<a href="./login.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600"> 
                                Login
                            </a>
                            <a href="./register.php" class="w-full bg-white hover:bg-gray-200 rounded px-3 py-1 text-base font-semibold normal-case text-gray-500 hover:text-gray-600"> 
                                Register
                            </a>';
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    