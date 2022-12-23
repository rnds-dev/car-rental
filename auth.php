<?php
  session_start();
  if (isset($_SESSION['user'])){
    header('Location: /admin/dashboard.php');
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">

  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/auth.css">

  <title>Вход в личный кабинет</title>

</head>



<body>
  <form action="vendor/signin.php" method="post">
    <div class="type-form">
      <a href="register.php">Регистрация</a>
      <a href="">Вход</a>    
    </div>

    <label for="ip">IP</label>
    <input type="text" name="ip" placeholder="Введите IP">
    <label for="login">Логин</label>
    <input type="text" name="login" placeholder="Введите логин">
    <label for="password">Пароль</label>
    <input type="password" name="password" placeholder="Введите пароль">
    <button type="submit">Войти</button>

    <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> '.$_SESSION['message'].'</p>';
      }
      unset($_SESSION['message']);
      ?>

  </form>
</body>