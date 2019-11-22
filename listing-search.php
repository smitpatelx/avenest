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

    $city = isset($_SESSION['search']['city']) ? $_SESSION['search']['city'] : sum_check_box([trimG('city')]);
    $property_option = isset($_SESSION['search']['property_option']) ? $_SESSION['search']['property_option'] : sum_check_box([2,4]);
    $search = isset($_SESSION['search']['search']) ? $_SESSION['search']['search'] : "";
    $address = isset($_SESSION['search']['address']) ? $_SESSION['search']['address'] : "";
    $bedrooms = isset($_SESSION['search']['bedrooms']) ? $_SESSION['search']['bedrooms'] : 127;
    $bathrooms = isset($_SESSION['search']['bathrooms']) ? $_SESSION['search']['bathrooms'] : 127;
    $pets_friendly = isset($_SESSION['search']['pets_friendly']) ? $_SESSION['search']['pets_friendly'] : 3;

} else if(is_post()) {

    $errors= 0;
    $error= "";

    $_POST['city'] = $city = sum_check_box($_POST['city']);
    $_POST['property_option'] = $property_option = isset($_POST['property_option']) ? sum_check_box($_POST['property_option']) : 0;
    $address = trimP('address');
    $_POST['bedrooms'] = $bedrooms = isset($_POST['bedrooms']) ? sum_check_box($_POST['bedrooms']) : 0;
    $_POST['bathrooms'] = $bathrooms = isset($_POST['bathrooms']) ? sum_check_box($_POST['bathrooms']) : 0;
    $search = trimP('search');
    $_POST['pets_friendly'] = $pets_friendly = isset($_POST['pets_friendly']) ? sum_check_box($_POST['pets_friendly']) : 0;

    if(isset($address) && !empty($address))
    {
        if(strlen($address) >= MAX_ADDRESS_LENGTH || strlen($address) <= MIN_ADDRESS_LENGTH ){
            $error .= "<br/>You entered \"".$address."\" "."Address must be between ".MIN_ADDRESS_LENGTH." and ".MAX_ADDRESS_LENGTH."";
            $errors+=1;
            $address = "";
        }
    }

    if($errors == 0){
        $add = "%".$address."%";
        $sea = "%".$search."%";

        $sql2 = "SELECT count(*) FROM listings WHERE address LIKE \$1 AND (bedrooms & \$2) > 0 AND (bathrooms & \$3) > 0 AND (pets_friendly & \$4) > 0 AND (city & \$5) > 0 AND (property_options & \$6) > 0 AND (headline LIKE \$7 OR description LIKE \$7) AND status = 'o' ;";
        $prepare = db_prepare('search_count', $sql2);
        $res = db_execute('search_count', [$add, $bedrooms, $bathrooms, $pets_friendly, $city, $property_option, $sea]);

        $count = pg_fetch_assoc($res);
        $listing_count = $count['count'];

        if($listing_count > 0){
            $_SESSION['search'] = $_POST;
            header('Location: ./listing-search-results.php');
            ob_flush();
            exit();
        } else {
            $error .= "<br/>No Result Found! Try different options.";
            $errors+=1;
        }
    }
    

}
?>
    <!-- The form will show all listings in an orginized fashion 
         based on the users preferance  -->
    <div class="flex flex-wrap flex-col w-full">
        <div class="w-full px-4 md:px-24 py-4">
            <?php if($errors>0) { ?>
            <div class="w-full mb-6 bg-white rounded-lg shadow-lg py-3 px-4">
                <p class="text-center font-bold text-gray-700 my-2 text-4xl font-headline">Errors:</p>
                <p class="text-center text-center pt-4 text-red-500 text-base"><?php echo $error ?></p>
            </div>
            <?php } ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="parent-ch w-full shadow rounded-lg py-4 px-4 bg-gray-400 flex flex-wrap flex-row mt-4 xl:mt-6">
                <div class="w-full flex flex-wrap justify-center items-center">
                    <p class="w-auto text-center font-bold text-gray-700 my-2 text-2xl font-headline">Listing Search</p>
                    <a onClick='checkbox_all(this)' class='ml-4 w-auto leading-tight bg-transparent text-gray-700 hover:text-gray-500 font-normal cursor-pointer'><i class='fas fa-tasks'></i></a>
                </div>
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
                <?php build_checkbox('bedrooms', 'value', $bedrooms, "w-full"); ?>
                <?php build_checkbox('bathrooms', 'value', $bathrooms, "w-full"); ?>
                <?php build_checkbox('pets_friendly', 'value', $pets_friendly, "w-1/5"); ?>
                <?php build_checkbox('property_option', 'value', $property_option, "w-4/5"); ?>
                <?php build_checkbox('city', 'value', $city, "w-5/6");?>

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