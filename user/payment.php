<?php
    session_start();
    $email = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>You have to pay Here to unlock your account!!</h1>
    <form action="checkout.php" method="post" class = "payment">
        <div>
            <label for="email">Email :</label>
            <div class="col-sm-10">
                <input type="text" id="email" readonly name="email" value="<?php echo $email; ?>">
            </div>
        </div>
        <div>
        <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                data-key="pk_test_51Lv2hJICaGdZNW0kI3O2LwdXP9qu8EPkN34lqSHBkZls08DuCx0AmhqtqiA2lsaUGy0mHrGrPayglVt5wfK0h5HF00ZodYJUyl"
                data-amount=<?php echo str_replace(",","",50) * 100?>
                data-image="../images/logo.png"
                data-name="Skyline Library"
                data-description="Skyline Library"
                data-email=<?php echo $email; ?>
                data-currency="cad"
                data-locale="auto">
                </script>
        </div>
        <?php
            $_SESSION['email_id'] = $email;
        ?>
    </form>
</body>
</html>