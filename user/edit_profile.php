<?php 
    session_start();
    include_once("../dbConfig.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <?php 
        include "user_header.php";
    ?>    
        <?php
            //edit category
            $emailErr = $contactError = $addressError = "";
            $email = $contact = $address = "";
            if (isset($_POST['Save'])) {
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                $address = $_POST['addresses'];

                if($email == ""){
                    $emailErr = '<p style = "color:red; font-weight: normal;">Please Enter Email</p>';
                }

                if($contact == ""){
                    $contactError = '<p style = "color:red; font-weight: normal;">Please Enter Contact Number</p>';
                }

                if($address == ""){
                    $addressError = '<p style = "color:red; font-weight: normal;">Please Enter Address</p>';
                }
                 
                if(!$contactError && !$addressError && !$emailErr){
                    $edit_profile = "UPDATE `users` SET `email_id`='$email',`contact_number`='$contact',`address`='$address' WHERE user_id = '$user_full_id'";
                    $profile_edited_success = mysqli_query($mysqli,$edit_profile);
                    if($profile_edited_success){
                        echo '
                            <script>
                                alert("Profile Edited Successfully!!")
                                window.location.href = "user_dashboard.php"
                            </script> 
                        ';
                    }
                }
            }        
        ?>

        <?php 
        // echo $staff_login_id;
        // die();
            $query = mysqli_query($mysqli,"SELECT * FROM `users` WHERE user_id = '$user_full_id'");
             while($row = mysqli_fetch_array($query)){     
             // echo $row['contact_number'];
            //  }
            ?>

<div class="main_content">
    <div class="dashboard">
        <h1 class="centering"><b>Skyline Public Library<b></h1>
    </div>
    <div class="user_requestsHeading">
        <h2 class="centering pb-4">Update my Personal Info</h2>
    </div>
    <form action="" method="post" class = "addCategory editform " name = "edit_profile">
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-8">
                    <input type="email" name="email" id="email"  class="form-control" value = '<?php echo $row['email_id']; ?>'>
                <div class="error-msg"><?php echo $emailErr; ?></div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="contact" class="col-sm-2 col-form-label">Contact No</label>
                <div class="col-sm-8">
                    <input type="text" name="contact" id="contact"  class="form-control"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
                    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                    maxlength="10" data-rule-maxlength="10"
                    value = "<?php echo $row['contact_number'];?>">
                <div class="error-msg"><?php echo $contactError; ?></div>
            </div>
        </div>

        <div class="row mb-3">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-8">
                    <textarea class="form-control" id="address" name="addresses" rows="3" >
                    <?php echo $row['address']; ?>
                  </textarea>   
                <div class="error-msg"><?php echo $addressError; ?></div>
            </div>
        </div>

        <div class="row-g-3">
            <div class="col-2"></div>
            <div class="col-8 user_buttons editbutton">
                <input type="submit" value="Save" class="btn btn-success me-5" id="save" name = "Save">
                <input type="reset" value="Cancel" class="btn btn-success" id="cancel" name = "Cancel" onclick = "window.location.href = 'user_dashboard.php'">
            </div>
            <div class="col-2"></div>
        </div>

        <?php } ?>
   
    </form>
</div>
</body>
</html>