<?php
include_once("../dbConfig.php");
?>
<!doctype html>
<html>
    <head>
        <title>Return Book</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>
    <?php
    if(isset($_POST['return_book']))
    {

    }

    ?>

<body>
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
                <div class="col-4"><div class="h2">Issued Book</div></div>
                <div class="col-4">
                <div class="row">
                        <div class="col"></div>
                        <div class="col-8"><input type="text" id="myInput" class="form-control searching" name = "" placeholder = "Search"  /></div>
                        <div class="col-2">  <button type="button" class="btn btn-primary">
                     <i class="fa fa-search"></i>
                     </button>
                    </div>
                    </div>
            </div>
            </div>
            <div class="row" class="overflow-auto">
    <div class="card-body userRequestList">
            <div class="text-info m-1 p-1">
            <table class="table table-bordered table-striped table-hover" id = "myTable">
            <thead>
                <tr>
                    <th scope="col">Sr no</th>
                    <th scope="col">Book Name</th>
                    <th scope="col">Issued By</th>
                    <th scope="col">Issue Date</th>
                    <th scope="col">Return Date</th>
                </tr>
            </thead>
            <tbody>
             <?php
                $account_status = 0;
                $sr_no = 0;
                $get_books = mysqli_query($mysqli, "SELECT * FROM `book_issue` WHERE book_return_status = '1'");
                while($row = mysqli_fetch_array($get_books)){
                    $book_id = $row['book_id'];
                    $book = "SELECT book_name FROM `book_detail` WHERE book_id = $book_id";
                    $book_result = mysqli_query($mysqli, $book) or die( mysqli_error($mysqli));
                    $book_row = mysqli_fetch_row($book_result);
                    $selected_book = $book_row[0];

                    $user_id = $row['user_id'];
                    $user = "SELECT first_name, last_name FROM `users` WHERE user_id = $user_id";
                    $user_result = mysqli_query($mysqli, $user) or die( mysqli_error($mysqli));
                    $user_row = mysqli_fetch_row($user_result);
                    $issued_by_user = $user_row[0] . " " . $user_row[1];
                    $sr_no++;
             ?>
             <tr>
                <td><?php echo $sr_no; ?></td>
                <td><?php echo $selected_book; ?></td>
                <td><?php echo $issued_by_user; ?></td>
                <td><?php echo $row['book_issue_date']; ?></td>
                <td><?php echo $row['book_return_date']; ?></td>
                <td>
                <a href="returnBook.php?book_issue_id=<?php echo $row['book_issue_id'] ?>"><button class="btn btn-success" id="book_retur">Return Book</button></a>    
                </td>
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
            </div>
         </div>
         </div>
      </div>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        <?php
            include "../js/admin.js";
        ?>
    </script>
</body>

</html>