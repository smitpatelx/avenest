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
    $errors= 0;
    $error= "";
    $city = sum_check_box([trimG('city')]);
    $property_option = sum_check_box([2,4]);
    $search = "";
    $address = "";
    $bedrooms = 4;
    $bathrooms = 3;
    $pets_friendly = null;

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
} else if(is_post()) {

    $errors= 0;
    $error= "";

    $_POST['city'] = $city = sum_check_box($_POST['city']);
    $_POST['property_option'] = $property_option = sum_check_box($_POST['property_option']);
    $address = trimP('address');
    $bedrooms = trimP('bedrooms');
    $bathrooms = trimP('bathrooms');
    $search = trimP('search');
    $pets_friendly = isset($_POST['pets_friendly']) ? $_POST['pets_friendly'] : null;

    if(isset($address) && !empty($address))
    {
        if(strlen($address) >= MAX_ADDRESS_LENGTH || strlen($address) <= MIN_ADDRESS_LENGTH ){
            $error .= "<br/>You entered \"".$address."\" "."Address must be between ".MIN_ADDRESS_LENGTH." and ".MAX_ADDRESS_LENGTH."";
            $errors+=1;
            $address = "";
        }
    }

    if($errors == 0){
        $_SESSION['search'] = $_POST;
        header('Location: ./listing-search-results.php');
        ob_flush();
        exit();
    }

}
?>
    <!-- The form will show all listings in an orginized fashion 
         based on the users preferance  -->
    <div class="flex flex-wrap flex-col w-full">
        <div class="w-full px-4 md:px-24 py-4">
            <?php if($errors>0) { ?>
            <div class="w-full mb-6 bg-white rounded-lg shadow-lg py-3 px-4">
                <p class="text-center font-bold text-gray-700 my-2 text-4xl font-headline">Error - City</p>
                <p class="text-center text-center pt-4 text-red-500 text-base"><?php echo $error ?></p>
            </div>
            <?php } ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="w-full shadow rounded-lg py-4 px-4 bg-gray-400 flex flex-wrap flex-row mt-4 xl:mt-6">
                <p class="w-full text-center font-bold text-gray-700 my-2 text-2xl font-headline">Listing Search</p>
                <div class="w-1/4 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Search any word</p>
                    <input autofocus type="text" name="search" value="<?php echo $search; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/4 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Minimum Price</p>
                    <select name="min_price" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100">
                        <option value="" selected="selected" hidden="hidden">Select Any Value</option>
                        <option value="50000">50 K</option>
                        <option value="100000">100 K</option>
                        <option value="150000">150 K</option>
                        <option value="200000">200 K</option>
                        <option value="250000">250 K</option>
                    </select>
                </div>
                <div class="w-1/4 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Maximum Price</p>
                    <select name="max_price" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100">
                        <option value="" selected="selected" hidden="hidden">Select Any Value</option>
                        <option value="100000">100 K</option>
                        <option value="150000">150 K</option>
                        <option value="200000">200 K</option>
                        <option value="250000">250 K</option>
                        <option value="300000">300 K</option>
                    </select>
                </div>
                <div class="w-1/4 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Street Address</p>
                    <input type="text" name="address" value="<?php echo $address; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <?php build_simple_dropdown('bedrooms', 'value', $bedrooms, false, "w-1/5"); ?>
                <?php build_simple_dropdown('bathrooms', 'value', $bathrooms, false, "w-1/5"); ?>
                <div class="w-1/5 py-2 pr-2">
                    <p class="text-lg font-normal py-2 text-black">Pets Friendly</p>
                    <?php build_radio("pets_friendly", $pets_friendly) ?>
                </div>
                <?php build_checkbox('property_option', 'value', $property_option, true, "w-2/5"); ?>
                <?php build_checkbox('city', 'value', $city, false, "w-5/6");?>

                <div class="w-1/6 px-2 py-2 flex flex-wrap justify-end items-center">
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