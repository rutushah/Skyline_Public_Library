<?php
    session_start();
    include_once("../dbConfig.php");
    $email = $_SESSION['email_id'];
    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
    $amount          = "50"; 
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$amount) * 100,
      "currency" => 'inr',
      "source"=> $token,
    ]);

    if($charge){  
       $upload_image_query = mysqli_query($mysqli, "UPDATE users SET payment_status = 0 WHERE email_id = '$email'");
      header("Location:success.php?amount=$amount");
    }
?>