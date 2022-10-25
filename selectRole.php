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
  <title>Select Role</title>
  <link href="css/bootstrap.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/user.css">
</head>

<script>
    <?php
        include "js/user.js";
    ?>
</script>

<body>
  <div class="container">
    <div class="row ">
      <div class="col-sm-12 col-md-6 d-flex justify-content-center mt-5">
        <div class="content">
          <div class="from-wrapper ">
            <div class="mt-5"></div>
            <div class="header display-5 h5 mt-5">
              Skyline Public Library
            </div>
            <div class="display-5 p-2 mb-3 ">Select Role</div>
            <div class="card p-2 m-5 ms-2">
                <form action="" method="post" name="selectRole_form" autocomplete="off"  onsubmit = "return selectRole()">
                    <div class="mb-3 p-3" id="role">
                        <label for="admin" class="form-label fw-light">
                            <input type="radio" class="form-switch" name="role" value="admin" data-id="admin" > Admin
                        </label>
                        <label for="staff" class="form-label fw-light">
                            <input type="radio" class="form-switch" name="role" value="staff" data-id="staff"> Staff
                        </label>
                        <label for="member" class="form-label fw-light">
                            <input type="radio" class="form-switch" name="role" value="user" data-id="user"> User Login
                        </label>
                    </div>
                    <div id = "err_msg"></div>
                        <div class="col-12 justify-content-center p-2 d-flex flex-row-reverse mb-3">
                            <input type="submit" id="loginbutton" name="next" class="btn btn-primary px-3 py-2 rounded-4 bg-success" value = "Next"/> 
                </div>
                </form>
               
            </div> <!--end of card div -->
         
          </div>
        </div>
      </div>


      <div class="col-sm-12 col-md-6 customsidebackground">
        <img src="images/side_image.png" class="img-fluid imagescenter">
      </div>

    </div>
  </div>
</body>

</html>