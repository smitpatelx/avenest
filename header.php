<?php
ob_start();
session_start();
require_once('./includes/constants.php');
require_once('./includes/functions.php');
require_once('./includes/db.php');

$loggedIn = '';
$userType = '';
if(isset($_SESSION['user_type_s'])){
    $loggedIn = 'true';
    $userType = $_SESSION['user_type_s'];
} else {
    $loggedIn = 'false';
}
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
    <link rel="stylesheet" href="./css/webd3201.css"/>
    <link rel="stylesheet" href="./dist/css/app.css"/>
    <style>
        .upperline-nav{
            background: linear-gradient(90deg, rgba(0,117,234,1) 0%, rgba(96,175,255,1) 100%);
            padding: 7px 0 0 0;
        }
    </style>
</head>
<body>
    <div id="app">

    <div class="w-full upperline-nav"></div>
    <div class="bg-gray-200">
    <div class="flex flex-wrap py-6 px-4 md:px-24 justify-between">
        <div class="w-auto md:w-1/2">
            <a href="./index.php">
                <img src="./images/avenest.png" alt="AveNest" style="height:30px; width:170px;"/>
            </a>
        </div>
        <main-header :userLoggedIn="<?php echo $loggedIn; ?>" userType="<?php echo $userType; ?>"></main-header>
    </div>
    