<?php
include_once("../dbConfig.php");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Add a book</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    
<?php
    
?>

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
                    <label for="bookName" class="col-sm-2 col-form-label">Book Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="bookName" name="bookName">
                        <div class="error-msg"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="isbnNo" class="col-sm-2 col-form-label">ISBN No</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="isbnNo" name="isbnNo">
                        <div class="error-msg"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="authorName" class="col-sm-2 col-form-label">Author Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="authorName" name="authorName">
                        <div class="error-msg"></div>
                    </div>
                </div>
              
                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" name="price">
                        <div class="error-msg"></div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="shortDescription" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="shortDescription" name="shortDescription" rows="3"></textarea>
                        <div class="error-msg"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="category" name="category">
                        <div class="error-msg"></div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="quantity" name="quantity">
                        <div class="error-msg"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="edition" class="col-sm-2 col-form-label">Edition</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="edition" name="edition">
                        <div class="error-msg"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="publish_year" class="col-sm-2 col-form-label">Publish Year</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="publish_year" name="publish_year">
                        <div class="error-msg"></div>
                    </div>
                </div>

                
                <div class="row mb-3">
                    <label for="eBook" class="col-sm-2 col-form-label">E-Book</label>
                    <div class="col-sm-8">
                        <input class="form-control fw-lighter" type="file" id="eBook" name="eBook" value = "">
                        <div class="error-msg"></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="rack_information" class="col-sm-2 col-form-label">Rack Information</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="rack_information" name="rack_information">
                        <div class="error-msg"></div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="bookImage" class="col-sm-2 col-form-label">Book Image</label>
                    <div class="col-sm-8">
                        <input class="form-control fw-lighter" type="file" id="bookImage" name="bookImage" value = "">
                        <div class="error-msg"></div>
                    </div>
                </div>

                <div class="mb-3 row d-flex ms-5">
                           <div class="col-6  ">
                            <input type="submit" class="btn btn-primary px-3 py-2 rounded-4  bg-success justify-content-center" name="save" value="Save"></div>
                           <div class="col-6 ">
                              <!-- <a class="text-success" href='user_login.php?role=user'> -->
                                 <input type="reset" class="btn btn-primary px-4 py-2 rounded-4  bg-success" name="back" value="Back" 
                                 onclick = "window.location.href = 'admin_view_all_book.php'">
                              <!-- </a> -->
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