<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Books</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="../css/admin.css">
      <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
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
                <div class="col-4"><div class="h2">List of all Books</div></div>
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
            <table class="table table-bordered table-striped table-hover" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">Sr no</th>
                            <th scope="col">Name</th>
                            <th scope="col">ISBN No</th>
                            <th scope="col">Author Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Edition</th>
                            <th scope="col">Publish Year</th>
                            <th scope="col">Rack No</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Full Details</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sr_no = 0;
                        $get_all_books = mysqli_query($mysqli, "SELECT * FROM `book_detail` WHERE book_stock_status = '0'");
                        // $get_all_books = mysqli_query($mysqli, "SELECT * FROM `book_detail` WHERE book_stock_status = '0' AND book_status = '0'");
                        while($row = mysqli_fetch_array($get_all_books)){
                        $cat_id = $row['category_id'];
                        $category = "SELECT category_name FROM `category` WHERE category_id = $cat_id";
                        $category_result = mysqli_query($mysqli, $category) or die( mysqli_error($mysqli));
                        $category_row = mysqli_fetch_row($category_result);
                        $selected_category = $category_row[0];

                        // echo $selected_category;
                            $sr_no++;
                    ?>
                    <tr>
                        <td><?php echo $sr_no; ?></td>
                        <td><?php echo $row['book_name']; ?></td>
                        <td><?php echo $row['ISBN_number']; ?></td>
                        <td><?php echo $row['author_name']; ?></td>
                        <td><?php echo $selected_category; ?></td>
                        <td><?php echo $row['book_edition']; ?></td>
                        <td><?php echo $row['publish_year']; ?></td>
                        <td><?php echo $row['rack_no']; ?></td>
                        <td>
                            <?php 
                                if($row['book_status'] == 1){ ?>
                                    <a href="edit_book.php?id=<?php echo $row['book_id'] ?>">
                                        <button class="btn btn-success "  disabled><i class="fa fa-edit"></i> &nbsp; Edit</button>
                                    </a>
                                <?php }else{ ?>
                                    <a href="edit_book.php?id=<?php echo $row['book_id'] ?>">
                                        <button class="btn btn-success "><i class="fa fa-edit"></i> &nbsp; Edit</button>
                                    </a>
                                <?php }?>
                        </td>
                        <td>   
                            <?php 
                                if($row['book_status'] == 1){ ?>
                                    <a href="viewFullBookDetail?profile_id=<?php echo $row['book_id']?>">
                                        <button class="btn btn-success"  disabled> View</button>
                                    </a>
                                <?php }else{ ?>
                                    <a href="viewFullBookDetail.php?profile_id=<?php echo $row['book_id']?>">
                                    <button class="btn btn-success" id="fullProfile">View</button>
                                </a>
                                <?php }
                                ?> 
                        </td>
                        <td>
                            <div class="form-group row">
                                <div class="">
                                   <?php 
                                      if($row['book_status'] == 1){ ?>
                                        <a href="blockBook.php?book_id=<?php echo $row['book_id'] ?>&book_status=0"><button class="btn btn-success" id="block">Unblock</button></a>
                                    <?php }else{ ?>
                                        <a href="blockBook.php?book_id=<?php echo $row['book_id'] ?>&book_status=1"><button class="btn btn-danger" id="block">Block</button></a>
                                    <?php }      ?>
                                </div>
                            </div>
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