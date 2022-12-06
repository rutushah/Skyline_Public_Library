<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

</head>
<body>
    <div class="header_sidebar">
        <?php include 'staff_header_sidebar.php';?>
    </div>
    
<div class="main_content">
        <div class="dashboard">
            <h1><b>Skyline Public Library<b></h1>
        </div>
        <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                     <div class="h2">Update Personal Info</div>
                  </div>
                  
               </div>

        <?php
            //edit category
            // $contactError = $addressError "";
            $contactError = $addressError ="";
            $contact = $address = "";
            if (isset($_POST['Save'])) {
                $contact = $_POST['contact'];
                $address = $_POST['address'];

                if($contact == ""){
                    $contactError = '<p style = "color:red">Please Enter Contact Number</p>';
                }

                if($address == ""){
                    $addressError = '<p style = "color:red">Please Enter Address</p>';
                }
                 
                if(!$contactError && !$addressError){
                    $edit_profile = "UPDATE `staff` SET `contact_number`='$contact',`address`='$address' WHERE staff_id = '$staff_login_id'";
                    $profile_edited_success = mysqli_query($mysqli,$edit_profile);
                    if($profile_edited_success){
                        echo '
                            <script>
                                alert("Profile Edited Successfully!!")
                                window.location.href = "staff_dashboard.php"
                            </script> 
                        ';
                    }
                }
            }        
        ?>

        <?php 
        // echo $staff_login_id;
        // die();
            $query = mysqli_query($mysqli,"SELECT * FROM `staff` WHERE staff_id = '$staff_login_id'");
             while($row = mysqli_fetch_array($query)){     
             // echo $row['contact_number'];
            //  }
            ?>

        <form action="" method="post" class = "addCategory">
            <div class="row mb-3">
                <label for="contact" class="col-sm-2 col-form-label">Contact</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="contact" name="contact"
                    oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
                    this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                    maxlength="10" data-rule-maxlength="10" value = "<?php echo $row['contact_number']; ?> ">
                    <div class="error-msg"><?php echo $contactError; ?></div>
                </div>
            </div>

            <div class="row mb-3">
                    <label for="address" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="address" name="address" rows="3" >
                        <?php echo $row['address']; ?> 
                        </textarea>
                        <div class="error-msg"><?php echo $addressError; ?></div>
                    </div>
                </div>

            <div class="row-g-3">
                <div class="col-auto user_buttons">
                    <!-- <button class="btn btn-success" id="save" name = "Save">Save</button> -->
                    <div class="col-6  ">
                        <input type="submit" class="btn btn-primary px-3 py-2 rounded-4  bg-success justify-content-center" name="Save" value="Save"></div>
                    </div>
                    <div class="col-6  ">
                        <input type="reset" value="Cancel" class="btn btn-primary px-4 py-2 rounded-4  bg-success" onclick = "window.location.href = 'staff_dashboard.php'">
                    </div>
                </div>
            </div>
        </form>
</div>
        <?php
            }   
            if (!$query) {
                printf("Error: %s\n", mysqli_error($mysqli));
                exit();
            } 
        ?>
<script>
        <?php
            include "../js/admin.js";
        ?>
    </script>
</body>
</html>