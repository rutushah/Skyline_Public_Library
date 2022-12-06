<?php
include_once("../dbConfig.php");
$id = $_GET['id'];

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Edit book</title>
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

    $bookNameError = $isbnNoError = $authorNameError = $priceError = $shortDescriptionError = $categoryError = $quantityError = $editionError = $publishYearError = $eBookError = $rackInformationError = $bookImageError = "";
   
    if (isset($_POST['Save'])) {
        $bookName = $_POST['bookName'];
        $isbnNo = $_POST['isbnNo'];
        $authorName = $_POST['author_name'];
        $price = $_POST['price'];
        $shortDescription = $_POST['shortDescription'];
        $category = $_POST['category'];
        //$quantity = $_POST['quantity'];
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
        //$valid_file_ext = array('png','jpg','jpeg');
        move_uploaded_file($_FILES['bookImage']['tmp_name'],"../images/$bookImage"); 

        if($bookName == ""){
            $bookNameError = '<p style = "color:red; font-weight:normal">Please Enter Book Name.</p>';
        }

        if($isbnNo == ""){
            $isbnNoError = '<p style = "color:red; font-weight:normal">Please Enter ISBN No.</p>';
        }

        if($authorName == ""){
            $authorNameError = '<p style = "color:red; font-weight:normal">Please Enter Author Name.</p>';
        }

        if($price == ""){
            $priceError = '<p style = "color:red; font-weight:normal">Please Enter Price.</p>';
        }

        if($shortDescription == ""){
            $shortDescriptionError = '<p style = "color:red; font-weight:normal">Please Enter Short Description.</p>';
        }

        if(!isset($category)) 
        {
          $categoryError = "<li>You forgot to select Category!</li>";
        }

        if($edition == ""){
            $editionError = '<p style = "color:red; font-weight:normal">Please Enter Edition.</p>';
        }

        if($publish_year == ""){
            $publishYearError = '<p style = "color:red; font-weight:normal">Please Select Publish Year.</p>';;
        }

        if($upload_pdf == ""){
            $eBookError = '<p style = "color:red; font-weight:normal">Please Upload Ebook in PDF format.</p>';
        }

        if($rackInformation == ""){
            $rackInformationError = '<p style = "color:red; font-weight:normal">Please Enter Rack Information.</p>';
        }

        if($bookImage == ""){
            $bookImageError = '<p style = "color:red; font-weight:normal">Please Upload valid Book Image.</p>';
        }

        if(!$bookNameError && !$isbnNoError && !$authorNameError && !$priceError && !$shortDescriptionError && !$categoryError && !$editionError && !$publishYearError && !$rackInformationError && !$bookImageError && !$eBookError)
        {

            $update_book_details = mysqli_query($mysqli,
            "UPDATE `book_detail` SET `ISBN_number`='$isbnNo',`book_name`='$bookName',`author_name`='$authorName',
            `book_price`='$price',`short_description`='$shortDescription',`category_id`='$category',`book_stock_status`=0,
            `book_edition`='$edition',`publish_year`='$publish_year',`rack_no`='$rackInformation',`book_status`=0,
            `e_book`='$upload_pdf',`book_image`='$bookImage' WHERE book_id = '$id'");
            
            if($update_book_details){
                echo '<script>alert("Book Edited Successfully!!")</script>';
            }else{
                echo '<script>alert("Error in edit book. Please try again!!")</script>';
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
         <div class="col-12 justify-content-center">
            <div class=" main_content">
               <div class="dashboard">
                  <h1><b>Skyline Public Library<b></h1>
               </div>
               <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                     <div class="h2">Edit Book Details</div>
                  </div>
                  
               </div>
               <div class="row m-4">
                <div class="col-2"></div>
                <div class="col-10">

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

               <form class="needs-validation" action="" method="post" id="add_staff_form" name="add_staff_form" 
            enctype="multipart/form-data" novalidate>
           
               <div class="row mb-3">
                    <label for="bookName" class="col-sm-2 col-form-label">Book Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="bookName" name="bookName" value = "<?php echo $row['book_name'] ?>">
                        <div class="error-msg"><?php echo $bookNameError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="isbnNo" class="col-sm-2 col-form-label">ISBN No</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="isbnNo" name="isbnNo" value = "<?php echo $row['ISBN_number'] ?>">
                        <div class="error-msg"><?php echo $isbnNoError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="author" class="col-sm-2 col-form-label">Author Name</label>
                    <div class="col-sm-8">
                        <input type="text" name="author_name" id="author_name" class="form-control" value = "<?php echo $row['author_name'] ?>" >
                        <div class="error-msg"><?php echo $authorNameError; ?></div>
                    </div>
                </div>
              
                <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" name="price" value = "<?php echo $row['book_price'] ?>">
                        <div class="error-msg"><?php echo $priceError; ?></div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="shortDescription" class="col-sm-2 col-form-label">Short Description</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="shortDescription" name="shortDescription" rows="3"
                        value = "<?php echo $row['short_description'] ?>"></textarea>
                        <div class="error-msg"><?php echo $shortDescriptionError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-8">
                    <select class="form-select" name="category" id="category" aria-label="Default select example">
                        <option value = "<?php echo $cat_id;?>" class="active"><?php echo $selected_category;?></option> 
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
                        <div id="result">  </div>
                    </div>
                </div>
                
                <div class="row mb-3">
                    <label for="edition" class="col-sm-2 col-form-label">Edition</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="edition" name="edition" value="<?php echo $row["book_edition"];?>">
                        <div class="error-msg"><?php echo $editionError; ?> </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="publish_year" class="col-sm-2 col-form-label">Publish Year</label>
                    <div class="col-sm-8">
                        <input type="date" autocomplete="off" size="9" class="form-control" id="publish_year" 
                        value="<?php echo $row["publish_year"];?>" name="publish_year">
                        <div class="error-msg"><?php echo $publishYearError; ?> </div>
                    </div>
                </div>

                
                <div class="row mb-3">
                    <label for="eBook" class="col-sm-2 col-form-label">E-Book</label>
                    <div class="col-sm-8">
                    <div>
                        <?php
                        echo $row['e_book'];
                        ?>
                    </div>
                        <input class="form-control fw-lighter" type="file" id="eBook" name="eBook" accept="application/pdf" value="<?php echo $row['e_book'];?>">
                        <div class="error-msg"><?php echo $eBookError; ?></div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="rack_information" class="col-sm-2 col-form-label">Rack Information</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="rack_information"
                        value = "<?php echo $row['rack_no'] ?>" name="rack_information">
                        <div class="error-msg"><?php echo $rackInformationError; ?> </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="bookImage" class="col-sm-2 col-form-label">Book Image</label>
                    <div class="col-sm-8">
                    <img style='height:100px; width: 100px;' src="../images/<?php echo $row['book_image']; ?>">

                        <input class="form-control fw-lighter" type="file" id="bookImage" name="bookImage" value = "<?php echo $row['book_image']; ?>">
                        <div class="error-msg"><?php echo $bookImageError ?> </div>
                    </div>
                </div>

                <div class="mb-3 row d-flex ms-5">
                <div class="row">
                     <div class="col-4"></div>
                     <div class="col-4">          
                            <input type="submit" class="btn btn-primary px-3 py-2 rounded-4  bg-success justify-content-center" name="Save" value="Save">
                          
                              <!-- <a class="text-success" href='user_login.php?role=user'> -->
                                 <input type="reset" class="btn btn-primary px-4 py-2 rounded-4  bg-success" name="back" 
                                    onclick = "window.location.href = 'admin_view_all_book.php'"
                                 value="Back">
                              <!-- </a> -->
                              </div>
                        <div class="col-4"></div>
                        </div>
                        </div>
            </form>
            <?php }?>
            </div>
               </div>
               
              


   
</div>
</div>
     <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- <script src="./assets/js/main.js"></script> -->
    <!-- <script> 

        function checkCategoryEmpty(){
            let category = document.getElementById('category').value;
            let result = document.getElementById('result');

            if(category == "0"){
                result.innerHTML = `<p style = "color:red"> Error!!! Please select the Category. </p>`;
                return false;
            }
        }

    </script> -->

 
   
</body>
<script> 
<?php
        include "../js/admin.js";
        ?>
   </script>
</html>