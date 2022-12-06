<?php 
session_start();
  include_once("../dbConfig.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Categories</title>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
         <?php
            include "../js/main.js";
            include "../css/user.css";  
            include "../css/bootstrap.css";
            include "../js/bootstrap.js";
            include "../js/user.js";
            ?>
      </style>
</head>
<?php

      $sql_categories = "SELECT * FROM category WHERE category_status = 0";
      $get_categories = mysqli_query($mysqli,$sql_categories);
?>
<body>
<?php 

include 'user_header.php';?>

<div class="container-fluid mt-3">
	<img class=" imgscale maxwidth" src="../images/categories_home.png">
	<div class="container-fluid row mt-4 ">
    <?php
      while ($categories = mysqli_fetch_array(
      $get_categories,MYSQLI_ASSOC)):;  
    ?>
      <div class=" col-sm-12 col-md-4 col-lg-4 ">
			  <a class="nav-link mt-2 text-center" href="books.php?category=<?php echo $categories['category_id']; ?>">
			    <img class="rounded dashboardimg" src="../images/<?php echo $categories['category_image']; ?>" alt="<?php echo $categories['category_name']; ?>">
			  </a>
			  <a class="nav-link mt-2 text-center" href="#"><h5><?php echo $categories['category_name']; ?></h5></a>
		  </div>
    <?php
        endwhile;
    ?>    
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>