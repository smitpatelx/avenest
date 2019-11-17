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
    <!-- Listings Results -->
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white bg-white">
            <img src="./images/houses/1-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-black text-xs shadow font-semibold rounded bg-yellow-500 py-1 px-2">Detached</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/2-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-green-600 py-1 px-2">Attached</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/3-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary-500 py-1 px-2">Condo</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/4-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary-500 py-1 px-2">Condo</p>
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-red-600 py-1 px-2 ml-2">Sold</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/1-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-black text-xs shadow font-semibold rounded bg-yellow-500 py-1 px-2">Detached</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/2-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-green-600 py-1 px-2">Attached</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/3-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary-500 py-1 px-2">Condo</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/4-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary-500 py-1 px-2">Condo</p>
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-red-600 py-1 px-2 ml-2">Sold</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/1-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-black text-xs shadow font-semibold rounded bg-yellow-500 py-1 px-2">Detached</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/2-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-green-600 py-1 px-2">Attached</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/3-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary-500 py-1 px-2">Condo</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/4-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary-500 py-1 px-2">Condo</p>
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-red-600 py-1 px-2 ml-2">Sold</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/1-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-black text-xs shadow font-semibold rounded bg-yellow-500 py-1 px-2">Detached</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/2-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-green-600 py-1 px-2">Attached</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/3-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary-500 py-1 px-2">Condo</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
    </div>
    <div class="w-1/4 p-4">
        <div class="rounded-lg shadow-lg bg-white">
            <img src="./images/houses/4-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
            <div class="py-4 px-4 flex flex-wrap">
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary-500 py-1 px-2">Condo</p>
                <p class="w-auto text-white text-xs shadow font-semibold rounded bg-red-600 py-1 px-2 ml-2">Sold</p>
                <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
            </div>
            <div class="w-full pb-4 text-center">
                <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
            </div>
        </div>
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
</div>

<?php
require("./footer.php");
?>