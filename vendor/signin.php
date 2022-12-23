<?php
session_start();

$ip = $_POST['ip'];
$login = $_POST['login'];
$password = md5($_POST['password']);

try {
  include('../config/db.php');
  $check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password`='$password'");
} catch (mysqli_sql_exception $e) {
  $_SESSION['message'] = 'Ошибка подключения';
  header('Location: /auth.php');
}

if (mysqli_num_rows($check_user) == 1) {
  $user = mysqli_fetch_assoc($check_user);

  $_SESSION['user'] = [
    "id" => $user['id'],
    "ip" => $ip
  ];

  include('../admin/include/functions.php');
  $today = date('o-m-d');

  $cars = getItems($connect, 'car');
  foreach ($cars as $car) {
    $car_id = $car[0];

    $contracts = getItems($connect, 'contract', "WHERE `car`=$car[0] AND `rental_end_date`<'$today' AND `flag`=0");

    foreach ($contracts as $contract) {
      $contract_query = "UPDATE `contract` SET `flag` = '1' WHERE `contract`.`id` = $contract[0]";
      mysqli_query($connect, $contract_query);

      $car_query = "UPDATE `car` SET `availability` = `availability`+1 WHERE `car`.`id` = $car[0]";
      mysqli_query($connect, $car_query);
    }
  }
  header('Location: /admin/dashboard.php');

} else {
  $_SESSION['message'] = 'Неверный логин или пароль';
  header('Location: /auth.php');
}
