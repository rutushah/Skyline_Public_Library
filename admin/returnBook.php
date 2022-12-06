<?php    
    include "../dbConfig.php";      
    //for block unblock category                      
    $book_issue_id = $_GET['book_issue_id'];
    
    $return_book = "SELECT `book_return_date`, `user_id`, `book_id` FROM `book_issue` WHERE book_issue_id = $book_issue_id";
    $return_book_date = mysqli_query($mysqli, $return_book) or die( mysqli_error($mysqli));
    $return_book_result = mysqli_fetch_row($return_book_date);
    $return_issued_book = $return_book_result[0];
    $user_id = $return_book_result[1];
    $book_id = $return_book_result[2];

    $query = "UPDATE `book_issue` SET `book_return_status`='0' WHERE book_issue_id = '$book_issue_id'";
    if(mysqli_query($mysqli, $query)){
        $date_now = date("Y-m-d"); // this format is string comparable

        $book_stock = "UPDATE `book_detail` SET `book_stock_status` = 0 WHERE book_id = '$book_id'";
        $book_stock_query = mysqli_query($mysqli, $book_stock) or die( mysqli_error($mysqli));

        if ($date_now > $return_issued_book) {
            $start_date = strtotime($return_issued_book);
            $end_date = strtotime($date_now);

            $date_diff = ($end_date - $start_date)/60/60/24;
            $fine_amount = 2 * $date_diff;
            $fine = "UPDATE users SET fine = $fine_amount where user_id = $user_id";
            $add_fine = mysqli_query($mysqli, $fine) or die( mysqli_error($mysqli));
        }
        echo '
                <script>
                    alert("Book Return Successfully")
                    window.location.href = "admin_return_book.php"

                </script> 
            ';
    }




  
?>