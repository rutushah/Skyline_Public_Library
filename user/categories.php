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
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container-fluid">
    <a class="navbar-brand ms-5 fw-bold " href="#">Skyline</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse fw-bolder" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-5">
        <li class="nav-item">
          <a class="nav-link active me-4" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item dropdown me-4">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu   " aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item " href="#">Fiction</a></li>
            <li><a class="dropdown-item" href="#">Science</a></li>
            <li><a class="dropdown-item" href="#">History</a></li>
            <li><a class="dropdown-item" href="#">Drama</a></li>
            <li><a class="dropdown-item" href="#">Humor</a></li>
            <li><a class="dropdown-item" href="#">Romance</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Articles</a>
        </li>
       
      </ul>
      <ul class="navbar-nav me-5  mb-2 mb-lg-0">
       <li class="nav-item me-auto dropdown">
         <a class="nav-link dropdown-toggle active d-flex" href="javascript:void(0)" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class=" nav-link active h4 fa fa-user-circle-o" ></i><span class="pt-1">MY Account </span></a>
         <ul class="dropdown-menu " aria-labelledby="navbarDropdown1">
            <li><a class="dropdown-item " href="#">My Books</a></li>
            <li><a class="dropdown-item" href="#">Fines</a></li>
            <li><a class="dropdown-item" href="#">Edit Profile</a></li>
            <li><a class="dropdown-item" href="#">Sign Out</a></li>
          </ul>
        </li>
    </ul>
    </div>
  </div>
</nav>
<div class="container-fluid mt-3">
	<img class=" imgscale maxwidth" src="../images/categories_home.png">
	<div class="container-fluid row mt-4 ">
		<div class=" col-sm-12 col-md-4 col-lg-4 ">
			<a class="nav-link mt-2 text-center" href="#">
			<img class="img-fluid rounded" src="../images/fiction.png" alt="Fiction">
			</a>
			<a class="nav-link mt-2 text-center" href="#"><h5>Fiction</h5></a>
		</div>
		<div class=" col-sm-12 col-md-4 col-lg-4">
			<a class="nav-link mt-2 text-center" href="#">
			<img class="img-fluid rounded" src="../images/fiction.png" alt="Fiction">
			</a>
			<a class="nav-link mt-2 text-center" href="#"><h5>Science</h5></a>
		</div>
		<div class=" col-sm-12 col-md-4 col-lg-4">
			<a class="nav-link mt-2 text-center" href="#">
			<img class="img-fluid rounded" src="../images/fiction.png" alt="Fiction">
			<a class="nav-link mt-2  text-center " href="#"><h5>History</h5></a>
		</div>
	</div>
	<div class="container-fluid row mt-4 ">
		<div class=" col-sm-12 col-md-4 col-lg-4 ">
			<a class="nav-link mt-2 text-center" href="#">
			<img class="img-fluid rounded" src="../images/fiction.png" alt="Fiction">
			</a>
			<a class="nav-link mt-2 text-center" href="#"><h5>Drama</h5></a>
		</div>
		<div class=" col-sm-12 col-md-4 col-lg-4">
			<a class="nav-link mt-2 text-center" href="#">
			<img class="img-fluid rounded" src="../images/fiction.png" alt="Fiction">
			</a>
			<a class="nav-link mt-2 text-center" href="#"><h5>Humor</h5></a>
		</div>
		<div class=" col-sm-12 col-md-4 col-lg-4">
			<a class="nav-link mt-2 text-center" href="#">
			<img class="img-fluid rounded" src="../images/fiction.png" alt="Fiction">
			<a class="nav-link mt-2  text-center " href="#"><h5>Romance</h5></a>
		</div>
	</div>
</div>
 <div class="copyright fw-light p-2 mt-5"><i class="fa fa-copyright">&nbsp; copyright 2022</i></div>
</body>
</html>