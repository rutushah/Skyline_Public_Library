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
    <title>Payment</title>
    <style>
         <?php
            include "../js/main.js";
            include "../css/user.css";  
            include "../css/bootstrap.css";
            include "../js/bootstrap.js";
            ?>
      </style>
</head>
<body>

<div class="container">
    <div class="row ">
    <div class="col-sm-2"></div>
      <div class="col-sm-8 border border-1 d-flex justify-content-center mt-5">
        <div class="content">
          <div class="from-wrapper ">
            <div class=" display-5 h5 justify-content-center fw-bolder logo1">
                           <img src="../images/logo.png" class="img-fluid logomodify ">
                        </div>
                        <div class="fontincrease p-2 mb-4 mt-4 ">You have to pay Here to unlock your account!!</div>
            <form action="checkout.php" method="post" class = "pb-2">
            <div class="mb-3 ms-5 ">
            <label for="email" class="form-label fw-light ps-5 ms-5">&nbsp;E-mail address&nbsp;&nbsp;</label>
            <input type="text" id="email" readonly name="email" value="<?php echo $email; ?>">
</div>


<div class="col-12 justify-content-center p-2 d-flex flex-row-reverse mb-3">
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

          </div>
        </div>
      </div>
      <div class="col-sm-2"></div>
    </div>
  </div>



</body>
</html>