<?php
 include "../dbConfig.php";                            
 $id = $_GET['id'];
    // edit_id
    // echo $id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
<body>

<div class="header_sidebar">
        <?php include 'admin_header_sidebar.php';?>
</div>
        

<div class="main_content">
        <div class="dashboard">
            <h1><b>Skyline Public Library<b></h1>
        </div>
        <div class="row">
                  <div class="col-4"></div>
                  <div class="col-4">
                     <div class="h2">Edit Category</div>
                  </div>
                  
               </div>

        <?php
            //edit category
            $categoryNameError = "";
            $category_name = "";
            if (isset($_POST['Save'])) {
                $category_name = $_POST['category_name'];
                if($category_name == ""){
                    $categoryNameError = '<p style = "color:red">Please Enter Category Name</p>';
                }
                 
                if(!$categoryNameError){
                    $edit_category = "UPDATE `category` SET`category_name`='$category_name' WHERE category_id = '$id'";
                    $category_edited_success = mysqli_query($mysqli,$edit_category);
                    if($category_edited_success){
                        echo '
                            <script>
                                alert("Category Edited Successfully!!")
                                window.location.href = "admin_view_all_categories.php"
                            </script> 
                        ';
                    }
                }
            }        
        ?>

        <?php 
        
        //    $get_category = mysqli_query($mysqli, "SELECT * FROM `category` where `category_id ` = '$id'");        
          //  while($row = mysqli_fetch_array($get_category)){   
            // }  
            $query = mysqli_query($mysqli, "SELECT * FROM `category` WHERE category_id = '$id'");
            while($row = mysqli_fetch_array($query)){           
            ?>

        <form action="" method="post" class = "addCategory">
        <div class="mb-3 row">
                <label for="category_name" class="col-sm-2 col-form-label"><b>Category Name</b></label>
                <div class="col-sm-10">
                    <input type="text"  class="form-control w-25" id="category_name" name="category_name" 
                    value ="<?php echo $row['category_name']  ; ?>">
                    <div class="err-Msg"> <?php echo $categoryNameError ?></div>
                </div>
            </div>
            <div class="row-g-3">
                <div class="col-auto user_buttons">
                    <button class="btn btn-success" id="save" name = "Save">Save</button>
                    <button class="btn btn-success" id = "cancel" name = "Cancel">Cancel</button>
                </div>
            </div>
        </form>
</div>
        <?php
            }
            if (!$query) {
                printf("Error: %s\n", mysqli_error($mysqli));
                exit();
            } 

    
            //redirect back to cancel button
            if (isset($_POST['Cancel'])) {
                echo '
                <script> 
                    window.location.href = "admin_view_all_categories.php";
                </script>
            ';
            }
        ?>
<script>
        <?php
            include "../js/admin.js";
        ?>
    </script>
</body>
</html>