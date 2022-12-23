<?php
  session_start();
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
  <form action="vendor/signup.php" method="post">
    <div class="type-form">
      <a href="">Регистрация</a>
      <a href="auth.php">Вход</a>
    </div>

<?
  $fields = array('ip', 'surname', 'name', 'patronymic',  'email', 'phone', 'login');
  $fieldsRu = array('IP адрес сервера', 'Фамилия', 'Имя',  'Отчество','E-Mail', 'Номер телефона', 'Логин');
  for ($i=0;$i<count($fields);$i++) {
?>

    <label for="<?=$fields[$i]?>"><?=$fieldsRu[$i]?></label>
    <input type="text" name = "<?=$fields[$i]?>" placeholder="Введите: <?=$fieldsRu[$i]?>" required>


    <?}?>
    <label for="">Пароль</label>
    <input type="password" name = "password" placeholder="Пароль" required>
    <label for="">Повторите пароль</label>
    <input type="password" name = "password_confirm" placeholder="Повтор пароля" required>

    <button type="submit">Зарегистрироваться</button>

    
      <?php
      if (isset($_SESSION['message'])) {
        echo '<p class="msg"> '.$_SESSION['message'].'</p>';
      }
      unset($_SESSION['message']);
      ?>
    


  </form>
</body>