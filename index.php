<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Home Page
-->
<?php
$title  = "Home";
$file   = "index.php";
$date   = "SEPT 15, 2019";
$banner = "Home";
$desc   = "Home page is the main index page of this website";
require("./header.php");
?>

<!-- Design for the index page-->
<div class="flex flex-wrap flex-row p-4 md:p-10 lg:p-24">
    <div class="w-full md:w-1/2 flex flex-wrap flex-col">
        <h1 class="font-bold text-4xl text-black mt-14 font-headline">Reimagine Home</h1>
        <h1 class="font-bold text-4xl text-primary font-headline">We’ll help you find a place you’ll love.</h1>

        <p class="font-semibold text-2xl text-gray-500 mt-16">We have the most listings and constant updates.
        <br/>So you’ll never miss out.</p>
        
        <p class="text-xl text-gray-500 mt-6">To see all available houses, register here.</p>

        <a href="./register.php" class="w-full md:w-48 border hover:border-blue-600 bg-primary-500 hover:bg-transparent rounded text-white hover:text-primary py-3 px-6 font-semibold mt-10 text-center">Register</a>
    </div>
    <div class="w-full md:w-1/2 mt-6 md:mt-0">
        <img src="./images/bg-home.svg" alt="Home"/>
    </div>
</div>

<div class="p-4 md:p-24">
    <div class="flex flex-wrap flex-row">
        <div class="p-2 w-full lg:w-1/3">
            <div class="rounded bg-white shadow-xl flex flex-wrap justify-center pt-2 px-2">
                <img src="./images/home-1.png" alt="Home-1" class="w-full"/>
                <p class="font-bold text-4xl text-center font-headline">Buy a Home</p>
                <p class="text-lg text-center p-4 text-gray-600">Find your place with an immersive photo experience and the most listings, including things you won’t find anywhere else.</p>
                <a href="./login.php" class="bg-white rounded border border-blue-600 hover:bg-primary hover:text-white text-primary py-2 px-3 font-semibold mb-10 mx-4 text-center">Start Buying</a>
            </div>
        </div>
        <div class="p-2 w-full lg:w-1/3">
            <div class="rounded bg-white shadow-xl flex flex-wrap  justify-center pt-2 px-2">
                <img src="./images/home-2.png" alt="Home-2" class="w-full"/>
                <p class="font-bold text-4xl text-center font-headline">Sell a Home</p>
                <p class="text-lg text-center p-4 text-gray-600">Whether you sell with new Avenest Offers or take another approach, we’ll help you navigate the path to a successful sale. Cheers!</p>
                <a href="./login.php" class="bg-white rounded border border-blue-600 hover:bg-primary hover:text-white text-primary py-2 px-3 font-semibold mb-10 mx-4 text-center">Start Selling</a>
            </div>
        </div>
        <div class="p-2 w-full lg:w-1/3">
            <div class="rounded bg-white shadow-xl flex flex-wrap  justify-center pt-2 px-2">
                <img src="./images/home-3.png" alt="Home-3" class="w-full"/>
                <p class="font-bold text-4xl text-center font-headline">Rent a Home</p>
                <p class="text-lg text-center p-4 text-gray-600">We’re creating a seamless online experience – from shopping on the largest rental network, to applying, to paying rent.</p>
                <a href="./login.php" class="bg-white rounded border border-blue-600 hover:bg-primary hover:text-white text-primary py-2 px-3 font-semibold mb-10 mx-4 text-center">Start Renting</a>
            </div>
        </div>
    </div>
</div>
<div class="text-center pb-10 px-6">
    <h2 class="font-bold text-4xl text-primary font-headline">We provide our service in multiple cities.</h2>
</div>
<div class="w-full">
    <img src="./images/footer2.svg" alt="footer"/>
</div>

<?php
require("./footer.php");
?>