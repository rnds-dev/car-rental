<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/style.css">

    <!-- Print -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
  <script language="JavaScript" type="text/javascript" src="../assets/js/jquery-3.6.1.min.js"></script>
  <script src="../assets/js/print.js"></script>


  <title><?=$title?></title>
</head>

<body>
  <?php include('../include/nav.php'); ?>

  <?
  include('../include/functions.php');

  $condition = "";
  $start_date = $end_date = "";
  $sum = 0;

  if (!empty($_POST)) {
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
  }

  //filter date
  if ($start_date != NULL && $end_date != NULL)
    $condition .= "WHERE `rental_start_date`>='$start_date'  && `rental_end_date`<='$end_date'";
  elseif ($start_date != NULL)
    $condition .= "WHERE `rental_start_date`>='$start_date'";
  elseif ($end_date != NULL)
    $condition .= "WHERE `rental_end_date`<='$end_date'";

  $contracts = getItems($connect, 'contract', $condition);
  ?>
  
