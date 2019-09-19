<!--
FILE: 			: <?php echo basename(__FILE__, $_SERVER['PHP_SELF'])."\n"; ?>
TITLE           : AveNest Listings
AUTHORS         : Smit Patel
LAST MODIFIED   : SEPT 15, 2019
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