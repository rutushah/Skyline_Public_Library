<?php
   include_once("../dbConfig.php");
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>View Categories</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <style>
         <?php 
            include "../css/admin.css";
            include "../css/styles.css";
            ?>
      </style>
   </head>
   <body>

      <div class="header_sidebar">
      </div>
      <div class="row">
         <div class="col-2">
            <?php include 'admin_header_sidebar.php';?>
         </div>
         <div class="col-10 justify-content-center">
            <div class=" main_content">
               <div class="dashboard">
                  <h1><b>Skyline Public Library<b></h1>
               </div>
               <div class="row">
               <div class="col-2"></div>
                  <div class="col-4">
                     <div class="h2">List of all Books</div>
                  </div>
                  <div class="col-6">
                    <div class="row">
                        <div class="col-5"> <a href="admin_add_book.php"><button class="btn btn-success" id="addNewCategory">Add New Book</button></a></div>
                        <div class="col-5"><input type="text" id="myInput" class="form-control searching" name = "" placeholder = "Search"  /></div>
                        <div class="col-2">  <button type="button" class="btn btn-primary">
                     <i class="fa fa-search"></i>
                     </button>
                    </div>
                    </div>
                  </div>
               </div>
               <div class="card-body userRequestList">
                  <div class="table-responsive text-info m-1 p-1">
                    



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
      <script>
         <?php
            include "../js/admin.js";
            ?>
      </script>
   </body>
</html>