<?php
include_once("../dbConfig.php");
?>
<!doctype html>
<html>
    <head>
        <title>View Users</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <link rel="stylesheet" type="text/css" href="../css/styles.css">
    </head>

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
                <div class="col-4"><div class="h2">List of all Users</div></div>
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
                    <th scope="col">Name</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Full Profile</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
             <?php
                $account_status = 0;
                $sr_no = 0;
                $get_user_requests = mysqli_query($mysqli, "SELECT * FROM `users` WHERE account_status = '$account_status'");
                while($row = mysqli_fetch_array($get_user_requests)){
                    $sr_no++;
             ?>
             <tr>
                <td><?php echo $sr_no; ?></td>
                <td><?php echo $row['first_name'] . ' '. $row['last_name'] ; ?></td>
                <td> <img style='height:100px; width: 100px;' src="../images/<?php echo $row['image']; ?>"></td>
                <td><?php echo $row['email_id']; ?></td>
                <td><?php echo $row['contact_number']; ?></td>
                <td>   
                <?php 
                    if($row['user_status'] == 1){ ?>
                        <a href="viewFullUserProfile.php?profile_id=<?php echo $row['user_id']?>">
                            <button class="btn btn-success"  disabled> View</button>
                        </a>
                    <?php }else{ ?>
                        <a href="viewFullUserProfile.php?profile_id=<?php echo $row['user_id']?>">
                        <button class="btn btn-success" id="fullProfile">View</button>
                    </a>
                    <?php }
                    ?> 
                </td>
                <td>
                    <div class="form-group row">
                           <div class="">
                               <?php 
                               if($row['user_status'] == 1){ ?>
                                    <a href="blockUser.php?user_id=<?php echo $row['user_id'] ?>&user_status=0"><button class="btn btn-success" id="block">Unblock</button></a>
                               <?php }else{ ?>
                                    <a href="blockUser.php?user_id=<?php echo $row['user_id'] ?>&user_status=1"><button class="btn btn-danger" id="block">Block</button></a>
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