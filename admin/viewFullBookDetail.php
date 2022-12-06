<!-- Include php files -->
<?php 
    ob_start();
        // session_start();
        include_once("../dbConfig.php");
        $id = $_GET['profile_id'];
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Full Book Details</title>
</head>
<body>
<div class="header_sidebar">
      </div>
      <div class="row">
         <div class="col-2">
            <?php include 'admin_header_sidebar.php';?>
         </div>
         <div class="col-12 justify-content-center">
         <div class=" main_content">
            <div class="dashboard">
               <h1><b>Skyline Public Library<b></h1>
            </div>
            <div class="row">
                <div class="col-4"></div>
                <div class="col-4"><div class="h2">View Book Details</div></div>
                
            </div>
        <?php
            $full_user_request_details = mysqli_query($mysqli,"SELECT * FROM `book_detail` WHERE book_id = $id");
            while($row = mysqli_fetch_array($full_user_request_details)){
                // echo $row['first_name'];
                // $_SESSION['email'] = $row['email_id'];
                $cat_id = $row['category_id'];
                $category = "SELECT category_name FROM `category` WHERE category_id = $cat_id";
                $category_result = mysqli_query($mysqli, $category) or die( mysqli_error($mysqli));
                $category_row = mysqli_fetch_row($category_result);
                $selected_category = $category_row[0];
          
        ?>
<div class="row m-4">
    <div class="col-2"></div>
     <div class="col-10">
        <form action="" class="" method="post">
            <div class="mb-3 row">
                <label for="book_name" class="col-sm-2 col-form-label">Book Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="book_name" name="book_name" value="<?php echo $row['book_name']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="isbn_no" class="col-sm-2 col-form-label">ISBN No</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="isbn_no" name = "isbn_no" value="<?php echo $row['ISBN_number']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="author_name" class="col-sm-2 col-form-label">Author Name</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="author_name" name = "author_name" value="<?php echo $row['author_name']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="price" name = "price" value="<?php echo $row['book_price']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="short_description" name = "short_description" value="<?php echo $row['short_description']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="category" name = "category" value="<?php echo $selected_category; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="short_description" class="col-sm-2 col-form-label">Short Description</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="short_description" name = "short_description" value="<?php echo $row['short_description']; ?>">
                </div>
            </div>
           
            <div class="mb-3 row">
                <label for="book_edition" class="col-sm-2 col-form-label">Edition</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="book_edition" name = "book_edition" value="<?php echo $row['book_edition']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="publish_year" class="col-sm-2 col-form-label">Publish Year</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="publish_year" name = "publish_year" value="<?php echo $row['publish_year']; ?>">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="e_book" class="col-sm-2 col-form-label">E-Book</label>
                <div class="col-sm-10">
                    <div>
                        <?php
                        echo $row['e_book'];
                        ?>
                    </div>
                   
                </div>
            </div>
            <div class="mb-3 row">
                <label for="rack_no" class="col-sm-2 col-form-label">Rack Information</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="rack_no" name = "rack_no" value="<?php echo $row['rack_no']; ?>">
                </div>
            </div>
           
            <div class="mb-3 row">
                <label for="short_description" class="col-sm-2 col-form-label">Book Image</label>
                <div class="col-sm-10">
                    <img style='height:100px; width: 100px;' src="../images/<?php echo $row['book_image']; ?>">
                </div>
            </div>

            <div class="row-g-3">
                <div class="col-auto user_buttons">
                    <button class="btn btn-success" id = "back" name ="back" >Back</button>
                </div>
            </div>
        </form>
            </div>
    </div>  <!-- End of main-content div -->
  
    <?php
      }
    ?>

    <?php
        //user redirect back
        if (isset($_POST['back'])) {
        
            echo '
                <script> 
                    window.location.href = "admin_view_all_book.php";
                </script>
            ';

        }
        
    ?>
</div>
    </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php
            include "../js/admin.js";
        ?>
    </script>
</body>
</html>