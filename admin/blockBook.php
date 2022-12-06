<?php
    include "../dbConfig.php";      

  //to block book
  $book_id = $_GET['book_id'];
  $book_status = $_GET['book_status'];

  $block_book = "UPDATE `book_detail` SET `book_status`='$book_status' WHERE book_id = '$book_id'";
  if(mysqli_query($mysqli,$block_book)){
      header('location:admin_view_all_book.php');
  }

?>v