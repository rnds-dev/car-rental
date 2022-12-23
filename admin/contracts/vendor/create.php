<?php

require_once '../../../config/db.php';
function getItems($connect, $name_table, $condition = "")
{
  $query = "SELECT * FROM `$name_table`" . $condition;
  $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  $items = mysqli_fetch_all($result);
  return $items;
}

$link = $name_table =  'contract';
$id_car = $_POST['car'];
$car = getItems($connect, 'car', "WHERE `car`.`id` = $id_car")[0][7];

$today = date('o-m-d');
$start_date = $_POST['rental_start_date'];
$end_date = $_POST['rental_end_date'];
var_dump($_POST['rental_start_date']);
var_dump($today);
if ($car > 0) {
  if ($today >= $start_date and $today <= $end_date) {
    $query_car = "UPDATE `car` SET `availability` = `availability`-1 WHERE `car`.`id` = $id_car";
    mysqli_query($connect, $query_car);
  }  else {
    $_POST['flag'] = 1;
  }
  include('../../include/vendor/create.php');

} else {

  $_SESSION['message'] = 'Автомобиля нет в наличии';
  header('Location: ../manage-' . $link . 's.php');
}

/*
0 - car is using
1 - car is free
*/