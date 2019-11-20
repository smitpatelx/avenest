<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Listing Display Result Page
-->
<?php
$title  = "Listing Display Result";
$file   = "listing-display.php";
$date   = "SEPT 15, 2019";
$banner = "Listing Display Result";
$desc   = "Listing Display Result page use to Display Result listing.";
require("./header.php");

$user_id = $_SESSION['user_s']['user_id'];
if(is_get())
{
    // Setting variables
    $errors = 0;
    $error = "";
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
        $sql = "SELECT * FROM listings WHERE listing_id = \$1 ;";
        $prep = db_prepare('get_listings', $sql);
        $execute = db_execute('get_listings', array($listing_id));

        if(pg_num_rows($execute) > 0 ){
            $data = pg_fetch_assoc($execute);
        } else {
            $error .= "<br/>Post with listing_id: ".$listing_id." not present.";
        }
    }
}
?>

<div class="flex flex-wrap container mx-auto justify-center">
    <?php if($errors > 0) { ?>
        <div class="w-full lg:w-2/3 bg-white rounded-lg shadow-lg py-3 px-4">
            <p class="text-center font-bold text-gray-700 my-2 text-4xl font-headline">Error - Listing Id</p>
            <p class="text-center text-center pt-4 text-red-500 text-base"><?php echo $error ?></p>
        </div>
    <?php } else { 
        echo '<div class="w-full lg:w-2/3 py-3 px-4">
            <p class="text-center font-bold text-gray-700 my-2 text-2xl font-headline">Viewing Listing: <span class="font-sans text-gray-500">'.$listing_id.'</span></p>
            <p class="text-center pt-4 text-red-500 text-base">'.$error.'</p>
        </div>';
        if(!empty($data)){
            $sdasd=$data['listing_id'];
            $likes = "SELECT * FROM favourites WHERE user_id = '$user_id' AND listing_id = '$sdasd';";
            $res2 = pg_query(db_connect(), $likes);
            $liked =pg_num_rows($res2)>0 ? 'true' : 'false';

            $main_img = explode('_|', $data['images_path'])[0];
            echo '<div class="w-full lg:w-2/3 p-4">
                <div class="rounded-lg shadow-lg bg-white relative">
                    <img src="'.$main_img.'" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
                    <div class="py-4 px-4 flex flex-wrap">
                    <p class="w-full text-center text-xl text-gray-600 my-2 capitalize">'.$data['headline'].'</p>
                    <div class="w-full flex flex-wrap justify-between">'.displayStatus($data['status']).'
                        <Like liked="'.$liked.'" :user="'.$user_id.'" :post="'.$data['listing_id'].'"/>
                    </div>
                    <div class="w-full flex flex-wrap justify-between">  
                        <p class="w-full text-gray-600 text-lg my-2">'.$data['description'].'</p><br/>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Price:</b> $'.$data['price'].'</p>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Address:</b> '.$data['address'].'</p><br/>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>City:</b> '.displayProperty('city', $data['city']).'</p><br/>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Postal Code:</b> <span class="uppercase">'.$data['postal_code'].'</span></p>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Property Options:</b> '.displayPropertyOptions('property_option', $data['property_options']).'</p>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Province:</b> '.displayProperty('provinces',$data['province'], 'value', 'province').'</p>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Bedrooms:</b> '.$data['bedrooms'].'</p>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Bathrooms:</b> '.$data['bathrooms'].'</p>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Area:</b> '.$data['area'].' sq</p>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Phone:</b> '.display_phone_number($data['phone']).'</p>
                        <p class="w-1/2 text-gray-700 text-lg mt-2"><b>Pets Friendly:</b> '.($data['pets_friendly']?'Yes':'NO').'</p>
                    </div>
                    <div class="w-full px-6 m-3 flex justify-center">';
                    if( $data['user_id'] === $user_id){
                        echo '<a href="./listing-update.php?listing_id='.$data['listing_id'].'" class="bg-gray-300 shadow py-2 px-3 rounded cursor-pointer font-bold text-center text-gray-700 hover:text-gray-500">
                                Edit <i class="far fa-edit ml-1"></i>
                            </a>';
                    }
                echo '</div>
                    
                </div>
            </div>';
        }
    } ?>

<?php
require("./footer.php");
?>