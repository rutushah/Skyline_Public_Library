<?php
    include "dbConfig.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <!-- including css files -->
    <style>
        <?php
            include "css/style.css";  
            include "css/bootstrap.css";
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
                $result   = mysqli_query($mysqli,
                 "INSERT INTO users
                 (`first_name`, `last_name`, `email_id`, `password`, `contact_number`, `address`, `pet_name`, `mother_name`, `birth_place`,
                 `image`,`residence_proof`,`user_role`) 
                 VALUES ('$fname','$lname','$email','$password','$phone','$address','$pet_name','$mother_name','$birth_place','$img','$residenceProof',2)");
               
                if ($result) {
                     move_uploaded_file($_FILES['profilePicture']['tmp_name'],"images/$img"); 
                     move_uploaded_file($_FILES['residenceProof']['tmp_name'],"images/$residenceProof");
                  
                    echo 
                    "<script>
                        alert('User Registered successfully.')
                    window.location.href = 'login.php';
                    </script>";
                } else {
                    echo '<script>alert("Registration error. Please try again!!")</script>';
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


<!-- including js files -->
<script>
    <?php
          include "js/main.js";
          include "js/bootstrap.js";
    ?>
</script>

<!-- Registering users to library_management using insert query of php -->



<body>
<div class="login-form">
        <form action="" method="post"  name="registration_form" autocomplete="off" enctype = "multipart/form-data">
        <div class="avatar bg-info"><i style='font-size:24px' class='fas'>&#xf406;</i></div>
    	<h4 class="modal-title text-info">Register Here to be the member of Skyline Public library</h4>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="firstName" class = "mb-3"> First Name</label>
                    <input type="text" class="form-control mb-3" name="firstName" id="firstName" placeholder="First name*">
                    <div class="error-msg"><?php echo $fnameError; ?></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="lastName" class = "mb-3"> Last Name</label>
                    <input type="text" class="form-control mb-3" name="lastName" id="lastName" placeholder="Last Name*">
                    <div class="error-msg"><?php echo $lnameError; ?></div>
                </div>
            </div>
        </div>
   
        <div class="form-group">
        <label for="email" class = "mb-3"> Email</label>
        <input type="text" class="form-control mb-3" name="email" id="email" placeholder="Email*" >
        <div class="error-msg"><?php echo $emailErr; ?></div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="password" class = "mb-3">Password</label>
                    <input type="Password" name="password" class="form-control" id="password" placeholder="Password">
                    <div class="error-msg"><?php echo $strong_password_Err; ?></div>
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="cpassword" class = "mb-3">Confirm Password</label>
                    <input type="Password" name="cnf-password" id="confirmPassword"  class="form-control" placeholder="Confirm Password" >
                    <div class="error-msg"><?php echo $passwordErr; ?></div>
                </div>
            </div>
        </div>
           
        <div class="form-group">
            <label for="contactNumber" class= "mb-3"> Contact Number </label>
            <input type="number" name="phone" class="form-control" id="contactNumber" placeholder="Contact No."  
            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
            this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
            maxlength="10" data-rule-maxlength="10">
            <div class="error-msg"><?php echo $phoneErr; ?></div>
        </div>

        <div class="form-group">
            <label for="address" class = "mb-3">Address</label>
            <textarea class="form-control" id="address" name="address" placeholder = "Address" rows="3"></textarea>
            <div class="error-msg"><?php echo $addressError; ?></div>
        </div>
        
        <div class="form-group">
            <label for="Image" class="mb-3">Upload Profile Picture</label>
                <input class="form-control mb-3" type="file" id="profilePicture" name="profilePicture" value = "">
                <!-- <button onclick="clearImage()" class="btn btn-primary mt-3"></button> -->
                 <div class="error-msg"><?php echo $profileError; ?></div>

            <!-- <img id="frame" src="" class="img-fluid" /> -->
        </div>

        <div class="form-control">
            <label for="uploadProfileID" class="mb-3">Upload Residence Proof</label>
            <input class="form-control mb-3" type="file" id="residenceProof" name="residenceProof" value = "">
            <div class="error-msg"><?php echo $residenceProofError; ?></div>
            <!-- <img id="frame" src="" class="img-fluid" /> -->
        </div>

        <label for="SignUp" class = "mb-3"> Security Questions !!</label>
        <div class="form-group">
            <input type="text" class="form-control mb-3" name="petName" id="petName" placeholder="Pet Name*">
            <div class="error-msg"><?php echo $motherNameError; ?></div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control mb-3" name="motherName" id="motherName" placeholder="Mother Name*">
            <div class="error-msg"><?php echo $petNameError; ?></div>
        </div>

        <div class="form-group">
            <input type="text" class="form-control mb-3" name="birthPlace" id="birthPlace" placeholder="Birth Place*">
            <div class="error-msg"><?php echo $birthPlaceError; ?></div>
        </div>
        
        <input type="submit" class="btn btn-info bg-info btn-block btn-lg text-light" name="register" value="Registration"><br>
        <p>Already have an account 
            <a href="login.php">Login</a>
        </p>
      
        </form>
    </div>

</body>
</html>