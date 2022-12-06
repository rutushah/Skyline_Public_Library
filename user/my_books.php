<?php
     session_start();
     include_once("../dbConfig.php");
     $user_email = $_SESSION['email_id'];
     
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Books</title>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script> -->
      <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
      <style>
         <?php
            include "../js/main.js";
            include "../css/user.css";  
            include "../css/bootstrap.css";
            include "../js/bootstrap.js";
            include "../js/user.js";
            ?>
      </style>
      
</head>
<body>
<?php include 'user_header.php';?>
<div class="row">
            <div class="col-2"></div>
                <div class="col-4">
                    <div class="h2">List of all Books</div>
                </div>
                <div class="col-6">
                    <div class="row">
                        
                        <div class="col-5">
                            <input type="text" id="myInput" class="form-control searching" name = "" placeholder = "Search"  />
                        </div>
                        <div class="col-2"> 
                             <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                </div>
        </div>

        <div class="card-body allBooksList">
            <div class="table-responsive text-info m-1 p-1">
                <table class="table table-bordered table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Sr no</th>
                            <th scope="col">Book Name</th>
                            <th scope="col">ISBN No</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edition</th>
                            <th scope="col">Publish Year</th>
                            <th scope="col">Issue Date</th>
                            <th scope="col">Return Date</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sr_no = 0;
                        
                        $get_all_books = mysqli_query($mysqli, "SELECT * FROM book_detail INNER JOIN book_issue ON book_issue.book_id = book_detail.book_id AND book_issue.user_id = (SELECT user_id from users WHERE email_id = '$user_email')");
                        
                        // $get_all_books = mysqli_query($mysqli, "SELECT * FROM `book_detail` WHERE book_stock_status = '0' AND book_status = '0'");
                        while($row = mysqli_fetch_array($get_all_books)){
                            $cat_id = $row['category_id'];
                            $category = "SELECT category_name FROM `category` WHERE category_id = $cat_id";
                            $category_result = mysqli_query($mysqli, $category) or die( mysqli_error($mysqli));
                            $category_row = mysqli_fetch_row($category_result);
                            $selected_category = $category_row[0];
                            // print_r($row);
                            $sr_no++;
                    ?>
                    <tr>
                        <td> <?php echo $sr_no; ?> </td>
                       

                        <td><?php echo $row['book_name']; ?></td>
                        <td><?php echo $row['ISBN_number']; ?></td>
                        <td><?php echo $row['author_name']; ?></td>
                        <td><?php echo $selected_category; ?></td>
                        <td><?php echo $row['book_edition']; ?></td>
                        <td><?php echo $row['publish_year']; ?></td>
                        <td><?php echo $row['book_issue_date']; ?></td>
                        <td><?php echo $row['book_return_date']; ?></td>



                        
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <script>
                        myInput.addEventListener("keyup",function(){
                        var keyword = this.value;
                        keyword = keyword.toUpperCase();
                        var myTable = document.getElementById("myTable");
                        var all_tr = myTable.getElementsByTagName("tr");
                        for(var i=0; i<all_tr.length; i++){
                                var all_columns = all_tr[i].getElementsByTagName("td");
                                for(j=0;j<all_columns.length; j++){
                                    if(all_columns[j]){
                                        var column_value = all_columns[j].textContent || all_columns[j].innerText;
                                        column_value = column_value.toUpperCase();
                                        if(column_value.indexOf(keyword) > -1){
                                            all_tr[i].style.display = ""; // show
                                            break;
                                        }else{
                                            all_tr[i].style.display = "none"; // hide
                                        }
                                    }
                                }
                            }
                        }) 
                     </script>
            </div>
        </div>

<?php include 'footer.php';?>
</body>
</html>