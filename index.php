<?php
  session_start();
  include_once("dbConfig.php");
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
         <?php
            include "js/main.js";
            include "css/user.css";  
            include "css/bootstrap.css";          
         ?>
      </style>
  </head>
  <body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-success">
    <div class="container-fluid">
      <a class="navbar-brand h5" href="javascript:void(0)">Skyline</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav me-auto">
          <li class="nav-item h5"></li>
        </ul>
        <div class="navbar-nav h5">
        <?php
          if(isset($_SESSION["email_id"])){
            ?>
            <a class="nav-link active" href="user/user_dashboard.php"><i class=" nav-link active h5 fa fa-user-circle-o" >&nbsp;&nbsp;MY Account </a></i>
            <?php
          }else{
        ?>
        <a class="nav-link active" href="selectRole.php"><i class=" nav-link active h5 fa fa-user-circle-o" id = 'myAccount' >&nbsp;&nbsp;MY Account </a></i>
            <?php
            }
            ?>
      </div>
      </div>
    </div>
  </nav>

  <div class="container-fluid mt-3">
    

  <?php 
        // echo $staff_login_id;
        // die();
            $query = mysqli_query($mysqli,"SELECT * FROM `library_setting` WHERE library_id = 1");
             while($row = mysqli_fetch_array($query)){     
             // echo $row['contact_number'];
            //  }
            ?>

   <img class="maxwidth imgscale" src="images/Home_Image.jpg">
   <div class="row">
     <div class="col-sm-6">
       <div class="ms-5">
   <div class="p-3"></div>
   <div class="display-5 h5 fw-bold"><?php echo $row['library_name']; ?></div>
   <div class="p-2"></div>
   <p>Last Updated July 27, 2022</p>
    <a class="nav-link" href="https://en.wikipedia.org/wiki/Montreal">Address :  <br><span class="text-success text-reset"><u>
      <?php 
        echo $row['library_address'];
      ?>
    </u></span></a>
    <a class="nav-link">Email : <span class="text-success text-reset"><u>
      <?php 
        echo $row['library_email'];
      ?>
    </u></span></a>
    <a class="nav-link">Contact :  <span class="text-success text-reset"><u>
      <?php 
        echo $row['library_contact'];
      ?>
    </u></span></a>
    
  
  </div>
     </div>
     <div class="col-2"></div>
     <div class="col-sm-4">
      <div class="p-3"></div>
      <div class="ps-5">
       <h3 class="display-7">Opening Hours</h3>
       <div class="row">
        <div class="col-sm-1"><i class="fa fa-clock-o" style="font-size:24px"></i></div>
        <div class="col-sm-10">
       <p class="fw-bolder">Fall Schedule (September 5 to December 31)</p>
       <p>Closed : September 5, October 10, December 24, 25, 26, 31, January 1 and 2.</p>
       <pre class="fontfamilychange">Monday         <?php echo $row['opening_time']; ?>am  to <?php echo $row['closing_time']; ?>pm</pre>
       <pre class="fontfamilychange">Tuesday        <?php echo $row['opening_time']; ?>am  to <?php echo $row['closing_time']; ?>pm</pre>
       <pre class="fontfamilychange">Wednesday      <?php echo $row['opening_time']; ?>am  to <?php echo $row['closing_time']; ?>pm</pre>
       <pre class="fontfamilychange">Thursday       <?php echo $row['opening_time']; ?>am  to <?php echo $row['closing_time']; ?>pm</pre>
       <pre class="fontfamilychange">Friday         <?php echo $row['opening_time']; ?>am  to <?php echo $row['closing_time']; ?>pm</pre>
       <pre class="fontfamilychange">Saturday       <?php echo $row['opening_time']; ?>am  to <?php echo $row['closing_time']; ?>pm</pre>
       <pre class="fontfamilychange">Sunday         <?php echo $row['opening_time']; ?>am  to <?php echo $row['closing_time']; ?>pm</pre>
       </div>
     </div>
       </div>
     </div>
   </div>

   <hr>
   <div class="fw-normal fs-5 ps-5 mt-3">The Bibliothèque Skyline, which opened in 1973, is plugged into the life of the neighbourhood.</div>

   <div class="mt-5"></div>
   <div class="h2 ps-5 fw-bold">Description</div>
   <p class=" ps-5 mt-4 fs-5 fw-lighter">
    <?php echo $row['important_message']; ?></p>
   <div class="ps-5 mt-4 h3 fw-bold">Rules</div>
   <div class="ps-5 mt-4 fw-lighter">
     <p class="paddingtopminus">~ To be the member of skyline, one has to register themself with skyline and
      we charge a little amount which is <?php echo $row['membership_price']; ?>$ per 6months, after that user has to renew the membership again.
     </p>
     <p class="paddingtopminus">~ Limit to return the book is <?php echo $row['book_issue_limit']; ?> days.</p>
     <p class="paddingtopminus">~ Fine charged on late book return is <?php echo $row['fine_per_day']; ?>$ per day </p>
   </div>
 </div>
  <div class="mt-5"></div>
   
  <?php
             }
  ?>
   
   <div class="copyright fw-light p-2"><i class="fa fa-copyright">&nbsp; copyright 2022</i></div>
</div>



  </body>
  </html>


