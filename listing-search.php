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
?>
    <!-- The form will show all listings in an orginized fashion 
         based on the users preferance  -->
    <div class="flex flex-wrap flex-col w-full">
        <div class="w-full px-24 py-4">
            <form method="get" action="./listing-search-results.php" class="shadow-xl rounded-lg py-4 pb-6 px-10 bg-gray-200 flex flex-wrap flex-row mt-4 xl:mt-6">
                <div class="w-full py-2 rounded-lg flex flex-wrap flex-row">
                    <p class="w-full text-lg text-gray-700 font-semibold pb-2 font-headline">Search any word</p>
                    <input type="text" name="search" class="w-11/12 shadow rounded-l-lg py-3 px-4 focus:outline-none focus:shadow-outline"/>
                    <div class="w-1/12 shadow rounded-r-lg bg-white text-yellow-600 p-3 text-center">
                        <i class="fa fa-search"></i>
                    </div>
                </div>
                <div class="w-full flex flex-wrap flex-row">
                    <div class="w-1/4 pr-2 py-2">
                        <p class="text-lg text-gray-700 font-semibold pb-2 font-headline">City</p>
                        <select name="city" class="cursor-pointer w-full py-3 px-4 shadow rounded-lg focus:outline-none focus:shadow-outline">
                            <option value="ajax">Ajax</option>
                            <option value="oshawa">Oshawa</option>
                            <option value="pickering">Pickering</option>
                            <option value="whitby">Whitby</option>
                        </select>
                    </div>
                    <div class="w-1/4 pr-2 py-2">
                        <p class="text-lg text-gray-700 font-semibold pb-2 font-headline">Minimum Price</p>
                        <select name="min_price" class="cursor-pointer w-full py-3 px-4 shadow rounded-lg focus:outline-none focus:shadow-outline">
                            <option value="50000">50 K</option>
                            <option value="100000">100 K</option>
                            <option value="150000">150 K</option>
                        </select>
                    </div>
                    <div class="w-1/4 pr-2 py-2">
                        <p class="text-lg text-gray-700 font-semibold pb-2 font-headline">Maximum Price</p>
                        <select name="max_price" class="cursor-pointer w-full py-3 px-4 shadow rounded-lg focus:outline-none focus:shadow-outline">
                            <option value="50000">50 K</option>
                            <option value="100000">100 K</option>
                            <option value="150000">150 K</option>
                            <option value="200000">200 K</option>
                            <option value="250000">250 K</option>
                            <option value="300000">300 K</option>
                        </select>
                    </div>
                    <div class="w-1/4 pl-2 pb-2 pt-8 flex flex-wrap flex-row justify-end">
                        <div class="pl-2 pt-2">
                            <input type="submit" value="Search" class="cursor-pointer w-full py-3 px-6 shadow rounded-lg hover:bg-yellow-600 bg-yellow-500 hover:text-white text-black font-semibold cursor-pointerfocus:outline-none focus:shadow-outline"/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="flex flex-wrap flex-row w-full py-10 px-6 xl:px-32">
        <div class="w-1/4 px-4">
            <div class="rounded-lg shadow-lg">
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
        <div class="w-1/4 px-4">
            <div class="rounded-lg shadow-lg">
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
        <div class="w-1/4 px-4">
            <div class="rounded-lg shadow-lg">
                <img src="./images/houses/3-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
                <div class="py-4 px-4 flex flex-wrap">
                    <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary py-1 px-2">Condo</p>
                    <p class="w-full text-gray-500 text-md pt-4"><i class="fas fa-map-marker-alt mr-2 xl:mr-4"></i> 5 bonwill st., L1L 4K3</p><br/>
                    <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-map-marker mr-2 xl:mr-4"></i> Ajax</p><br/>
                    <p class="w-full text-gray-500 text-md pt-1"><i class="fas fa-dollar-sign mr-2 xl:mr-4"></i> $10,00,000</p>
                </div>
                <div class="w-full pb-4 text-center">
                    <a class="cursor-pointer font-semibold underline text-center text-gray-600 hover:text-gray-800">Read More</a>
                </div>
            </div>
        </div>
        <div class="w-1/4 px-4">
            <div class="rounded-lg shadow-lg">
                <img src="./images/houses/4-min.jpg" alt="homes" class="w-full object-cover shadow rounded-t-lg h-64"/>
                <div class="py-4 px-4 flex flex-wrap">
                    <p class="w-auto text-white text-xs shadow font-semibold rounded bg-primary py-1 px-2">Condo</p>
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
    </div>

<?php
require("./footer.php");
?>