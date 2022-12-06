<?php
               //session_start();
               if(isset($_SESSION["role"])){
                  
                  $role = $_POST['role'];
                  //$_SESSION['role'] = $_POST['role'];
                  //header("Location: login.php?role=$role");
                  
               }
            ?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Success</title>
      <style>
         <?php
            include "../js/main.js";
            include "../css/user.css";  
            include "../css/bootstrap.css";
            include "../js/bootstrap.js";
            ?>
      </style>
   </head>
   <body>
      <div class="container">
         <div class="row ">
            <div class="col-sm-2"></div>
            <div class="col-sm-8 border border-1 d-flex justify-content-center mt-5">
               <div class="content">
                  <div class="from-wrapper  mb-5">
                     <div class=" display-5 h5 justify-content-center fw-bolder logo1 mb-2">
                        <img src="../images/logo.png" class="img-fluid logomodify mt-5 ">
                     </div>
                     <div class="fontincrease p-2 mb-5 ">Thank you!! Your Payment is done.</div>
                     <div class="col-12 justify-content-center p-2 d-flex flex-row-reverse mb-5">
                        <button type="submit" id="login" name="login" class="btn btn-primary px-3 py-2 rounded-4  bg-success" 
                        onclick = "window.location.href = 'user_login.php?role=user'">Sign in</button>
                     </div>
                  </div>
               </div>
</div>
            </div>
      </div> 

   </body>
</html>