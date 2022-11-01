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

 require_once "user/stripe-php-master/init.php";

 $stripeDetails = array(
     "secretKey" => "sk_test_51Lv2hJICaGdZNW0keEZzmBZIncaPJiYnFzNxZJXiQyjCfipfOjSUuTBBM7Xpdxrak30zcLTDuxLquxhtSB0eT3Wl00NILGzZ4K",
     "publishableKey" => "pk_test_51Lv2hJICaGdZNW0kI3O2LwdXP9qu8EPkN34lqSHBkZls08DuCx0AmhqtqiA2lsaUGy0mHrGrPayglVt5wfK0h5HF00ZodYJUyl"
 );

 \Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
?>
