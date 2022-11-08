<?php
//include_once("./dbConfig.php");
?>
<!doctype html>
<html>
    <head>
        <title>Staff Dashboard</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        
        <link rel="stylesheet" type="text/css" href="../css/admin.css">
        <!-- <link rel="stylesheet" type="text/css" href="../css/styles.css"> -->
    </head>
<body>
    <div class="header_sidebar">
        <?php include 'staff_header_sidebar.php';?>
    </div>
    <div class="main_content">
        <div class="dashboard">
            <h1><b>Welcome to Staff Dashboard!!<b></h1>
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