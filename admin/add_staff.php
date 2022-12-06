<?php
include_once("../dbConfig.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add Staff Members</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <?php
    $fname = $lname = $email = $contact = $password = $c_password = $address = $profile_picture = $photo_id = $is_admin = $user_role = $user_status = "";
    $fnameError = $lnameError = $emailError = $contactError = $strong_password_Error = $passwordError = $addressError = $profilePictureError = $photoIdError = "";
    if(isset($_POST['submit']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $contact = $_POST['contact'];
        $password = $_POST['password'];
        //password encryption
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $c_password = $_POST['c_password'];
        $address = $_POST['address'];
        $profile_picture = $_FILES['profile_picture']['name'];
        $photo_id = $_FILES['photo_id']['name'];
        if(isset($_POST['is_admin']) && ($_POST['is_admin'] == "yes"))
        {
            $user_role = "1";
        }else{
            $user_role = "3";
        }
        $user_status = 0;
        $registration_date = date("Y-m-d");

        //image validation
        $file_ext = explode('.', $profile_picture);
        $file_extension_photoID = explode('.', $photo_id);
        // print_r($file_ext);
        // die();
        $file_ext_check = strtolower(end($file_ext));
        $file_ext_check_residenceProof = strtolower(end($file_extension_photoID));
        // echo $file_ext_check;
        // die();

        $valid_file_ext = array('png','jpg','jpeg');

        // Validation
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number    = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);

        if($fname == "")
        {
            $fnameError = '<p style = "color:red">Please Enter First Name</p>';
        }
        if($lname == "")
        {
            $lnameError = '<p style = "color:red">Please Enter Last Name</p>';
        }
        if($email == "")
        {
            $emailError = '<p style = "color:red">Please Enter Email Address</p>';
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $emailError = '<p style = "color:red">Invalid Email Format</p>';
        }
        //$pattern = '/^\d+(\.\d{2})?$/';
        if($contact == "")
        {
            $contactError = '<p style = "color:red">Please Enter Contact Number</p>';
        }
        else if(!preg_match('/^[0-9]{10}+$/', $contact))
        {
            $contactError = '<p style = "color:red">Contact Number must be of 10 Digit</p>';
        }
        if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $strong_password_Error = '<p style = "color:red"> Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.</p>';
        }
        if($password != $c_password)
        {
            $passwordError = '<p style = "color:red">Password and Confirm Password are Different!!</p>';
        }
        if($address == "")
        {
            $addressError = '<p style = "color:red">Please Enter Address</p>';
        }
        if($profile_picture == "")
        {
            $profilePictureError = '<p style = "color:red">Please Select Profile Picture</p>';
        }
        if($photo_id == "")
        {
            $photoIdError = '<p style = "color:red">Please Select Photo Id</p>';
        }
       
        $email_result = mysqli_query($mysqli, "SELECT  `email_id` FROM `staff` WHERE email_id='$email'");
        $user_matched = mysqli_num_rows($email_result);
       
        if(!$fnameError && !$lnameError && !$emailError && !$contactError && !$strong_password_Error && !$passwordError && !$addressError && !$profilePictureError && !$photoIdError)
        {
            if ($user_matched > 0) 
            {
                    echo '<script>alert("Member already exists with this email id")</script>';
            } else {

                if(in_array($file_ext_check,$valid_file_ext) &&in_array($file_ext_check_residenceProof, $valid_file_ext) ){
                  //  if(in_array($file_ext_check_residenceProof, $valid_file_ext)){

                $result   = mysqli_query($mysqli,
                 "INSERT INTO staff
                 (`first_name`, `last_name`, `email_id`, `password`, `contact_number`, `address`, `registration_date`, `user_status`, `image`, `residence_proof`,`user_role`) 
                 VALUES ('$fname','$lname','$email','$hashed_password','$contact','$address','$registration_date','$user_status','$profile_picture','$photo_id','$user_role')");
               
                if ($result) {
                     move_uploaded_file($_FILES['profile_picture']['tmp_name'],"../images/$profile_picture"); 
                     move_uploaded_file($_FILES['photo_id']['tmp_name'],"../images/$photo_id");
                  
                    echo 
                    "<script>
                        alert('Staff Registered successfully.')
                    window.location.href = 'admin_dashboard.php';
                    </script>";
                } else {
                    echo '<script>alert("Registration error. Please try again!!")</script>';
                }
            }else{
                echo "
                    <script type = 'text/javascript'>
                        alert('Please upload valid email extension!!, it must be png, jpg, or jpeg.')    
                        window.location.href = 'add_staff.php';
                    </script>
                ";
            }

            }
        }
    }      
    ?>
<body>
    
<div class="header_sidebar">
      </div>
      <div class="row">
         <div class="col-2">
            <?php include 'admin_header_sidebar.php';?>
         </div>
         <div class="col-12 justify-content-center">
            <div class=" main_content">
               <div class="dashboard">
                  <h1><b>Skyline Public Library<b></h1>
               </div>
               <div class="row">
                  <div class="col-3"></div>
                  <div class="col-6">
                     <div class="h2">Add Staff Member</div>
                  </div>
                  
               </div>
               <div class="row m-3">
                <div class="col-2"></div>
                <div class="col-10">
               <form class="needs-validation" action="" method="post" id="add_staff_form" name="add_staff_form"  enctype="multipart/form-data" novalidate>
                <div class="row mb-3">
                    <label for="fname" class="col-sm-2 col-form-label">First Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="fname" name="fname">
                        <div class="error-msg"><?php echo $fnameError; ?></div>
                    </div>
                    
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="row mb-3">
                    <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="lname" name="lname">
                        <div class="error-msg"><?php echo $lnameError; ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email">
                        <div class="error-msg"><?php echo $emailError; ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="contact" name="contact"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
                        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                        maxlength="10" data-rule-maxlength="10">
                        <div class="error-msg"><?php echo $contactError; ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password">
                        <div class="error-msg"><?php echo $strong_password_Error; ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="c_password" class="col-sm-2 col-form-label">Confirm Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="c_password" name="c_password">
                        <div class="error-msg"><?php echo $passwordError; ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="photo_id" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        <div class="error-msg"><?php echo $addressError; ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="c_password" class="col-sm-2 col-form-label">Profile Picture</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" value="">
                        <div class="error-msg"><?php echo $profilePictureError; ?></div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="photo_id" class="col-sm-2 col-form-label">Photo Id</label>
                    <div class="col-sm-8">
                        <input type="file" class="form-control" id="photo_id" name="photo_id" value="">
                        <div class="error-msg"><?php echo $photoIdError; ?></div>
                    </div>
                </div>
                <div class="col-auto">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="is_admin" value="yes">
                    <label class="col-sm-3 form-check-label" for="gridCheck">Staff Member is Admin?</label>
                </div>
                <div class="container my-3">
                    <div class="col-md-12 text-center">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <input type="reset" class="btn btn-primary" name="back" value="Back" onclick = "redirectToStaffListPage()">
                    </div>
                </div>
            </form>
            </div>
               </div>
</div>
</div>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- <script src="./assets/js/main.js"></script> -->

   
</body>
<script> 
<?php
        include "../js/admin.js";
        ?>
   </script>
</html>