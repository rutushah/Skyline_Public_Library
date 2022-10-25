<?php
    session_start();
    if (isset($_POST['next'])) {

        $role = $_POST['role'];
        $_SESSION['role'] = $_POST['role'];
        header("Location: user/user_login.php?role=$role");
        
    }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SelectRole</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/css.css">
     <style>
         <?php
            include "js/main.js";
            include "css/user.css";  
            include "css/bootstrap.css";
            include "js/bootstrap.js";
            ?>
      </style>
      <script>
    <?php
        include "js/user.js";
    ?>
</script>
</head>
<body>
  <div class="container">
    <div class="row ">
      <div class="col-sm-12 col-md-6 d-flex justify-content-center ">
        <div class="content">
          <div class="from-wrapper ">
            <div class="mt-5"></div>
            <div class=" display-5 h5 justify-content-center fw-bolder logo1">
                           <img src="images/logo.png" class="img-fluid logomodify">
                        </div>
            <div class="fs-3 p-3 mb-3 justify-content-center fw-bold">Select role</div>
            <div class="d-flex p fs-5 mb-4 justify-content-center">
              <div class="form-check">
                <form action="" method="post" name="selectRole_form" autocomplete="off"  onsubmit = "return selectRole()">
  <input class="form-check-input" type="radio" name="role" value="admin" data-id="admin">
  <label class="form-check-label" for="admin">
    Admin
  </label>
</div>
<div class="form-check ms-4">
  <input class="form-check-input" type="radio" name="role" value="staff" data-id="staff">
  <label class="form-check-label" for="staff">
    Staff
  </label>
</div>
<div class="form-check ms-4">
  <input class="form-check-input" type="radio" name="role" value="user" data-id="user">
  <label class="form-check-label" for="member">
    User
  </label>
</div>

            </div>
            <div id = "err_msg"></div>
<div class="col-12 justify-content-center p-2 d-flex flex-row-reverse mb-3">
    <button type="submit" id="loginbutton" class="btn btn-primary px-3 py-2 rounded-4  bg-success"  name="next" value = "Next">Sign in</button>
  </div>
</form>
  
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 customsidebackground pb-3 mt-5">
               <img src="images/side_image.png" class="img-fluid imagescenter">
        </div>
    </div>
  </div>
</body>
</html>