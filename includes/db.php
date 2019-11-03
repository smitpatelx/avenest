<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : OCT 30, 2019
DESCRIPTION     : Database configuration, connection
-->
<?php

//Establishing connection to database
function db_connect()
{
    $connection = pg_connect("host=".DB_HOST." dbname=".DB_NAME." user=".DB_USER." password=".DB_PASSWORD.""); 
    return $connection;
}

//Sql prepare statment
function db_prepare($name, $sql)
{
    $dbconn = db_connect();
    return pg_prepare($dbconn, $name, $sql);
}

function db_execute($name, $array)
{
    $dbconn = db_connect();
    return pg_execute($dbconn, $name, $array);
}

function build_simple_dropdown($table, $column, $preselect, $multi = false){
    $conn = db_connect();
    $output = "";

    $sql = "SELECT * FROM ".$table;
    $result = pg_query($conn, $sql);
    if (pg_num_rows($result) > 0) {
        // output data of each row
        $output .= "<div class='w-1/3 pr-2 py-2'> 
        <p class='text-lg font-normal py-2 text-black'>".senetize_sentence($table)."</p>
        <select name='".$table.($multi ? '[]' : '')."' ".($multi ? 'multiple="multiple"' : '')." class='focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100'>";

        while($row = pg_fetch_assoc($result)) {
            $output .= "<option value='".$row['value']."'";

                if ( $row[$column] == $preselect ){
                    $output .= " selected='selected' ";
                }

            $output .= ">".ucwords($row[$column])."</option>";            
        }
        $output .= "</select>";
        $output .= "</div>";
    }

    echo $output;
}

function build_radio($value, $sticky) {
    $conn = db_connect();
    $output = "";

    if ($value == "preferred_contact_method") {

        $sql = "SELECT * FROM preferred_contact_method ";
        $result = pg_query($conn, $sql);
        if (pg_num_rows($result) > 0) {
            // output data of each row
 
            $output .= "<div class='flex flex-wrap'>";      
            while($row = pg_fetch_assoc($result)) {
                $output .= "<label class='flex items-center mr-4'>";
                $output .= "<input class='focus:outline-none bg-white' name='contact_method' type='radio' value='".$row['value']."'";
                
                    if ( $row['value'] == $sticky ){
                        $output .= " checked='checked' ";
                    }

                $output .= "/>";   
                $output .= "<span class='text-md font-semibold py-2 ml-2 text-gray-700 select-none'>".ucwords($row['method_name'])."</span>";    
                $output .= "</label>";     
            }     
                $output .= "</div>";      
        }
    } else if ($value == "listing_status") {

        $sql = "SELECT * FROM listing_status ";
        $result = pg_query($conn, $sql);
        if (pg_num_rows($result) > 0) {
            // output data of each row       
            $output .= "<div class='flex flex-wrap'>";   
            while($row = pg_fetch_assoc($result)) {
                $output .= "<label class='flex items-center mr-4'>";
                $output .= "<input name='listing_status' type='radio' value='".$row['value']."' ";

                    if ( $row['value'] == $sticky ){
                        $output .= " checked='checked' ";
                    }
                $output .= "/>";   
                $output .= "<span class='text-md font-semibold py-2 ml-2 text-gray-700 select-none'>".ucwords($row['property'])."</span>";    
                $output .= "</label>";     
            }          
            $output .= "</div>";    
        }
    } else if ($value == "pets_friendly") {

        $sql = "SELECT * FROM pets_friendly ";
        $result = pg_query($conn, $sql);
        if (pg_num_rows($result) > 0) {
            // output data of each row          
            $output .= "<div class='flex flex-wrap'>"; 
            while($row = pg_fetch_assoc($result)) {
                $output .= "<label class='flex items-center mr-4'>";
                $output .= "<input name='pets_friendly' type='radio' value='".$row['value']."'  ";
                    if ( $row['value'] == $sticky ){
                        $output .= " checked='checked' ";
                    }
                $output .= "/>";   
                $output .= "<span class='text-md font-semibold py-2 ml-2 text-gray-700 select-none'>".ucwords($row['property'])."</span>";    
                $output .= "</label>";     
            }          
            $output .= "</div>";
        }
    }

    echo $output;
}