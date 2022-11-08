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
    <style>
            <?php 
                include "../css/admin.css";
                include "../css/styles.css";
            ?>
        </style>
    </head>
<body>

<?php
    $category_name = "";
    $category_status = 0;
    $categoryNameError = "";
    if (isset($_POST['Save'])) {
        $category_name = $_POST['category_name'];

        if($category_name == ""){
            $categoryNameError = '<p style = "color:red">Please Enter Category Name</p>';
        }

        if(!$categoryNameError){
            $result   = mysqli_query($mysqli,
            "INSERT INTO `category`(`category_name`,`category_status`) VALUES ('$category_name', '$category_status')");
            if ($result) {
                echo '
                    <script>
                        window.location.href = "staff_view_all_categories.php"
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
         <div class="col-10 justify-content-center">
            <div class=" main_content">
               <div class="dashboard">
                  <h1><b>Skyline Public Library<b></h1>
               </div>
               <div class="row">
                  <div class="col-2"></div>
                  <div class="col-6">
                     <div class="h2">Add a Category</div>
                  </div>
               </div>

        <form action="" method="post" class = "addCategory">
        <div class=" row">
            <div class="col-2"> <label for="category_name" class=" "><b>Category Name</b></label></div>
        
                <div class="col-10 ">
                
                    <input type="text"  class="form-control w-27" id="category_name" name="category_name" placeholder = "Enter Category Name">
                    <div class="err-Msg"> <?php echo $categoryNameError; ?></div>
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