<?php
/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

$databaseHost     = 'localhost';
$databaseName     = 'library_management';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if(!$mysqli){
    die("Database Connection Fail: ". mysqli_error());
}
 // echo "Connection Successful";
?>
