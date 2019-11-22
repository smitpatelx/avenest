<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Listing Create Page
-->
<?php
$title  = "Listing update";
$file   = "listing-update.php";
$date   = "OCT 30, 2019";
$banner = "Listing update";
$desc   = "Listing update page use to update listing.";
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
    } else if ($_SESSION['user_type_s'] == INCOMPLETE){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }
} else {
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}

$user_id = "";
$listing_id = "";
if(is_get())
{
    
    $errors=0;
    $error="";
    $user_id = ($_SESSION['user_s'])['user_id'];

    //Get Data Related to ID
    $data = [];
    $listing_id = trimG('listing_id');

    if(!isset($listing_id) || empty($listing_id)){
        $errors++;
        $error .= "<br/>Listing Id required.";
    } else if(!is_numeric($listing_id)){
        $errors++;
        $error .= "<br/>Listing Id must be numeric.";
    }

    if($errors > 0){
        $error .= "<br/>Something went wrong";
    } else {
        $sql = "SELECT * FROM listings WHERE listing_id = \$1 AND user_id = \$2;";
        $prep = db_prepare('get_listings', $sql);
        $execute = db_execute('get_listings', array($listing_id, $user_id));

        if(pg_num_rows($execute) > 0 ){
            $data = pg_fetch_assoc($execute);

            // Setting variables

            $headline = $data['headline'];
            $description = $data['description'];
            $price = $data['price'];
            $address = $data['address'];  
            $images_path = $data['images_path'];
            $property_option = $data['property_options'];
            $provinces = $data['province'];
            $bedrooms = $data['bedrooms'];
            $bathrooms = $data['bathrooms'];
            $postal_code = $data['postal_code'];
            $city = $data['city'];
            $area = $data['area'];
            $phone = $data['phone'];
            $pets_friendly = $data['pets_friendly'];
            $listing_status = $data['status'];

        } else {
            $error .= "<br/>Post with listing_id: ".$listing_id." not present OR you dont own this post.";

            $session_msg[] = "You dont own that post.";
            $_SESSION['session_messages'] = $session_msg;
            user_redirection();
            exit();
        }
    }

} else if(is_post())
{
    $errors=0;
    $error="";

    // Setting variables
    $listing_id = $_GET['listing_id'];
    $headline = trimP('headline');
    $description = trimP('description');
    $price = trimP('price');
    $address = trimP('address');  
    $_POST['property_option'] = $property_option = sum_check_box($_POST['property_option']);
    $provinces = trimP('provinces');
    $bedrooms = trimP('bedrooms');
    $bathrooms = trimP('bathrooms');
    $postal_code = trimP('postal_code');
    $city = trimP('city');
    $area = trimP('area');
    $phone = trimP('phone');
    $pets_friendly = trimP('pets_friendly');
    $listing_status = trimP('listing_status');

    if(!isset($headline) || empty($headline))
    {
        $error .= "<br/>Headline is required";
        $errors+=1;
        $headline = "";
    } else if(strlen($headline) >= MAX_HEADLINE_LENGTH || strlen($headline) <= MIN_HEADLINE_LENGTH ){
        $error .= "<br/>You entered \"".$headline."\" "."Headline must be between ".MIN_HEADLINE_LENGTH." and ".MAX_HEADLINE_LENGTH."";
        $errors+=1;
        $headline = "";
    }

    if(!isset($description) || empty($description))
    {
        $error .= "<br/>Description is required";
        $errors+=1;
        $description = "";
    } else if(strlen($description) >= MAX_DESCRIPTION_LENGTH || strlen($description) <= MIN_DESCRIPTION_LENGTH ){
        $error .= "<br/>You entered \"".$description."\" "."Description must be between ".MIN_DESCRIPTION_LENGTH." and ".MAX_DESCRIPTION_LENGTH."";
        $errors+=1;
        $description = "";
    }

    if(!isset($address) || empty($address))
    {
        $error .= "<br/>Address is required";
        $errors+=1;
        $address = "";
    } else if(strlen($address) >= MAX_ADDRESS_LENGTH || strlen($address) <= MIN_ADDRESS_LENGTH ){
        $error .= "<br/>You entered \"".$address."\" "."Address must be between ".MIN_ADDRESS_LENGTH." and ".MAX_ADDRESS_LENGTH."";
        $errors+=1;
        $address = "";
    }

    if(!isset($postal_code) || empty($postal_code))
    {
        $error .= "<br/>Postal Code is required";
        $errors+=1;
        $postal_code = "";
    } else if(strlen($postal_code) != POSTAL_CODE_LENGTH ){
        $error .= "<br/>You entered \"".$postal_code."\" "."Postal Code must contains ".POSTAL_CODE_LENGTH." characters.";
        $errors+=1;
        $postal_code = "";
    } else if (!is_valid_postal_code($postal_code)) {
        $error .= "<br/>You entered \"".$postal_code."\" "."This canadian postal code is invalid."; 
        $errors+=1;
        $postal_code = "";
    }

    if(!isset($price) || empty($price))
    {
        $error .= "<br/>Price is required";
        $errors+=1;
        $price = "";
    } else if(!is_numeric($price)){
        $error .= "<br/>You entered \"".$price."\" "."Price must be numeric";
        $errors+=1;
        $price = "";
    } else if($price >= MAX_PRICE || $price <= MIN_PRICE ){
        $error .= "<br/>You entered \"".$price."\" "."Price must be between ".MIN_ADDRESS_LENGTH." and ".MAX_ADDRESS_LENGTH."";
        $errors+=1;
        $price = "";
    }

    if(!isset($area) || empty($area))
    {
        $error .= "<br/>Area is required";
        $errors+=1;
        $area = "";
    } else if(!is_numeric($area)){
        $error .= "<br/>You entered \"".$area."\" "."Area must be numeric";
        $errors+=1;
        $area = "";
    }

    if(!isset($phone) || empty($phone))
    {
        $error .= "<br/>Phone is required";
        $errors+=1;
        $phone = "";
    } else if(!is_numeric($phone)){
        $error .= "<br/>You entered \"".$phone."\" "."Phone must be numeric";
        $errors+=1;
        $phone = "";
    } else if(strlen($phone) > MAX_PHONE_LENGTH || strlen($phone) < MIN_PHONE_LENGTH ){
        $error .= "<br/>You entered \"".$phone."\" "."Phone must be between ".MIN_PHONE_LENGTH." and ".MAX_PHONE_LENGTH."";
        $errors+=1;
        $phone = "";
    } else if (!valid_phone_number($phone)) {
        $error .= "<br/>You entered \"".$phone."\" "."Invalid Phone Number."; 
        $errors+=1;
        $phone = "";
    }

    if($errors<=0) {
        $current_date = date("Y-m-d",time());
        $user_id = ($_SESSION['user_s'])['user_id'];
        
        $listings_query = "UPDATE listings SET ( status, price, headline, description, postal_code, city, property_options, province, bedrooms, bathrooms, address, area, phone, pets_friendly, updated_on)   
                    = ( \$1, \$2, \$3, \$4, \$5, \$6, \$7, \$8, \$9, \$10, \$11, \$12, \$13, \$14 , \$15 ) WHERE listing_id = \$16 AND user_id = \$17 RETURNING listing_id, user_id;";

        $listings_prepare =  db_prepare('update_listing', $listings_query);
        $listings_exe = db_execute('update_listing', array($listing_status, $price, $headline, $description, $postal_code, $city, $property_option, $provinces, $bedrooms, $bathrooms, $address, $area, $phone, $pets_friendly, $current_date, (int)$listing_id, (int)$user_id));
        
        if(pg_num_rows($listings_exe) > 0) {
            $session_msg[] = "Listing updated successfully";
            $_SESSION['session_messages'] = $session_msg;

            //Redirect user to their respective page after login
            user_redirection();
            exit();
        } else {
            $images_path = explode('_|', $images_path);    
            $property_option = explode('_|', $property_option);
            $error .= "<br/>Database error.";
        }
        
    } else {
        $error .= "<br/>Something went wrong";
    }
}

