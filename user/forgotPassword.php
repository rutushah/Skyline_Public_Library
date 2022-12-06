<?php
session_start();

include_once("../dbConfig.php");
// echo $role = $_SESSION['role'];
// die();
$user_selected_role = "";
$sql = "SELECT * FROM `user_role`";
$all_user_role = mysqli_query($mysqli,$sql);
if(isset($_SESSION["role"])){
    $user_selected_role = $_SESSION["role"];
    // echo $user_selected_role;
    // die();
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
        $motherNameError = $emailErr = $petNameError = $birthPlaceError = "";
        if (isset($_POST['recover_password'])) {
            $mother_name  =   $_POST['motherName'];
            $pet_name  =   $_POST['petName'];
            $birth_place =   $_POST['birthPlace'];
            $email  =   $_POST['email'];

            $email_result = mysqli_query($mysqli, "select email_id from users where email_id ='$email'");
          
            $user_matched = mysqli_num_rows($email_result);

            $result = "SELECT * FROM `users` WHERE email_id = '$email' AND (mother_name ='$mother_name' AND pet_name = '$pet_name' AND 
            birth_place = '$birth_place') AND account_status = 0 AND payment_status = 0 AND user_status = 0";
           
            $query_result = mysqli_query($mysqli, $result) or die( mysqli_error($mysqli));
            $data_matched = mysqli_num_rows($query_result);
           
            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $emailErr = '<p style = "color:red">Invalid Email Format</p>';
            }
            if($mother_name == ""){
                $motherNameError = '<p style = "color:red">Please Enter Mother Name</p>';
            }

            if($pet_name == ""){
                $petNameError = '<p style = "color:red">Please Enter Pet Name</p>';
            }

            if($birth_place == ""){
                $birthPlaceError = '<p style = "color:red">Please Enter Birth Place</p>';
            }
            
            if(!$emailErr && !$motherNameError && !$petNameError && !$birthPlaceError)
            {
                if ($user_matched <= 0) 
                {
                    echo '<script>alert("Email Id Not Registered!! Click on Sign up..")</script>';
                } 
                else if($data_matched > 0){
                    $_SESSION['email_id'] = $_POST['email'];
                    echo '
                        <script>
                            window.location.href = "change_password.php";
                        </script>
                    ';
                   // header("location: change_password.php");
                }
                else{
                    echo '<script>alert("Please Enter Correct Information!!")</script>';
                }    
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
      <div class="col-sm-12 col-md-6 d-flex justify-content-center  ">
        <div class="content pe-5">
          <div class="from-wrapper  ">
            <div class=" display-5 h5 justify-content-center fw-bolder logo1 mb-5">
                           <img src="../images/logo.png" class="img-fluid logomodify">
                        </div>
            
            <form action="" method="post">

            <div class="mb-3 ">
                <label for="email" class="form-label fw-light">E-mail address</label>
                <input type="text" class="form-control fw-lighter" id="email" name = "email" placeholder="enter your email address">
                <div class="error-msg"> <?php echo $emailErr; ?> </div>
            </div>

            
            <div class="mb-3 ">
                <label for="motherName" class="form-label fw-light">Mother Name</label>
                <input type="text" class="form-control fw-lighter" id="motherName" name = "motherName" placeholder="Mother Name">
                <div class="error-msg"> <?php echo $motherNameError; ?> </div>
            </div>
          
            <div class="mb-3 ">
                <label for="petName" class="form-label fw-light">Pet Name</label>
                <input type="text" class="form-control fw-lighter" id="petName" name = "petName" placeholder="Pet Name">
                <div class="error-msg"> <?php echo $petNameError;  ?> </div>
            </div>

            <div class="mb-4 ">
                <label for="birthPlace" class="form-label fw-light">Birth Place</label>
                <input type="text" class="form-control fw-lighter" id="birthPlace" name = "birthPlace" placeholder="Birth Place">
                <div class="error-msg"> <?php echo $birthPlaceError; ?> </div>
            </div>
            
            <button type="submit" id="recover_password" name="recover_password" class="btn btn-primary px-3 py-2 rounded-4  bg-success">Recover Password</button>
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