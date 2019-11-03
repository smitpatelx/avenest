<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Listing Create Page
-->
<?php
$title  = "Listing Create";
$file   = "listing-create.php";
$date   = "SEPT 15, 2019";
$banner = "Listing Create";
$desc   = "Listing Create page use to create listing.";
require("./header.php");

if(isset($_SESSION['user_type_s'])){
    if ($_SESSION['user_type_s'] == DISABLED){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    } else if ($_SESSION['user_type_s'] == CLIENT){
        header("LOCATION: ./welcome.php");
        ob_flush();  //Flushing output buffer after redirection
    } else if ($_SESSION['user_type_s'] == PENDING){
        header("LOCATION: ./407.php");
        ob_flush();  //Flushing output buffer after redirection
    }
} else {
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}
senetize_sentence("sasd_asdasd");
if(is_get())
{
    

    $errors=0;
    $error="";

    // Setting variables
    $headline = "";
    $description = "";
    $price = "";
    $address = "";  
    $images = "1";
    $property_option = "AC";
    $provinces = "ON";
    $bedrooms = "4";
    $bathrooms = "3";
    $postal_code = "";
    $city = "oshawa";
    $area = "";
    $phone = "";
    $pets_friendly = "1";
    $listing_status = "o";

} else if(is_post())
{
    $errors=0;
    $error="";

    // Setting variables
    $headline = trimP('headline');
    $description = trimP('description');
    $price = trimP('price');
    $address = trimP('address');  
    $images = trimP('images');
    $property_option = $_POST['property_option'];
    $provinces = trimP('provinces');
    $bedrooms = trimP('bedrooms');
    $bathrooms = trimP('bathrooms');
    $postal_code = trimP('postal_code');
    $city = trimP('city');
    $area = trimP('area');
    $phone = trimP('phone');
    $pets_friendly = trimP('pets_friendly');
    $listing_status = trimP('listing_status');

    
}

?>

<div class="w-full flex flex-wrap justify-center">
        <form class="h-auto w-full lg:w-2/3 xl:w-1/2 px-8 my-4" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
            <p class="text-left font-bold text-gray-700 my-2 text-4xl mt-10 font-headline">Create A Listing</p>
            <p class="pt-2 text-red-500 text-sm"><?php echo $error ?></p>

            <div>
                <p class="text-lg font-normal py-2 text-black">Headline</p>
                <input autofocus type="text" name="headline" value="<?php echo $headline ; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"/>
            </div>
            <div>
                <p class="text-lg font-normal py-2 text-black">Description</p>
                <textarea name="description" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"><?php echo $description ; ?></textarea>
            </div>           
            <div>
                <p class="text-lg font-normal py-2 text-black">Street Address</p>
                <input type="text" name="address" value="<?php echo $address; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg my-2 bg-white focus:bg-gray-100"/>
            </div>
            <div class="flex flex-wrap">
                <?php build_simple_dropdown('images', 'value', $images); ?>
                <?php build_simple_dropdown('city', 'property', $city); ?>
                <?php build_simple_dropdown('property_option', 'property', $property_option, true); ?>
                <?php build_simple_dropdown('provinces', 'province', $provinces); ?>
                <?php build_simple_dropdown('bedrooms', 'value', $bedrooms); ?>
                <?php build_simple_dropdown('bathrooms', 'value', $bathrooms); ?>
                <div class="w-1/3 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Postal Code</p>
                    <input type="text" name="postal_code" value="<?php echo $postal_code; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/3 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Price</p>
                    <input type="text" name="price" value="<?php echo $price; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>

                <div class="w-full border-t border-gray-500 my-4"></div>
                <div class="w-1/2 pr-2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Property Area</p>
                    <input type="text" name="area" value="<?php echo $area; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-1/2 py-2">
                    <p class="text-lg font-normal py-2 text-black">Phone</p>
                    <input type="text" name="phone" value="<?php echo $phone; ?>" class="focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100"/>
                </div>
                <div class="w-full py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Pets Friendly</p>
                    <?php build_radio("pets_friendly", $pets_friendly) ?>
                </div>
                <div class="w-full py-2">
                    <p class="text-lg font-normal py-2 text-gray-600">Listing Status</p>
                    <?php build_radio("listing_status", $listing_status) ?>
                </div>
            </div>
            <div class="flex flex-wrap flex-row justify-center">
                <div class="pr-3 py-2">
                    <input type="submit" value="Add To Listing" class="focus:outline-none focus:shadow-outline w-full py-3 px-6 shadow-lg rounded-lg hover:bg-primary bg-primary-300 text-white font-semibold cursor-pointer"/>
                </div>
                <div class="pr-3 py-2">
                    <input type="reset" value="Clear" class="focus:outline-none focus:shadow-outline w-full py-3 px-6 shadow-lg rounded-lg bg-gray-500 hover:bg-gray-600 text-white font-semibold cursor-pointer"/>
                </div>
            </div>
        </form>
    </div>

<?php
require("./footer.php");
?>