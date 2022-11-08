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
    
<div class="header_sidebar">
      </div>
      <div class="row">
         <div class="col-2">
            <?php include 'admin_header_sidebar.php';?>
         </div>
         <div class="col-10 justify-content-center">
            <div class=" main_content">
               <div class="dashboard">
                  <h1><b>Skyline Public Library<b></h1>
               </div>
               <div class="row">
                  <div class="col-2"></div>
                  <div class="col-6">
                     <div class="h2">Edit Library Information</div>
                  </div>
                  
               </div>
               <div class="row m-4 table-responsive">
                <div class="col-2"></div>
                <div class="col-10">
               <form class="needs-validation" action="" method="post" id="add_staff_form" name="add_staff_form"  enctype="multipart/form-data" novalidate>
           
                <div class="row mb-3">
                    <label for="photo_id" class="col-sm-2 col-form-label">Address</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        <div class="error-msg"></div>
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