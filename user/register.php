<?php
    include_once("../dbConfig.php");
?>
  <?php
               //session_start();
               if(isset($_SESSION["role"])){
                  
                  $role = $_POST['role'];
                  //$_SESSION['role'] = $_POST['role'];
                  //header("Location: login.php?role=$role");
                  
               }
            ?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Registration</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
         <?php
            include "../js/main.js";
            include "../css/user.css";  
            include "../css/bootstrap.css";          
         ?>
      </style>
   </head>
   <?php 
    $fname = $lname = $email = $password = $c_password = $phone = $address = $img = $residenceProof = $pet_name = $mother_name = $birth_place = "";
    $fnameError = $lnameError = $addressError = $profileError = $residenceProofError = $motherNameError = $petNameError = $birthPlaceError = $emailErr = $passwordErr = $strong_password_Err = $phoneErr = "";
    if (isset($_POST['register'])) {
        $fname  =   $_POST['firstName'];
        $lname  =   $_POST['lastName'];
        $email  =   $_POST['email'];
        $password   =   $_POST['password'];
        //password encryption
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $c_password =   $_POST['cnf-password'];
        $phone  =   $_POST['phone'];
        $address = $_POST['address'];
        // $profilePicture = $_POST["profilePicture"];
        //image upload code for profile picture
        $img = $_FILES['profilePicture']['name'];
        //image upload for residence proof
        $residenceProof = $_FILES['residenceProof']['name'];

        $pet_name = $_POST['petName'];
        $mother_name = $_POST['motherName'];
        $birth_place = $_POST['birthPlace'];
        $registration_date = date("Y-m-d");
        
        $account_status = 1;
        $payment_status = 1;
        $rand_fname_str = substr($fname, 0, 2);
        $rand_lname_str = substr($lname, -1);
         $random_number = rand(1, 99999);
         $unique_id = $rand_fname_str.$random_number.$rand_lname_str;
         $user_unique_id = strtoupper($unique_id);
        //image validation
        $file_ext = explode('.', $img);
        $file_extension_residenceProof = explode('.', $residenceProof);
       
        
        $file_ext_check = strtolower(end($file_ext));
        $file_ext_check_residenceProof = strtolower(end($file_extension_residenceProof));
       
        $valid_file_ext = array('png','jpg','jpeg');

        $email_result = mysqli_query($mysqli, "SELECT  `email_id` FROM `users` WHERE email_id='$email'");
        $user_matched = mysqli_num_rows($email_result);
        
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if($fname == ""){
            $fnameError = '<p style = "color:red">Please Enter First Name</p>';
        }
        
        if($lname == ""){
            $lnameError = '<p style = "color:red">Please Enter Last Name</p>';
        }

        if($address == ""){
            $addressError = '<p style = "color:red">Please Enter Address</p>';
        }

        if($img == ""){
            $profileError = '<p style = "color:red">Please upload Profile Picture !!!</p>';
        }

        if($residenceProof == ""){
            $residenceProofError =  '<p style = "color:red">Please upload Residence Proof !!!</p>';
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

        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailErr = '<p style = "color:red">Invalid Email Format</p>';
            //$emailErr = "Invalid Email Format";
        }
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $strong_password_Err = '<p style = "color:red"> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>';
            //$strong_password_Err = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
        }
        //$pattern = '/^\d+(\.\d{2})?$/';
        if(!preg_match('/^[0-9]{10}+$/', $phone)){
            $phoneErr = '<p style = "color:red">Contact Number must be of 10 Digit</p>';
            //$phoneErr = "Contact Number must be of 10 Digit";
        }
        if($password != $c_password)
        {
            $passwordErr = '<p style = "color:red">Password and Confirm Password are Different!!</p>';
            //$passwordErr = "Password and Confirm Password are Different!!";
        }
        if(!$emailErr && !$strong_password_Err && !$phoneErr && !$profileError && !$residenceProofError && !$passwordErr && !$birthPlaceError && !$petNameError && !$motherNameError && !$lnameError && !$fnameError && !$addressError)
        {
            if ($user_matched > 0) 
            {
                    echo '<script>alert("User already exists with this email id")</script>';
            } else {

                if(in_array($file_ext_check,$valid_file_ext) &&in_array($file_ext_check_residenceProof, $valid_file_ext) ){
                    $result   = mysqli_query($mysqli,
                    "INSERT INTO users
                    (`first_name`, `last_name`, `email_id`, `password`, `contact_number`, `address`,
                    `payment_status`, `registration_date`,`pet_name`, `mother_name`, `birth_place`,
                    `image`,`residence_proof`,`user_role`,`account_status`, `user_unique_id`) 
                    VALUES ('$fname','$lname','$email','$hashed_password','$phone','$address',
                    '$payment_status','$registration_date','$pet_name','$mother_name',
                    '$birth_place','$img','$residenceProof',2, '$account_status', '$user_unique_id')");
                  
                   if ($result) {
                        move_uploaded_file($_FILES['profilePicture']['tmp_name'],"../images/$img"); 
                        move_uploaded_file($_FILES['residenceProof']['tmp_name'],"../images/$residenceProof");
                        // die();
                     
                       echo 
                       "<script>
                           alert('User Registered successfully.')
                       window.location.href = 'user_login.php?role=user';
                       </script>";
                   } else {
                       echo '<script>alert("Registration error. Please try again!!")</script>';
                   }
                }else{
                    echo "
                        <script type = 'text/javascript'>
                            alert('Please upload valid image extension!!, it must be png, jpg, or jpeg.')    
                            window.location.href = 'register.php';
                        </script>
                    ";
                }

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

      <script>
    <?php
          include "../js/main.js";
          include "../js/bootstrap.js";
    ?>
</script>
   <body>
      <div class="container mt-5 mb-4">
         <div class="row" >
            <div class="col-sm-12 col-md-6 foroverflow overflow-scroll">
               <div class="">
                  <div class="content">
                     <div class="from-wrapper">
                      <form action="" method="post"  name="registration_form" autocomplete="off" enctype = "multipart/form-data">
                        <div class=" display-5 h5 justify-content-center fw-bolder logo1">
                           <img src="../images/logo.png" class="img-fluid logomodify">
                        </div>
                        <div class="fontincrease p-2 mb-3 ">Register Your Account Here</div>
                        <div class="mb-3 ">
                           <div class="row">
                              <div class="col-sm-12 col-md-6">
                                 <label for="firstName" class="form-label fw-light">First name *</label>
                                 <input type="text" class="form-control fw-lighter" name="firstName" id="firstName" placeholder="First name">
                                 <div class="error-msg"><?php echo $fnameError; ?></div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <label for="lastName" class="form-label fw-light">Last name *</label>
                                 <input type="text" class="form-control fw-lighter" name="lastName" id="lastName" placeholder="Last name">
                                 <div class="error-msg"><?php echo $lnameError; ?></div>
                              </div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="email" class="form-label fw-light">Email-address *</label>
                           <input type="text" class="form-control fw-lighter" name="email" id="email" placeholder="Email-address" >
                           <div class="error-msg"><?php echo $emailErr; ?></div>
                        </div>
                        <div class="mb-3">
                           <div class="row">
                              <div class="col-sm-12 col-md-6">
                                 <label for="password" class="form-label fw-light">Password *</label>
                                 <input type="Password" class="form-control fw-lighter" name="password" id="password" placeholder="Password" >
                                 <div class="error-msg"><?php echo $strong_password_Err; ?></div>
                              </div>
                              <div class="col-sm-12 col-md-6">
                                 <label for="cpassword" class="form-label fw-light">Confirm Password *</label>
                                 <input type="Password" class="form-control fw-lighter" name="cnf-password" id="confirmPassword"   placeholder="Confirm Password" >
                                 <div class="error-msg"><?php echo $passwordErr; ?></div>
                              </div>
                           </div>
                        </div>
                        <div class="mb-3">
                           <label for="contactNumber" class="form-label fw-light">Contact Number</label>
                           <input type="text" name="phone" class="form-control fw-lighter" id="contactNumber" placeholder="Contact No."  
                              oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
                              this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                              maxlength="10" data-rule-maxlength="10">
                           <div class="error-msg"><?php echo $phoneErr; ?></div>
                        </div>
                        <div class="mb-3">
                           <label for="address" class="form-label fw-light">Address</label>
                           <textarea class="form-control fw-lighter" id="address" name="address" placeholder = "Address" rows="3"></textarea>
                           <div class="error-msg"><?php echo $addressError; ?></div>
                        </div>
                        <div class="mb-3">
                           <label for="Image" class="form-label fw-light">Upload Profile Picture</label>
                           <input class="form-control fw-lighter" type="file" id="profilePicture" name="profilePicture" value = "">
                           <div class="error-msg"><?php echo $profileError; ?></div>
                        </div>
                        <div class="mb-4">
                           <label for="uploadProfileID" class="form-label fw-light">Upload Photo Id</label>
                           <input class="form-control fw-lighter" type="file" id="residenceProof" name="residenceProof" value = "">
                           <div class="error-msg"><?php echo $residenceProofError; ?></div>
                        </div>
                        <div class="mb-2">
                           <label for="SignUp" class="form-label fw-light"><b>Security Questions!!</b></label>
                        </div>
                        <div class="mb-3">
                           <label for="petName" class="form-label fw-light">Enter Your Pet Name *</label>
                           <input class="form-control fw-lighter" type="text" name="petName" id="petName" placeholder="Pet Name*">
                           <div class="error-msg"><?php echo $motherNameError; ?></div>
                        </div>
                        <div class="mb-3">
                           <label for="motherName" class="form-label fw-light">Enter Your Mother Name *</label>
                           <input class="form-control fw-lighter" type="text" name="motherName" id="motherName" placeholder="Mother Name*">
                           <div class="error-msg"><?php echo $petNameError; ?></div>
                        </div>
                        <div class="mb-3">
                           <label for="birthPlace" class="form-label fw-light">Enter Your Birth Place *</label>
                           <input class="form-control fw-lighter" type="text" name="birthPlace" id="birthPlace" placeholder="Birth Place*">
                           <div class="error-msg"><?php echo $birthPlaceError; ?></div>
                        </div>
                        <div class="mb-3 row d-flex ms-5">
                           <div class="col-6  ">
                            <input type="submit" class="btn btn-primary px-3 py-2 rounded-4  bg-success justify-content-center" name="register" value="Registration"></div>
                           <div class="col-6 ">
                              <!-- <a class="text-success" href='user_login.php?role=user'> -->
                                 <input type="reset" class="btn btn-primary px-4 py-2 rounded-4  bg-success" name="back" value="Back" 
                                 onclick = "redirectToLoginPage()">
                              <!-- </a> -->
                           </div>
                        </div>
                        <div class="mb-3">Already have account?&nbsp;&nbsp;<a class="text-success" href='user_login.php?role=user'><u>Login</u></a></div>
                      </form>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-sm-12 col-md-6 customsidebackground pb-3">
               <img src="../images/side_image.png" class="img-fluid imagescenter">
            </div>
         </div>
      </div>
   </body>
   <script>
      <?php
        include "../js/bootstrap.js";
        include "../js/user.js";
      ?>
      </script>
</html>