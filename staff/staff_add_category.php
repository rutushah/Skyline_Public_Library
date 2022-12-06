<?php
            include_once("../dbConfig.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
<body>

<?php
    $category_name = $upload_pdf  = "";
    $category_status = 0;
    $categoryNameError = $categoryImageError = "";
    if (isset($_POST['Save'])) {
        $category_name = $_POST['category_name'];

        $temp = explode(".", $_FILES["category_Image"]["name"]);
        $extension = end($temp);
        $upload_pdf=$_FILES["category_Image"]["name"];
        move_uploaded_file($_FILES["category_Image"]["tmp_name"],"../uploads/" . $_FILES["category_Image"]["name"]);

        if($category_name == ""){
            $categoryNameError = '<p style = "color:red">Please Enter Category Name</p>';
        }

        if($upload_pdf == ""){
            $categoryImageError = '<p style = "color:red; font-weight:normal">Please Upload valid Category Image.</p>';
        }

        if(!$categoryNameError && !$categoryImageError){
            $result   = mysqli_query($mysqli,
            "INSERT INTO `category`(`category_name`,`category_status`, `category_image`) VALUES ('$category_name', '$category_status', '$upload_pdf')");
            if ($result) {
                echo '
                    <script>
                        alert("Category Added Successfully")
                    </script>
                ';
            }else{
                echo '
                    <script>
                        alert("Failed to add Category!!!)
                    </script>
                ';
            }
        }
    }
?>

<div class="header_sidebar">
      </div>
      <div class="row">
         <div class="col-2">
            <?php include 'staff_header_sidebar.php';?>
         </div>
         <div class="col-12 justify-content-center">
            <div class=" main_content">
               <div class="dashboard">
                  <h1><b>Skyline Public Library<b></h1>
               </div>
               <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                     <div class="h2">Add a Category</div>
                  </div>
               </div>

        <form action="" method="post" class = "addCategory" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-2"> <label for="category_name" class=" "><b>Category Name</b></label></div>
            <div class="col-10 ">
                <input type="text"  class="form-control w-27" id="category_name" name="category_name" placeholder = "Enter Category Name">
                <div class="err-Msg"> <?php echo $categoryNameError; ?></div>
            </div>
        </div>
        <div class=" row mb-3">
            <div class="col-2"> <label for="category_image" class=" "><b>Category Image</b></label></div>
            <div class="col-10">
                <input class="form-control fw-lighter" type="file" id="categoryImage" name="category_Image">
                <div class="err-Msg"> <?php echo $categoryImageError; ?></div>
            </div>
        </div>
            <div class="row mt-3">
                <div class="col-auto user_buttons">
                    <button class="btn btn-success" id="save" name = "Save">Save</button>
                    <button  type = "reset" class="btn btn-success" id = "cancel" name = "Cancel" 
                    onclick = "window.location.href = 'staff_view_all_categories.php';">Cancel</button>
                </div>
            </div>
        </form>
</div>
</div>
</div>



<script>
        <?php
            include "../js/admin.js";
        ?>
    </script>
</body>
</html>