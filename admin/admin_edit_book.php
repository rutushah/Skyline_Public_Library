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
    $sql = "SELECT * FROM category where category_status = 0";
    $all_categories = mysqli_query($mysqli,$sql);

    $bookName = $isbnNo = $authorName = $price = $shortDescription = $category = $quantity = $edition = $publish_year = $eBook = $rackInformation = $bookImage = "";
    $bookNameError = $isbnNoError = $authorNameError = $priceError = $shortDescriptionError = $categoryError = $quantityError = $editionError = $publishYearError = $eBookError = $rackInformationError = $bookImageError = "";
   
    if (isset($_POST['Save'])) {
        $bookName = $_POST['bookName'];
        $isbnNo = $_POST['isbnNo'];
        $authorName = $_POST['authorName'];
        $price = $_POST['price'];
        $shortDescription = $_POST['shortDescription'];
        $category = $_POST['category'];
        $quantity = $_POST['quantity'];
        $edition = $_POST['edition'];
        $publish_year = $_POST['publish_year'];
        $temp = explode(".", $_FILES["eBook"]["name"]);
        $extension = end($temp);
        $upload_pdf=$_FILES["eBook"]["name"];
        move_uploaded_file($_FILES["eBook"]["tmp_name"],"../uploads/" . $_FILES["eBook"]["name"]);
        $rackInformation = $_POST['rack_information'];
        $bookImage = $_FILES['bookImage']['name'];
        $file_ext = explode('.', $bookImage);
        $file_ext_check = strtolower(end($file_ext));
        $valid_file_ext = array('png','jpg','jpeg');
        move_uploaded_file($_FILES['bookImage']['tmp_name'],"../images/$bookImage"); 

        if($bookName == ""){
            $bookNameError = '<p style = "color:red">Please Enter Book Name</p>';
        }

        if($isbnNo == ""){
            $isbnNoError = '<p style = "color:red">Please Enter ISBN No</p>';
        }

        if($authorName = ""){
            $authorNameError = '<p style = "color:red">Please Enter Author Name</p>';
        }

        if($price == ""){
            $priceError = '<p style = "color:red">Please Enter Price</p>';
        }

        if($shortDescription == ""){
            $shortDescriptionError = '<p style = "color:red">Please Enter Short Description</p>';
        }

        if(!$bookNameError && !$isbnNoError && !$authorNameError)
        {
            for($i = 0; $i < $quantity; $i++)
            {
                $result   = mysqli_query($mysqli,
                "INSERT INTO `book_detail`(`ISBN_number`, `book_name`, `author_name`, `book_price`, `short_description`, `category_id`, 
                `book_stock_status`, `book_edition`, `publish_year`, `rack_no`, `book_status`, `e_book`, `book_image`) VALUES
                ('$isbnNo','$bookName','$authorName','$price','$shortDescription','$category','0','$edition','$publish_year',
                '$rackInformation','0', '$upload_pdf', '$bookImage')");
            }
            if($result){
                echo '<script>alert("Book Inserted Successfully!!")</script>';
            }else{
                echo '<script>alert("Registration error. Please try again!!")</script>';
            } 
        }
    }
    
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
                     <div class="h2">Add Book Details</div>
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
                        <div class="error-msg"><?php echo $bookNameError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="isbnNo" class="col-sm-2 col-form-label">ISBN No</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="isbnNo" name="isbnNo">
                        <div class="error-msg"><?php echo $isbnNoError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="authorName" class="col-sm-2 col-form-label">Author Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="authorName" name="authorName">
                        <div class="error-msg"><?php echo $authorNameError; ?></div>
                    </div>
                </div>
              
                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" name="price">
                        <div class="error-msg"><?php echo $priceError; ?></div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="shortDescription" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="shortDescription" name="shortDescription" rows="3"></textarea>
                        <div class="error-msg"><?php echo $shortDescriptionError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-8">
                    <select class="form-select" name="category" id="category" aria-label="Default select example">
                        <option value = "0" class="active">Select the Category</option>
                        <?php
                            while ($category = mysqli_fetch_array(
                                    $all_categories,MYSQLI_ASSOC)):;
                        ?>
                            <option value="<?php echo $category["category_id"];?>"><?php echo $category["category_name"];?>
                    </option>
                        <?php
                            endwhile;
                        ?>    
            </select>
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
                        <input type="date" autocomplete="off" size="9" class="form-control" id="publish_year" name="publish_year">
                        <div class="error-msg"></div>
                    </div>
                </div>

                
                <div class="row mb-3">
                    <label for="eBook" class="col-sm-2 col-form-label">E-Book</label>
                    <div class="col-sm-8">
                        <input class="form-control fw-lighter" type="file" id="eBook" name="eBook" value = "" accept="application/pdf">
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
                            <input type="submit" class="btn btn-primary px-3 py-2 rounded-4  bg-success justify-content-center" name="Save" value="Save"></div>
                           <div class="col-6 ">
                              <!-- <a class="text-success" href='user_login.php?role=user'> -->
                                 <input type="reset" class="btn btn-primary px-4 py-2 rounded-4  bg-success" name="back" value="Back">
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