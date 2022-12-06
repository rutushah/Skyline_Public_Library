<?php 
session_start();
include_once("../dbConfig.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Books</title>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <style>
         <?php
            include "../css/user.css";  
            include "../css/bootstrap.css";
            ?>
      </style>
</head>
<?php
$category_id = $_GET['category'];
$cat_name = "SELECT category_name FROM category WHERE category_id = $category_id";
$get_category_name = mysqli_query($mysqli,$cat_name);
$result = mysqli_fetch_row($get_category_name); 
$category_name = $result[0];

$book_detail = "SELECT * FROM book_detail GROUP BY ISBN_number HAVING category_id = $category_id";
$get_books = mysqli_query($mysqli,$book_detail);

?>
<body>
<?php include 'user_header.php';?>
<div class="container-fluid navbar m-4">
	<div class="display-5 ms-5"><b><?php echo $category_name; ?></b></div>
	<form class="d-flex pt-3 pb-2 me-5">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
<div class="mt-5"></div>
<div class="container-fluid mt-3">
	
	<div class="container-fluid row mt-4 ">
		<?php
		while ($books = mysqli_fetch_array(
		$get_books,MYSQLI_ASSOC)):;  
		?>
		<div class=" col-sm-12 col-md-4 col-lg-4 ">
			<a class="nav-link mt-2 text-center" href="book_details.php?book=<?php echo $books['book_id'];?>">
			<img class="rounded bookimg" src="../images/<?php echo $books['book_image'];?>" alt="<?php echo $books['book_image'];?>">
			</a>
			<a class="nav-link mt-2 text-center" href="book_details.php?book=<?php echo $books['book_id'];?>"><h5><?php echo $books['book_name'];?></h5></a>
			<h5 class="text-center"><?php echo $books['author_name'];?></h5>
		</div>
		<?php
			endwhile;
		?>    
	</div>
</div>
<?php include 'footer.php';?>
</body>
</html>