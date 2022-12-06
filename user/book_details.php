<?php
  session_start();
  include_once("../dbConfig.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Book_detail</title>
	<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <style>
         <?php
            include "../js/main.js";
            include "../css/bootstrap.css";
            include "../css/user.css";
            include "../js/bootstrap.js";
            include "../js/user.js";
            ?>
            
      </style>
</head>
<?php
  $book_id = $_GET['book'];
  $book_details = "SELECT * FROM book_detail WHERE book_id = $book_id";
  $get_book_details = mysqli_query($mysqli,$book_details);
  $book_detail_result = mysqli_fetch_row($get_book_details); 
  $book_ISBN = $book_detail_result[1];

  $count_book = "SELECT * FROM book_detail WHERE ISBN_number = $book_ISBN AND book_stock_status = 0";
  $number_of_books = mysqli_query($mysqli,$count_book);
  $available_book = mysqli_num_rows($number_of_books);

?>
<body>
<?php include 'user_header.php';?>
<div class="container-fluid">
	<div class="row mt-5 ms-5">
		<div class="col-sm-3 col-md-3 col-lg-3 mt-3">
			<img class="float-start responsive img-thumbnail " src="../images/<?php echo $book_detail_result[13];?>">
		</div>
<div class="col-md-1"></div>
		<div class="col-sm-6 col-md-8 col-lg-6 ">

				<div class="col-sm-2 mt-3 mb-4"></div>
				<div class="col-sm-2 d-flex h4 mb-3 mt-2"> Name<span class="ms-5  me-5">:</span>
					<p class="nav-link ps-4"><?php echo $book_detail_result[2];?></p>
				</div>
				
				<div class="col-sm-2 h4 d-flex mb-3 mt-2"> 
          <a href="downloadpdf.php" target="_blank"><h1><i class=" nav-link active fa-2x fa fa-file-pdf-o pe-3 link-danger" ></i></h1></a>
          <?php
            $_SESSION['pdf'] = $book_detail_result[12];
          ?>
          <span class="ms-5  me-5">:</span>
					<a class="nav-link ps-5 pdf-link" href="downloadpdf.php" target="_blank">Click to Download Ebook</a>
				</div>
				<div class="col-sm-2 d-flex h4 mb-3 mt-2"> By Author<span class="ms-5  me-5">:</span>
					<p class="nav-link ps-4"><?php echo $book_detail_result[3];?></p>
				</div>
			
		</div>
		
	</div>
	<div class="row mt-5 ms-5">
		<div class="col-sm-12 col-md-4 ps-5 fw-bold fs-5">
			<div class="row">
				<div class="col-6"><p>Publishing Year</p></div>
				<div class="col-4"><?php echo $book_detail_result[9];?></div>
			</div>
			<div class="row">
				<div class="col-6"><p>ISBN No.</p></div>
				<div class="col-4"><?php echo $book_detail_result[1];?></div>
			</div>
			<div class="row">
				<div class="col-6"><p>Edition/Release</p></div>
				<div class="col-4"><?php echo $book_detail_result[8];?></div>
			</div>
			<div class="row">
				<div class="col-6"><p>Location in Library</p></div>
				<div class="col-4">Rack <?php echo $book_detail_result[10];?></div>
			</div>
			<div class="row">
				<div class="col-6"><p>Number of copies available in library</p></div>
				<div class="col-4"><?php echo $available_book; ?></div>
			</div>
		</div>
		<div class="col-sm-12 col-md-8">
			<h3 class="mb-3">Brief Description</h3>
			<p><?php echo $book_detail_result[5]; ?></p>
		</div>
	</div>
</div>
<?php include 'footer.php';?>
 <script>function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");
  
    if (dots.style.display === "none") {
      dots.style.display = "inline";
      btnText.innerHTML = "Read more"; 
      moreText.style.display = "none";
    } else {
      dots.style.display = "none";
      btnText.innerHTML = "Read less"; 
      moreText.style.display = "inline";
    }
  }</script>
</body>
</html>