<?php
ob_start();
//session_start();
include_once("../dbConfig.php");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Book Issue</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
      <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
   </head>
   <?php
  
    $user = $book = "";
    if(isset($_POST['issue_book']))
    {
        $user = $_POST['user_data_value'];
        $book = $_POST['book_data_value'];
    
        $book_issue_date = date("Y-m-d");
        $book_return_date = date('Y-m-d', strtotime($book_issue_date. ' + 15 days'));
        $issue_book = "INSERT INTO book_issue(`user_id`, `book_id`, `book_issue_date`, `book_return_date`, `book_return_status`) VALUES ($user,$book,'$book_issue_date','$book_return_date',1)";
        $issue_book_query = mysqli_query($mysqli, $issue_book) or die( mysqli_error($mysqli));

        $book_stock = "UPDATE `book_detail` SET `book_stock_status` = 1 WHERE book_id = '$book'";
        $book_stock_query = mysqli_query($mysqli, $book_stock) or die( mysqli_error($mysqli));

        // 
        if($issue_book_query){
            echo '
            <script>
                alert("Book Issued Successfully!!")
                window.location.href = "admin_issue_book.php";
        </script> 
            ';
        }else{
            echo '
            <script>
                alert("Unable to issue book!!")
        </script> 
            ';
        }
    }

    $result = "SELECT * FROM `users` WHERE user_status = 0 AND (account_status = 0 AND payment_status = 0)";
    $query_result = mysqli_query($mysqli, $result) or die( mysqli_error($mysqli));

    $book_result = "SELECT * FROM `book_detail` WHERE book_stock_status = 0 AND book_status = 0";
    $book_query_result = mysqli_query($mysqli, $book_result) or die( mysqli_error($mysqli));
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
                     <div class="h2">Issue Book</div>
                  </div>
                  
               </div>
               <div class="row m-4">
               </div>
               
               <div class="ms-5  row">
                <div class="col-2"></div>
                <div class="col-8 justify-content-center card-body ">
                <form autocomplete="off" action="" method="POST">
        <template id="user_template">
            <?php
                while ($user = mysqli_fetch_array($query_result,MYSQLI_ASSOC)):;
                $full_name = $user["first_name"]. " " .$user["last_name"];
            ?>
                <option data-id="<?php echo $user["user_id"];?>" value="<?php echo $full_name. " - " . $user['user_unique_id'];?>"><?php echo $full_name. " - " . $user['user_unique_id'];?>
            <?php
                endwhile;
            ?>
        </template>
        <label for="user_list" class="form-label">User :</label>
        <input type="text" name="user" id="user" class="user ms-1 mb-4" placeholder="User" list="user_list" autocomplete="off" value="<?php if (isset($_POST['user'])) echo $_POST['user']; ?>"/><br>
        <span id="userIssueBookError"> </span>
        <datalist id="user_list"></datalist>
        <template id="book_template">
            <?php
                while ($book = mysqli_fetch_array($book_query_result,MYSQLI_ASSOC)):;
                // $full_name = $user["first_name"]. " " .$user["last_name"];
            ?>
                <option data-id="<?php echo $book["book_id"];?>" value="<?php echo $book['book_name']. " - " . $book['ISBN_number']. "(" . $book['book_id'] . ")";?>"><?php echo $book['book_name']. " - " . $book['ISBN_number']. "(" . $book['book_id'] . ")";?>
            <?php
                endwhile;
            ?>
        </template>
        <label for="book_list" class="form-label">Book :</label>
        <input type="text" name="book" id="book" class="book mb-4" placeholder="Book" list="book_list" autocomplete="off" value="<?php if (isset($_POST['book'])) echo $_POST['book']; ?>"/>
        <span id="issueBookError"> </span>
        <datalist id="book_list"></datalist>
        <input type="hidden" name="book_data_value" id="book_data_value">
        <input type="hidden" name="user_data_value" id="user_data_value"><br>
        <button type="submit" id="issue_book" name="issue_book" class="ms-5 btn btn-primary px-3 py-2 rounded-4  bg-success">Issue Book</button>
    </form>
                </div>
               </div>



              
    <script>
        var user = document.querySelector('#user');
        var user_list = document.querySelector('#user_list');
        var user_template = document.querySelector('#user_template').content;

        user.addEventListener('keyup', function handler(event) {
            while (user_list.children.length) user_list.removeChild(user_list.firstChild);
            
            var inputVal = new RegExp(user.value.trim(), 'i');
            var set = Array.prototype.reduce.call(user_template.cloneNode(true).children, function searchFilter(frag, item, i) 
            {
                if (inputVal.test(item.textContent) && frag.children.length < 6) frag.appendChild(item);
                return frag;
            }, document.createDocumentFragment());
            user_list.appendChild(set);
        });
        
        var book = document.querySelector('#book');
        var book_list = document.querySelector('#book_list');
        var book_template = document.querySelector('#book_template').content;

        book.addEventListener('keyup', function handler(event) {
            while (book_list.children.length) book_list.removeChild(book_list.firstChild);
            
            var inputVal = new RegExp(book.value.trim(), 'i');
            var set = Array.prototype.reduce.call(book_template.cloneNode(true).children, function searchFilter(frag, item, i) 
            {
                if (inputVal.test(item.textContent) && frag.children.length < 6) frag.appendChild(item);
                return frag;
            }, document.createDocumentFragment());
            book_list.appendChild(set);
        });
        
        $(document).ready(function() {
            $('.user').on('change', function() 
            {
                var value = $('#user').val();
                //  alert(value);
                $('#user_data_value').val($('#user_list option[value="' + value + '"]').data('id'));
                console.log('user_id is now: ' + $('#user_data_value').val());
            });

            $('.book').on('change', function() 
            {
                var value = $('#book').val();
                //  alert(value);
                $('#book_data_value').val($('#book_list option[value="' + value + '"]').data('id'));
                console.log('book_id is now: ' + $('#book_data_value').val());
            });
        });
    </script>

      

    <script> 
        <?php 
            include "../js/main.js";
            include "../js/admin.js";
            include "../js/bootstrap.js";
        ?>
    </script>
            </div>
         </div>
      </div>
     
   </body>
</html>