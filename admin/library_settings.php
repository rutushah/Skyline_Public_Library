<?php
include_once("../dbConfig.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Edit Library Information</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    
<body>

<?php

   $library_name = $library_address = $contact=  $email = $book_return_day_limit = $membership_price = $fine_per_day = $book_issue_limit = $opening_time = $closing_time = $library_status = $important_message = "";
   $library_nameError = $library_addressError = $contactError=  $emailError = $book_return_day_limitError = $membership_priceError = $fine_per_dayError = $book_issue_limitError = $opening_timeError = $closing_timeError = $library_statusError = $important_messageError = "";

   if(isset($_POST['Save'])){
      $library_name = $_POST['library_name'];
      $library_address = $_POST['address'];
      $contact = $_POST['contact'];
      $email = $_POST['email'];
      $book_return_day_limit = $_POST['book_return_day_limit'];
      $membership_price = $_POST['membership_price'];
      $fine_per_day = $_POST['fine_per_day'];
      $book_issue_limit = $_POST['per_user_book_limit_issue'];
      $opening_time = $_POST['opening_time'];
      $closing_time = $_POST['closing_time'];
      // $library_status = $_POST['closed_today'];
      $important_message = $_POST['important_message'];

   
      if($library_name == ""){
         $library_nameError = '<p style = "color:red; font-weight:normal">Please Enter Library name.</p>';
      }
      if($library_address == ""){
         $library_addressError = '<p style = "color:red; font-weight:normal">Please Enter Library Address.</p>';
      }

      if($contact == ""){
         $contactError = '<p style = "color:red; font-weight:normal">Please Enter Contact.</p>';
      }

      if($email == ""){
         $emailError = '<p style = "color:red; font-weight:normal">Please Enter Email.</p>';
      }

      if($book_return_day_limit == ""){
         $book_return_day_limitError = '<p style = "color:red; font-weight:normal">Please Enter Book Return Day.</p>';
      }

      if($membership_price == ""){
         $membership_priceError = '<p style = "color:red; font-weight:normal">Please Enter MemberShip Price.</p>';
      }
        
      if($fine_per_day == ""){
         $fine_per_dayError = '<p style = "color:red; font-weight:normal">Please Enter Fine Per Day.</p>';
      }

      if($book_issue_limit == ""){
         $book_issue_limitError = '<p style = "color:red; font-weight:normal">Please Enter book issue limit.</p>';
      }

      if($opening_time == ""){
         $opening_timeError = '<p style = "color:red; font-weight:normal">Please Enter Opening Time.</p>';
      }

      if($closing_time == ""){
         $closing_timeError = '<p style = "color:red; font-weight:normal">Please Enter Closing Time.</p>';
      }

      if($important_message == ""){
         $important_messageError = '<p style = "color:red; font-weight:normal">Please Enter Important Message.</p>';
      }
  
      if(!$library_nameError && !$library_addressError && !$contactError && !$emailError && !$book_return_day_limitError && !$membership_priceError && !$fine_per_dayError && !$book_issue_limitError && !$opening_timeError && !$closing_timeError && !$library_statusError &&!$important_messageError){
         //$result   = mysqli_query($mysqli,
         // "INSERT INTO `library_setting`( `library_name`, `library_address`, `library_contact`, `library_email`, `book_return_day_limit`,
         //  `membership_price`, `fine_per_day`, `book_issue_limit`, `opening_time`, `closing_time`, `library_status`, `important_message`) 
         //  VALUES ('$library_name','$library_address','$contact','$email','$book_return_day_limit','$membership_price','$fine_per_day',
         //  '$book_issue_limit','$opening_time','$closing_time','$library_status','$important_message')");
           
         //   if($result){
         //    echo '<script>alert("Library settings Inserted Successfully!!")</script>';
         // }else{
         //    echo '<script>alert("Library Settings error. Please try again!!")</script>';
         // } 

         $update_library_settings = mysqli_query($mysqli,
         "UPDATE `library_setting` SET `library_name`='$library_name',`library_address`='$library_address',`library_contact`='$contact',
         `library_email`='$email',`book_return_day_limit`='$book_return_day_limit',`membership_price`='$membership_price',
         `fine_per_day`='$fine_per_day',`book_issue_limit`='$book_issue_limit',`opening_time`='$opening_time',
         `closing_time`='$closing_time',`important_message`='$important_message' WHERE library_id = 1
         ");
         if($update_library_settings){
            echo '
               <script> 
                  alert("Library settings Updated Successfully!!!");
               </script>
            ';
         }else{
            echo '
            <script> 
               alert("Unable to Update library settings!!!");
            </script>
         ';
         }
      }

   }


?>
    
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
                  <div class="col-4"></div>
                  <div class="col-4">
                     <div class="h2">Edit Library Information</div>
                  </div>
                  
               </div>
               <div class="row m-4">
                <div class="col-2"></div>
                <div class="col-10">
               <form class="needs-validation" action="" method="post" id="add_staff_form" name="add_staff_form"  enctype="multipart/form-data" novalidate>
               <?php 
        
            //    $get_category = mysqli_query($mysqli, "SELECT * FROM `category` where `category_id ` = '$id'");        
               //  while($row = mysqli_fetch_array($get_category)){   
                  // }  
                  $query = mysqli_query($mysqli, "SELECT * FROM `library_setting` WHERE library_id = 1");
                  while($row = mysqli_fetch_array($query)){           
            ?>
               <div class="row mb-3">
                    <label for="library_name" class="col-sm-4 col-form-label">Library Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="library_name" name="library_name" value = "<?php echo $row['library_name']; ?>">
                        <div class="error-msg"><?php echo $library_nameError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="address" name="address" rows="3" >
                        <?php echo $row['library_address']; ?> 
                        </textarea>
                        <div class="error-msg"><?php echo $library_addressError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="contact" class="col-sm-4 col-form-label">Contact</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="contact" name="contact"
                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);
                        this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" 
                        maxlength="10" data-rule-maxlength="10" value = "<?php echo $row['library_contact']; ?>">
                        <div class="error-msg"><?php echo $contactError; ?> </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-sm-4 col-form-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" 
                        value = "<?php echo $row['library_email']; ?>">
                        <div class="error-msg"><?php echo $emailError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="book_return_day_limit" class="col-sm-4 col-form-label">Book Return Day Limit </label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="book_return_day_limit" name="book_return_day_limit"
                        value = <?php echo $row['book_return_day_limit']; ?>>
                        <div class="error-msg"><?php echo $book_return_day_limitError; ?> </div>
                    </div>
                </div>
            
                <div class="row mb-3">
                    <label for="membership_price" class="col-sm-4 col-form-label">Membership Price</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="membership_price" name="membership_price"
                        value = <?php echo $row['membership_price']; ?>>
                        <div class="error-msg"><?php echo $membership_priceError; ?> </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="fine_per_day" class="col-sm-4 col-form-label">Fine Per Day</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="fine_per_day" name="fine_per_day" 
                        value = <?php echo $row['fine_per_day']; ?>>
                        <div class="error-msg"> <?php echo $fine_per_dayError; ?> </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="per_user_book_limit_issue" class="col-sm-4 col-form-label">Per User Book Limit Issue</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="per_user_book_limit_issue" name="per_user_book_limit_issue"
                        value = <?php echo $row['book_issue_limit']; ?>>
                        <div class="error-msg"> <?php echo $book_issue_limitError; ?> </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="opening_time" class="col-sm-4 col-form-label">Opening Time</label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" id="opening_time" name="opening_time" 
                        value = <?php echo $row['opening_time']; ?>>
                        <div class="error-msg"><?php echo $opening_timeError; ?> </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="closing_time" class="col-sm-4 col-form-label">Closing Time</label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" id="closing_time" name="closing_time"
                        value = <?php echo $row['closing_time']; ?>>
                        <div class="error-msg"><?php echo $closing_timeError; ?>  </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="closed_today" class="col-sm-4 col-form-label">Today Library is Closed</label>
                    <div class="col-sm-8">
                        <input class="form-check-input" class = "form-control" type="checkbox" value="" id="closed_today" name = "closed_today">
                     </div>
                </div>

                <div class="row mb-3">
                    <label for="important_message" class="col-sm-4 col-form-label">Important Message</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="important_message" name="important_message" rows="3">
                           <?php echo $row['important_message']; ?>
                        </textarea>
                        <div class="error-msg"><?php echo $important_messageError; ?> </div>
                    </div>
                </div>

                <div class="mb-3 row d-flex ms-5">
                <div class="row">
                     <div class="col-4"></div>
                     <div class="col-4">     
                            <input type="submit" class="btn btn-primary px-3 py-2 rounded-4  bg-success justify-content-center" name="Save" value="Save">
                          
                              <!-- <a class="text-success" href='user_login.php?role=user'> -->
                                 <input type="reset" class="btn btn-primary px-4 py-2 rounded-4  bg-success" name="back" value="Back">
                              <!-- </a> -->
                              </div>
                        <div class="col-4"></div>
                        </div> 
                        </div>
                        <?php  } ?>
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