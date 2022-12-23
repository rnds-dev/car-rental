<?php
require_once '../../config/db.php';
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: /auth.php');
}

function getItems($connect, $name_table, $condition = "")
{
  $query = "SELECT * FROM `$name_table`" . $condition;
  $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  $items = mysqli_fetch_all($result);
  return $items;
}

$items = getItems($connect, 'contract');

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/style.css">

  <title>Отчеты</title>
</head>

<body>
  <?php include('../include/nav.php'); ?>

  <?
  $sum = 0;
  foreach ($items as $item) {
    $sum += (int)$item[7];
  }
  ?>

  <section class="container">
    <h3>Общий доход: <?= $sum ?> р</h3>
    
  </section>
</body>