<?php
  session_start();
  
  $ip = $_POST['ip'];

  $login = $_POST['login'];
  $password = md5($_POST['password']);
  $password_confirm = md5($_POST['password_confirm']);

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $patronymic =  $_POST['patronymic'];
  $email = $_POST['email'];
  $phone_number = $_POST['phone'];

  try {
    include('../config/db.php');
    //$check_user = mysqli_query($connect, "SELECT * FROM `user` WHERE `login` = '$login' AND `password`='$password'");
  } catch (mysqli_sql_exception $e) {
    $_SESSION['message'] = 'Ошибка подключения';
    header('Location: /register.php');
  }

  if ($password==$password_confirm) {
    $query_employee = "INSERT INTO `employee` (`surname`, `name`, `patronymic`, `email`, `phone`) VALUES ('$surname', '$name', '$patronymic',  '$email', '$phone_number')";

    mysqli_query($connect, $query_employee);
    $last_id = mysqli_insert_id($connect);

    $query_user = "INSERT INTO `user` (`person`, `login`, `password`) VALUES ('$last_id','$login', '$password')";
    mysqli_query($connect, $query_user);

    header('Location: /auth.php');
  } else {
    $_SESSION['message'] = 'Passwords do not match';
    header('Location: /register.php');
  }

