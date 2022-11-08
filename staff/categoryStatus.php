<?php    
    include "../dbConfig.php";      
    //for block unblock category                      
    $id = $_GET['id'];
    $status = $_GET['category_status'];
    // echo $id;
    // echo $status;
    // die(); 
    $q = "UPDATE `category` SET `category_status`='$status' WHERE category_id = '$id'";
    if(mysqli_query($mysqli, $q)){
        header('location:staff_view_all_categories.php');
    }




  
?>