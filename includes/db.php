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

function build_simple_dropdown($table, $column, $preselect, $multi = false, $width = "w-1/3"){
    $conn = db_connect();
    $output = "";

    $sql = "SELECT * FROM ".$table;
    $result = pg_query($conn, $sql);
    if (pg_num_rows($result) > 0) {
        // output data of each row
        $output .= "<div class='".$width." pr-2 py-2'> 
        <p class='text-lg font-normal py-2 text-black'>".senetize_sentence($table)."</p>
        <select name='".$table.($multi ? '[]' : '')."' ".($multi ? 'multiple="multiple"' : '')." class='focus:outline-none focus:shadow-outline w-full py-3 px-4 shadow-lg rounded-lg bg-white focus:bg-gray-100'>";

        while($row = pg_fetch_assoc($result)) {
            $output .= "<option value='".$row['value']."'";

            if($multi){
                if (in_array($row['value'], $preselect)){
                    $output .= " selected='selected' ";
                }
            } else {
                if ($row['value'] == $preselect ){
                    $output .= " selected='selected' ";
                }
            }

            $output .= ">".ucwords($row[$column])."</option>";            
        }
        $output .= "</select>";
        $output .= "</div>";
    }

    echo $output;
}

function build_radio($table, $column, $preselect, $width = "w-1/3", $value = "value") {
    $conn = db_connect();
    $output = "";

    $sql = "SELECT * FROM ".$table;
    $result = pg_query($conn, $sql);
    if (pg_num_rows($result) > 0) {
        // output data of each row

        $output .= "<div class='".$width." flex flex-wrap pr-2 py-2'>
                    <p class='w-full text-lg font-normal py-2 text-black'>".senetize_sentence($table)."</p>";      
        while($row = pg_fetch_assoc($result)) {
            $output .= "<label class='w-auto flex items-center mr-4'>";
            $output .= "<input class='focus:outline-none bg-white' name='".$table."' type='radio' value='".$row[$value]."'";
            
                if ( $row[$value] == (string)$preselect ){
                    $output .= " checked='checked' ";
                }

            $output .= "/>";   
            $output .= "<span class='text-md font-semibold py-2 ml-2 text-gray-700 select-none'>".ucwords($row[$column])."</span>";    
            $output .= "</label>";     
        }     
            $output .= "</div>";      
    }

    echo $output;
}

function build_checkbox($table, $column, $preselect, $width = "w-1/3"){
    $conn = db_connect();
    $output = "";

    $sql = "SELECT * FROM ".$table;
    $result = pg_query($conn, $sql);
    if (pg_num_rows($result) > 0) {
        // output data of each row
        $output .= "<div class='".$width." pr-2 py-2 flex flex-wrap parent-ch'>";
        $output .= "<div class='w-full flex flex-wrap items-center'>";
        $output .= "<p class='w-auto text-lg font-normal py-2 text-black'>".senetize_sentence($table)."</p>";
        $output .= "<a onClick='checkbox_all(this)' class='ml-4 w-auto leading-tight bg-transparent text-gray-700 hover:text-gray-500 font-normal cursor-pointer'><i class='fas fa-tasks'></i></a></div>";
        while($row = pg_fetch_assoc($result)) {
                $output .= "<label class='w-auto flex items-center mr-4'>";
                $output .= "<input name='".$table."[]' type='checkbox' value='".$row[$column]."'  ";
                    if ( (int)$row[$column] & (int)$preselect ){
                        $output .= " checked='checked' ";
                    }
                $output .= "/>";   
                $output .= "<span class='text-md font-semibold py-2 ml-2 text-gray-600 select-none'>".ucwords($row['property'])."</span>";    
                $output .= "</label>";           
        }
        $output .= "</div>";
    }

    echo $output;
}


function displayStatus($val){
    if($val==LISTING_STATUS_OPEN){
        return '<p class="w-auto text-white text-xs shadow font-semibold rounded bg-green-500 py-1 px-2 leading-tight flex justify-center items-center">Open</p>';
    } else if($val==LISTING_STATUS_CLOSE){
        return '<p class="w-auto text-white text-xs shadow font-semibold rounded bg-red-500 py-1 px-2 leading-tight flex justify-center items-center">Closed</p>';
    } else if($val==LISTING_STATUS_SOLD){
        return '<p class="w-auto text-black text-xs shadow font-semibold rounded bg-yellow-500 py-1 px-2 leading-tight flex justify-center items-center">Sold</p>';
    } else if($val==LISTING_STATUS_HIDDEN){
        return '<p class="w-auto text-white text-xs shadow font-semibold rounded bg-gray-500 py-1 px-2 leading-tight flex justify-center items-center">Hidden</p>';
    }
}

function displayProperty($table, $val, $value = 'value', $property= 'property'){
    $conn = db_connect();
    $sql = "SELECT * FROM $table;";
    $query = pg_query($conn, $sql);

    while($row = pg_fetch_assoc($query)){
        if($row[$value]==$val){
            $val = isset($row[$property])?$row[$property]:$row[$value];
            return ucwords($val);
        }
    }
}

function displayPropertyOptions($table, $val){
    $conn = db_connect();
    $sql = "SELECT * FROM $table;";
    $query = pg_query($conn, $sql);

    $output = "";
    while($row = pg_fetch_assoc($query)){
        if( (int)($row['value'] & (int)$val) ){
            $val2 = isset($row['property'])?$row['property']:$row['value'];
            $output.= ucwords($val2).", ";
        }
    }
    return $output;
}