?>

<div class="w-full flex flex-wrap justify-center">
    <?php if($errors > 0) { ?>
        <div class="h-auto w-full lg:w-2/3 xl:w-1/2 p-8 my-4 bg-white rounded-lg shadow-lg">
            <p class="text-left font-bold text-gray-700 my-2 text-4xl font-headline">Updating Listing id: <span class="font-sans text-gray-500"><?php echo $listing_id; ?></span></p>
            <p class="pt-2 text-red-500 text-sm"><?php echo $error ?></p>
        </div>
    <?php } else { 
        $tt = explode('_|', $images_path);
        $imgArray= "[{path:'".$tt[0]."'},{path:'".$tt[1]."'},{path:'".$tt[2]."'},{path:'".$tt[3]."'}]";
        ?>
    <div>
        <ImageUpload :listing_id="<?php echo $listing_id; ?>" :imagearray="<?php echo $imgArray; ?>"/>
    </div>
    <form class="h-auto w-full lg:w-2/3 xl:w-1/2 px-8 my-4" method="post" action="<?php echo $_SERVER['PHP_SELF'].'?listing_id='.$listing_id; ?>" enctype="multipart/form-data">
        <p class="text-left font-bold text-gray-700 my-2 text-4xl mt-10 font-headline">Updating Listing id: <span class="font-sans text-gray-500"><?php echo $listing_id; ?></span></p>
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
            <?php build_simple_dropdown('city', 'property', $city);?>
            <?php build_checkbox('property_option', 'value', $property_option, "w-1/3"); ?>
            <?php build_simple_dropdown('provinces', 'province', $provinces); ?>
            <?php build_simple_dropdown('bedrooms', 'property', $bedrooms); ?>
            <?php build_simple_dropdown('bathrooms', 'property', $bathrooms); ?>
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
            
            <?php build_radio("pets_friendly", "property", $pets_friendly, "w-full") ?>
            <?php build_radio("listing_status", "property", $listing_status, "w-full") ?>
        </div>
        <div class="flex flex-wrap flex-row justify-center">
            <div class="pr-3 py-2">
                <input type="submit" value="Update Listing" class="focus:outline-none focus:shadow-outline w-full text-sm py-2 px-3 shadow-lg rounded hover:bg-primary-500 bg-primary-300 text-white font-semibold cursor-pointer"/>
            </div>
            <div class="pr-3 py-2">
                <input type="reset" value="Clear" class="focus:outline-none focus:shadow-outline w-full text-sm py-2 px-3 shadow-lg rounded bg-gray-500 hover:bg-gray-600 text-white font-semibold cursor-pointer"/>
            </div>
        </div>
    </form>
    <?php } ?>
</div>

<?php
require("./footer.php");
?>