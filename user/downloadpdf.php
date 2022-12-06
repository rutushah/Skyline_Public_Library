<?php
session_start();
$pdf = $_SESSION['pdf'];
 header('Content-disposition: attachment; filename='.$pdf);
 header('Content-type: application/pdf');
 readfile('../uploads/'.$pdf);