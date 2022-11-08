<?php
    include "../dbConfig.php";      

//to block user
$user_id = $_GET['user_id'];
$user_status = $_GET['user_status'];

$block_user = "UPDATE `users` SET `user_status`='$user_status' WHERE user_id = '$user_id'";
if(mysqli_query($mysqli,$block_user)){
    header('location:staff_view_all_users.php');
}

?>