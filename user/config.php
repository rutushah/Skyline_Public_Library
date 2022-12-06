<?php
 
    require('stripe-php-master/init.php'); 

    $publishable_key = "pk_test_51M5aqaJDo9sqK7RzhAtqCYiMEydepd3RjRjIVZ8WCEgaqKFWxPW3OIEmvoJq3FOdmm9p7LRxLSgZTktIGmykXe4l00bLmSzwAY";
    $secret_key = "sk_test_51M5aqaJDo9sqK7RziRsB92OqwpSzmZDTfklKfkrgdpeZIiLvg8iTxRG0PfWove0yV1m13xBQz7WZxWQU1JWospOv00zzaVvpeW";

    \Stripe\Stripe::setApiKey($secret_key);

?>