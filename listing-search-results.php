<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Listing Search Result Page
-->
<?php
$title  = "Listing Search Result";
$file   = "listing-search-result.php";
$date   = "SEPT 15, 2019";
$banner = "Listing Search Result";
$desc   = "Listing Search Result page use to Search Result listing.";
require("./header.php");

if(is_get()){
    $errors= 0;
    $error= "";
    
    $city = $_SESSION['search']['city'];
    $property_option = $_SESSION['search']['property_option'];
    $address = $_SESSION['search']['address'];
    $search = $_SESSION['search']['search'];
    $bedrooms = $_SESSION['search']['bedrooms'];
    $bathrooms = $_SESSION['search']['bathrooms'];
    $pets_friendly = isset($_SESSION['search']['pets_friendly']) ? $_SESSION['search']['pets_friendly'] : 0;

    print_r($_SESSION['search']);

    $address = "%".$address."%";

    $sql = "SELECT * FROM listings WHERE address LIKE \$1 OR bedrooms = \$2 OR bathrooms = \$3 OR pets_friendly = \$4;";
    $prepare = db_prepare('search', $sql);
    $exe = db_execute('search', [$address, $bedrooms, $bathrooms, $pets_friendly]);

    $user_id = isset($_SESSION['user_s']['user_id']) ? $_SESSION['user_s']['user_id'] : null;
    if(pg_num_rows($exe) > 0){
        $output = "";
        while($row = pg_fetch_assoc($exe))
        {
            $sdasd = $row['listing_id'];
            
            if(!empty($user_id)){
                $likes = "SELECT * FROM favourites WHERE user_id = '$user_id' AND listing_id = '$sdasd';";
                $res2 = pg_query(db_connect(),$likes);
                $liked =pg_num_rows($res2)>0 ? 'true' : 'false';
            }

            $main_img = explode('_|', $row['images_path'])[0];
            $output .= '<div class="w-full md:w-1/2 lg:w-1/4 p-4">
            <div class="rounded-lg shadow-lg bg-white relative">
                <img src="'.$main_img.'" alt="homes" class="cursor-pointer w-full object-cover shadow rounded-t-lg h-64" onclick="location.href=\'./listing-display.php?listing_id='.$row['listing_id'].'\'"/>
                <div class="py-4 px-4 flex flex-wrap">
                    <div class="w-full flex flex-wrap justify-between">'.displayStatus($row['status']);
                    if(isset($liked)){
                        $output .= '<Like liked="'.$liked.'" :user="'.$user_id.'" :post="'.$row['listing_id'].'"/>';
                    }
                    $output .= '</div>
                    <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i>'.$row['address'].'</p><br/>
                    <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i>'.displayProperty('city', $row['city']).'</p><br/>
                    <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $'.$row['price'].'</p>
                </div>
                <div class="w-full px-6 pb-4 flex flex-wrap justify-center items-center text-sm">
                    <a href="./listing-display.php?listing_id='.$row['listing_id'].'" class="bg-primary-500 hover:bg-blue-500 text-white shadow py-2 px-3 rounded cursor-pointer font-bold text-center">Read More <i class="fab fa-readme ml-1"></i></a>
                    <a href="./listing-update.php?listing_id='.$row['listing_id'].'" class="bg-gray-300 shadow py-2 px-3 rounded ml-2 cursor-pointer font-bold text-center text-gray-700 hover:text-gray-500">
                        Edit <i class="far fa-edit ml-1"></i>
                    </a>
                </div>
                
            </div>
        </div>';
        }

        
    } else {
        //no result
        echo "<div class='bg-gray-300 text-black p-4 text-semibold text-xl'><p class='text-center'>No Result Found. Try Again with different filter</p></div>";
    }

}
?>

<!-- Shows results based on what the user asks for in the listing search page -->
<div class="flex flex-wrap flex-row w-full pt-4 pb-10 px-6 xl:px-32">
    <div class="w-full py-6 flex flex-wrap">
        <p class="w-1/2 text-left font-semibold text-gray-600 text-lg">Results for: "4 rooms"</p>
        <p class="w-1/2 text-right font-semibold text-gray-600 text-lg">Page 1</p>
    </div>
    <div class="w-full content-center text-center justify-center py-4">
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-gray-800 bg-gray-400 hover:bg-gray-500"><i class="fas fa-chevron-left"></i></a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">1</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">2</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">3</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">4</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">5</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-gray-800 bg-gray-400 hover:bg-gray-500"><i class="fas fa-chevron-right"></i></a>
    </div>
    <!-- Listings Results Starts-->
    <?php echo (isset($output) ? $output : ''); ?>
    <!-- Listings Results Ends-->
    <div class="w-full content-center text-center justify-center py-4">
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-gray-800 bg-gray-400 hover:bg-gray-500"><i class="fas fa-chevron-left"></i></a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">1</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">2</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">3</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">4</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-white bg-primary-400 hover:bg-gray-500">5</a>
        <a href="" class="py-3 px-4 m-1 shadow-lg rounded text-gray-800 bg-gray-400 hover:bg-gray-500"><i class="fas fa-chevron-right"></i></a>
    </div>
</div>

<?php
require("./footer.php");
?>