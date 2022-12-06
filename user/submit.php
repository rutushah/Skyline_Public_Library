<?php
    require('config.php');
    // echo '<pre>';
    // print_r($_POST);

    // \Stripe\Stripe::setVerifySslCerts();

    session_start();
    include_once("../dbConfig.php");
    $email = $_SESSION['email_id'];
    $user_fine = $_SESSION['fine_amount'];
    $token = $_POST["stripeToken"];
    $token_card_type = $_POST["stripeTokenType"];
    // $amount          = "20"; 
    $charge = \Stripe\Charge::create([
      "amount" => str_replace(",","",$user_fine) * 100,
      "currency" => 'cad',
      "source"=> $token,
    ]);

   // echo '<pre>';
    //print_r($charge);
    if($charge){
            $update_fine = mysqli_query($mysqli, "UPDATE users SET fine = 0 WHERE email_id = '$email'");
        echo '
            <script>
                alert("Payment Success!!!")
                window.location.href = "user_dashboard.php";
            </script>
        ';
    }

?>