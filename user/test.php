<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $fname = "Komal";
    $lname = "Vekariya";
         $rand_fname_str = substr($fname, 0, 2);
         $rand_lname_str = substr($lname, -1);
          $random_number = rand(1, 99999);
          $user_unique_id = $rand_fname_str.$random_number.$rand_lname_str;
          echo $user_unique_id;
          die();
    ?>
</body>
</html>