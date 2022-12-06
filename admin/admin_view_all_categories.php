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
      <link rel="stylesheet" type="text/css" href="../css/admin.css">
      <link rel="stylesheet" type="text/css" href="../css/styles.css">
   </head>
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
                     <div class="h2">List of all Categories</div>
                  </div>
                  <div class="col-4">
                    <div class="row">
                        <div class="col-6"> <a href="admin_add_category.php"><button class="btn btn-success" id="addNewCategory">Add a New Category</button></a></div>
                        <div class="col-4"><input type="text" id="myInput" class="form-control searching" name = "" placeholder = "Search"  /></div>
                        <div class="col-1">  <button type="button" class="btn btn-primary">
                     <i class="fa fa-search"></i>
                     </button>
                    </div>
                    </div>
                  </div>
               </div>
               <div class="card-body userRequestList">
                  <div class="text-info m-1 p-1">
                     <table class="table table-bordered table-striped table-hover" id="myTable">
                        <thead>
                           <tr>
                              <th scope="col">Sr no</th>
                              <th scope="col">Name</th>
                              <th scope="col">Edit</th>
                              <th scope="col">Status</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                              $sr_no = 0;
                              $get_category = mysqli_query($mysqli, "SELECT * FROM `category`");
                              while($row = mysqli_fetch_array($get_category)){
                                  $sr_no++;
                              ?>
                           <tr>
                              <td><?php echo $sr_no; ?></td>
                              <td><?php echo $row['category_name']  ; ?></td>
                              <td>
                                 <?php 
                                    if($row['category_status'] == 1){ ?>
                                 <a href="admin_edit_category.php?id=<?php echo $row['category_id'] ?>">
                                 <button class="btn btn-success "  disabled><i class="fa fa-edit"></i> &nbsp; Edit</button>
                                 </a>
                                 <?php }else{ ?>
                                 <a href="admin_edit_category.php?id=<?php echo $row['category_id'] ?>">
                                 <button class="btn btn-success "><i class="fa fa-edit"></i> &nbsp; Edit</button>
                                 </a>
                                 <?php }
                                    ?>
                              </td>
                              <td>
                                 <div class="form-group row">
                                    <div class="">
                                       <?php 
                                          if($row['category_status'] == 1){ ?>
                                       <a href="categoryStatus.php?id=<?php echo $row['category_id'] ?>&category_status=0"><button class="btn btn-success" id="block">Unblock</button></a>
                                       <?php }else{ ?>
                                       <a href="categoryStatus.php?id=<?php echo $row['category_id'] ?>&category_status=1"><button class="btn btn-danger" id="block">Block</button></a>
                                       <?php }
                                          ?>
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
      <script>
         <?php
            include "../js/admin.js";
            ?>
      </script>
   </body>
</html>