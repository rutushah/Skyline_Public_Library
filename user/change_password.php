<?php 
  ob_start(); 
  session_start();
  include "../dbConfig.php";
//   include "header.php";    
  if(isset($_SESSION['email_id'])){
    $email = $_SESSION['email_id'];
  }
?>

<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Forgot Password</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
         <?php
            include "../js/main.js";
            include "../css/user.css";  
            include "../css/bootstrap.css";
            include "../js/bootstrap.js";
            ?>
      </style>
</head>

<?php
     $passwordErr = $strong_password_Err = "";
     if (isset($_POST['recover_password'])) 
     {
         $password   =   $_POST['password'];
         //password encryption
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
         $c_password =   $_POST['cnf-password'];
        
         $uppercase = preg_match('@[A-Z]@', $password);
         $lowercase = preg_match('@[a-z]@', $password);
         $number    = preg_match('@[0-9]@', $password);
         $specialChars = preg_match('@[^\w]@', $password);

         if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
             $strong_password_Err = '<p style = "color:red"> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>';
         }
         if($password != $c_password)
         {
             $passwordErr = '<p style = "color:red">Password and Confirm Password are different!!</p>';
         }

         if(!$strong_password_Err && !$passwordErr)
         {
             $result   = mysqli_query($mysqli,"UPDATE users SET password = '$hashed_password' WHERE email_id = '$email'");
             echo "<script>window.location.href = 'user_login.php?role=user';</script>";    
         }
     }    
     function test_input($data) {
         $data = trim($data);
         $data = stripslashes($data);
         $data = htmlspecialchars($data);
         return $data;
     }
?>

<body>
  <div class="container">
    <div class="row ">
      <div class="col-sm-12 col-md-6 d-flex justify-content-center ">
        <div class="content">
          <div class="from-wrapper ">
            <div class=" display-5 h5 justify-content-center fw-bolder logo1 mb-5">
                           <img src="../images/logo.png" class="img-fluid logomodify">
                        </div>
            
            <form action="" method="post">

            <div class="mb-4 ">
                <label for="email" class="form-label fw-light">E-mail address</label>
                <input type="text" class="form-control fw-lighter" id="email" name = "email" placeholder="enter your email address" 
                    value = "<?php echo $email; ?>">
            </div>

            <div class="mb-3 ">
                <label for="password" class="form-label fw-light">Password</label>
                <input type="password" class="form-control fw-lighter" id="password" name = "password" placeholder="Enter your password" 
                    value = "<?php echo $strong_password_Err; ?>">
            </div>

            <div class="mb-4 ">
                <label for="email" class="form-label fw-light">Confirm - Password</label>
                <input type="password" class="form-control fw-lighter" id="cnf-password" name = "cnf-password" placeholder="Enter your confirm - password" 
                    value = "<?php echo $passwordErr; ?>">
            </div>
                    
            <button type="submit" id="recover_password" name="recover_password" class="me-4 btn btn-primary px-3 py-2 rounded-4  bg-success">Recover Password</button>
            <button type="reset" id="login" name="login" class="btn btn-primary px-3 py-2 rounded-4  bg-success">Login</button>


            </form>

          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 customsidebackground mt-5">
        <img src="../images/side_image.png" class="img-fluid imagescenter">
      </div>
    </div>
  </div>
</body>
</html>