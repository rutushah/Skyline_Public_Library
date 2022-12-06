<?php
ob_start();
session_start();

include_once("../dbConfig.php");

$user_selected_role = "";
$sql = "SELECT * FROM `user_role`";
$all_user_role = mysqli_query($mysqli,$sql);
if(isset($_SESSION["role"])){
    $user_selected_role = $_SESSION["role"];
}
?>
<!DOCTYPE html> 
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Login</title>
  
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
  $role = $email = $password = $id = "";
  if (isset($_POST['login'])) {
    $role =  $_GET["role"]; 
    $email    = $_POST['email'];
    $password = $_POST['password'];
    
      $get_user_role_id = "SELECT `user_role_id` FROM `user_role` WHERE user_role = '$role' ";
     
      $user_role_result = mysqli_query($mysqli, $get_user_role_id) or die( mysqli_error($mysqli));
      $role_row = mysqli_fetch_row($user_role_result);
      $selected_user_role = $role_row[0];

      if($role == 'user'){
        $show_data = mysqli_query($mysqli, "SELECT * FROM `users` WHERE user_role = '$selected_user_role' AND (email_id = '$email') 
        AND user_status = 0");
        while($data = mysqli_fetch_array($show_data)){
      
        $password_verify = password_verify($password, $data['password']);

        $result = "SELECT * FROM `users` WHERE user_role = '$selected_user_role' AND (email_id = '$email') 
        AND user_status = 0 AND account_status = 0 AND payment_status = 0";
        $query_result = mysqli_query($mysqli, $result) or die( mysqli_error($mysqli));
        $user_matched = mysqli_num_rows($query_result);
        $Row = mysqli_fetch_row($query_result);

        $compare_email = mysqli_query($mysqli, "select email_id from users where email_id = '$email'");
        $email_record = mysqli_num_rows($compare_email);
  
        if($email_record <= 0)
        {
          echo '<script>alert("Email Id Not Registered!! Click on Sign up..")</script>';
        }
        else if($user_matched > 0){
          $id = $Row[0];
          $_SESSION['id'] = $id;
          // $_SESSION['email_id'] = $email;
          
          
            if($password_verify){
            echo "
              <script> 
                alert('Customer logged in successfully!!!')
                window.location.href = 'user_dashboard.php'
              </script>";
              $_SESSION['email_id'] = $email;
              $_SESSION["role"] = $role;
            }  
       
        }else{
          echo '<script>alert("You cannot login !! Please Contact to the Administrative Department...")</script>';
      }
      }
      }else if($role == "staff" or $role == "admin"){    
      $staff_data = mysqli_query($mysqli,"SELECT * FROM `staff` WHERE user_role = '$selected_user_role' AND (email_id = '$email') 
      AND user_status = 0");

      while ($data = mysqli_fetch_array($staff_data)){

      $verify_staff_password = password_verify($password, $data['password']);

      $result = "SELECT * FROM `staff` WHERE user_role = '$selected_user_role' AND (email_id = '$email') AND user_status = 0";
      $query_result = mysqli_query($mysqli, $result) or die( mysqli_error($mysqli));
      $user_matched = mysqli_num_rows($query_result);
      $Row = mysqli_fetch_row($query_result);

      $compare_email = mysqli_query($mysqli, "select email_id from staff where email_id = '$email'");
      $email_record = mysqli_num_rows($compare_email);
    
      if($email_record <= 0)
      {
        echo '<script>alert("Email Id Not Registered!! Click on Sign up..")</script>';
      } 
    
        if($role == "staff"){
          if($verify_staff_password)
            echo "
              <script> 
                alert('Staff logged in successfully!!!')
                window.location.href = '../staff/staff_dashboard.php'
              </script>";
              $_SESSION['email_id'] = $email;
              $_SESSION["role"] = $role;
        }else if($role == "admin"){
          if($verify_staff_password)
            echo "
              <script> 
                alert('Admin logged in successfully!!!')
                window.location.href = '../admin/admin_dashboard.php'
              </script>";
              $_SESSION['email_id'] = $email;
              $_SESSION["role"] = $role;
        }
      }
    }
  }
?>
<body>
  <div class="container">
    <div class="row ">
      <div class="col-sm-12 col-md-6 d-flex justify-content-center mt-5">
        <div class="content">
          <div class="from-wrapper ">
            <div class=" display-5 h5 justify-content-center fw-bolder logo1">
                           <img src="../images/logo.png" class="img-fluid logomodify">
                        </div>
            
            <?php 
              if($user_selected_role == "admin"){
                echo '<div class="display-5 p-2 mb-3 ">Admin Login</div>';
              }else if($user_selected_role == "staff"){
                echo '<div class="display-5 p-2 mb-3 ">Staff Login</div>';
              }else {
                echo '<div class="display-5 p-2 mb-3 ">Access my account</div>';
              }
            ?>
            <form action="" method="post">
            <div class="mb-3 ">
  <label for="email" class="form-label fw-light">E-mail address</label>
  <input type="text" class="form-control fw-lighter" id="emailaddress" name = "email" placeholder="enter your email address">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label fw-light">Password</label>
  <input type="password" class="form-control fw-lighter" id="passwords" name = "password" placeholder="enter your password">
</div>
<?php 
                if($user_selected_role == "user"){
                  echo '<div class="mb-3"><a class="text-success text-rightside" href="forgotPassword.php"><u>Forgot?</u></a></div>';
                }
              ?>
<div class="col-12 justify-content-center p-2 d-flex flex-row-reverse mb-3">
    <button type="submit" id="login" name="login" class="btn btn-primary px-3 py-2 rounded-4  bg-success">Sign in</button>
  </div>
  <?php
                if($user_selected_role == "user" ){
                  echo "
                    <div class='col-12 justify-content-center  d-flex flex-row-reverse mb-3'>
                      <a class='text-success' href='register.php'><u>Create an account</u></a>
                    </div>
                  ";
                }   
              ?>
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