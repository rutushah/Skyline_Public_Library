<?php 
    ob_start();
    //session_start();
    include_once("../dbConfig.php");
    // $user_full_name = "";
    // if(isset($_SESSION["email_id"])){
    
    //  }
    //die();
?>

<!doctype html>
    <style>
         <?php
            include "../css/user.css";  
            include "../css/bootstrap.css";
            ?>
      </style>

<?php
     $sql = "SELECT * FROM category WHERE category_status = 0";
     $all_categories = mysqli_query($mysqli,$sql);
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand ms-5 fw-bold " href="../index.php">Skyline</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse fw-bolder" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item">
          <a class="nav-link active me-4" aria-current="page" href="user_dashboard.php">Home</a>
        </li>
        <li class="nav-item me-auto dropdown">
        <a class="nav-link dropdown-toggle active" href="javascript:void(0)" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <span class="pt-1">Category </span></a>
            <ul class="dropdown-menu " aria-labelledby="navbarDropdown1">
            
        
                        <?php
                          while ($row = mysqli_fetch_array(
                            $all_categories,MYSQLI_ASSOC)):;  
                        ?>
                        <li><a class="dropdown-item " href="books.php?category=<?php echo $row['category_id']; ?>"><?php echo $row["category_name"];?></a></li>
                       
                        <?php
                            endwhile;
                        ?>    
           
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="articles.php">Articles</a>
        </li>
       
      </ul>
      <?php
        $user_email = $_SESSION['email_id'];
        $user_email_query = "SELECT * FROM `users` where email_id = '$user_email'";
        $user_email_query_result = mysqli_query($mysqli, $user_email_query) or die( mysqli_error($mysqli));
        $user_Row = mysqli_fetch_row($user_email_query_result);
        $user_full_id =  $user_Row[0];
        // echo $user_full_id;
        $user_full_name = $user_Row[1]. " " . $user_Row[2]; 
        //echo $user_email;
      ?>
      <ul class="navbar-nav me-5  mb-2 mb-lg-0">
        <span class="nav-link active"><u>Welcome,<?php echo $user_full_name;?></u></span>
    </ul>
      <ul class="navbar-nav me-5 mb-2 mb-lg-0">
       <li class="nav-item me-auto dropdown">
         <a class="nav-link active d-flex" href="javascript:void(0)" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class=" nav-link active fa fa-user-circle-o" ></i><span class="pt-1">MY Account </span></a>
         <ul class="dropdown-menu " aria-labelledby="navbarDropdown1">
            <li><a class="dropdown-item " href="my_books.php">My Books</a></li>
            <li><a class="dropdown-item" href="fine.php">Fines</a></li>
            <li><a class="dropdown-item" href="edit_profile.php">Edit Profile</a></li>
            <li><a class="dropdown-item" href="../logout.php">Sign Out</a></li>
          </ul>
        </li>
    </ul>
    </div>
  </div>
</nav>