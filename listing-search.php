<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Listing search Page
-->
<?php
$title  = "Listing search";
$file   = "listing-search.php";
$date   = "SEPT 15, 2019";
$banner = "Listing search";
$desc   = "Listing search page use to search listing.";
require("./header.php");

if(is_get()){
    $errors=0;
    $error="";
    $city = trimG('city');

    if(!isset($city) || empty($city)){
        $errors++;
        $error .= "<br/>City required.";
    } else if(!is_numeric($city)){
        $errors++;
        $error .= "<br/>City must be numeric.";
    }

    if($errors>0){
        $session_msg[] = "City Required";
        $_SESSION['session_messages'] = $session_msg;
        header("LOCATION: ./listing-city-select.php");
        ob_flush();
        exit();
    }
}
?>
    <!-- The form will show all listings in an orginized fashion 
         based on the users preferance  -->
    <div class="flex flex-wrap flex-col w-full h-screen">
        <div class="w-full px-4 md:px-24 py-4">
            <?php if($errors>0) { ?>
            <div class="w-full mb-6 bg-white rounded-lg shadow-lg py-3 px-4">
                <p class="text-center font-bold text-gray-700 my-2 text-4xl font-headline">Error - City</p>
                <p class="text-center text-center pt-4 text-red-500 text-base"><?php echo $error ?></p>
            </div>
            <?php } ?>
            <form method="get" action="./listing-search-results.php" class="w-full shadow rounded-lg py-4 px-4 bg-gray-400 flex flex-wrap flex-row mt-4 xl:mt-6">
                <p class="w-full text-center font-bold text-gray-700 my-2 text-2xl font-headline">Listing Search</p>
                <div class="w-1/3 px-2">
                    <p class="text-lg font-normal py-2 text-black">Search any word</p>
                    <input autofocus type="text" name="search" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"/>
                </div>
                <?php build_simple_dropdown('city', 'property', $city);?>
                <div class="w-1/3 flex flex-wrap">
                    <div class="w-1/2 px-2">
                        <p class="text-lg font-normal py-2 text-black">Minimum Price</p>
                        <select name="min_price" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100">
                            <option value="50000">50 K</option>
                            <option value="100000">100 K</option>
                            <option value="150000">150 K</option>
                        </select>
                    </div>
                    <div class="w-1/2 px-2">
                        <p class="text-lg font-normal py-2 text-black">Maximum Price</p>
                        <select name="max_price" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100">
                            <option value="50000">50 K</option>
                            <option value="100000">100 K</option>
                            <option value="150000">150 K</option>
                            <option value="200000">200 K</option>
                            <option value="250000">250 K</option>
                            <option value="300000">300 K</option>
                        </select>
                    </div>
                </div>
                <div class="w-full px-2 py-2 flex flex-wrap justify-end items-center">
                    <div class="pl-2 pt-2">
                        <input type="submit" value="Search" class="focus:outline-none focus:shadow-outline w-full text-lg py-2 px-3 shadow-lg rounded hover:bg-primary-500 bg-primary-300 text-white font-semibold cursor-pointer"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    

<?php
require("./footer.php");
?>