<?php
  session_start();
  if(isset($_SESSION['user']))
    $db_host = $_SESSION['user']['ip'];
  else
    $db_host = $ip;

  $db_user = "root";
  $db_pswrd = "";
  $db_name = "car_rental";
  $connect = mysqli_connect($db_host, $db_user, $db_pswrd, $db_name);
  if (!$connect) {
    die("Error connect to database");
  }
?>
