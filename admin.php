<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel, Mike Cusson, Roshan Persaud
LAST MODIFIED   : SEPT 15, 2019
DESCRIPTION     : Admin Page
-->
<?php
$title  = "Admin";
$file   = "Admin.php";
$date   = "SEPT 15, 2019";
$banner = "Admin";
$desc   = "Admin page use to greet admin.";
require("./header.php");

if(isset($_SESSION['user_type_s'])){
    if ($_SESSION['user_type_s'] == AGENT){
        header("LOCATION: ./dashboard.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == DISABLED){
        header("LOCATION: ./406.php");
        ob_flush();  //Flushing output buffer after redirection
    }else if ($_SESSION['user_type_s'] == CLIENT){
        header("LOCATION: ./welcome.php");
        ob_flush();  //Flushing output buffer after redirection
    }
} else {
    header("LOCATION: ./login.php");
    ob_flush();  //Flushing output buffer after redirection
}
?>

<div class="text-center flex flex-wrap flex-col py-4 content-center  container mx-auto justify-center">
    <p class="text-xl text-primary shadow-lg rounded w-auto lg:w-1/3 bg-white py-2 px-3 font-headline font-semibold">
        Admin | Welcome  <?php echo ($_SESSION['user_s'])['first_name']." ".($_SESSION['user_s'])['last_name'] ?>
    </p>
</div>

<div class="w-full mx-auto container flex flex-wrap justify-center content-center">
<?php
        
    $user_id = ($_SESSION['user_s'])['user_id'];

    $conn = db_connect();
    $sql = "SELECT * FROM listings WHERE listings.user_id = '$user_id' ORDER BY updated_on ASC;";
    $result = pg_query($conn, $sql);

    $output = "";
    while($row = pg_fetch_assoc($result))
    {
        $main_img = explode('_|', $row['images_path'])[0];
        $output .= '<div class="w-full md:w-1/2 lg:w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white relative">
            <img src="'.$main_img.'" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                '.displayStatus($row['status']).'
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i>'.$row['address'].'</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i>'.displayProperty('city', $row['city']).'</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $'.$row['price'].'</p>
            </div>
            <div class="w-full px-6 pb-4 flex justify-center">
                <a href="./listing-display.php?listing_id='.$row['listing_id'].'" class="bg-primary hover:bg-blue-500 text-white rounded-lg shadow py-2 px-4 cursor-pointer font-bold text-center">Read More</a>
                <a href="./listing-update.php?listing_id='.$row['listing_id'].'" class="bg-gray-200 rounded-lg shadow py-2 px-4 ml-2 cursor-pointer font-bold text-center text-gray-500 hover:text-gray-800">Edit</a>
            </div>
            
        </div>
    </div>';
    }

    echo $output;
?>
      
</div>

<?php
require("./footer.php");
?>