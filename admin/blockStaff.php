<?php
    include "../dbConfig.php";      

  //to block staff
  $staff_id = $_GET['staff_id'];
  $staff_status = $_GET['user_status'];

  $block_staff = "UPDATE `staff` SET `user_status`='$staff_status' WHERE staff_id ='$staff_id'";
  if(mysqli_query($mysqli,$block_staff)){
      header('location:viewAllStaff.php');
  }

?>