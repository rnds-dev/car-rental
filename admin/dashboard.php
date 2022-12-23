<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/style.css">


  <title>Главная страница</title>
</head>

<body>
  <?php include('include/nav.php'); ?>


  <h2 class="container">Главная страница</h2>

  <section class="container">
    <h3>Справочники</h3>
    <div class="list">
      <?php
      $names = array('Автомобили', 'Клиенты', 'Сотрудники');
      $links = array('cars', 'clients', 'users');
      $imgs = array('', '', '');

      for ($i = 0; $i < count($names); $i++) {
        $name = $names[$i];
        $link = $links[$i] . "/manage-" . $links[$i] . ".php";
        $img = $imgs[$i];
        include('include/link.php');
      }
      ?>
    </div>

    <h3>Контракты</h3>
    <div class="list">
      <?php
      $names = array('Управление контрактами');
      $links = array('contracts');
      $imgs = array('');

      for ($i = 0; $i < count($names); $i++) {
        $name = $names[$i];
        $link = $links[$i] . "/manage-" . $links[$i] . ".php";
        $img = $imgs[$i];
        include('include/link.php');
      }
      ?>
    </div>

    <!--
    <div class="list">
      <?php
      $names = array('Доход по автомобилям', 'Популярность автомобилей');
      $links = array('revenue-by-car', 'car-popularity');
      $imgs = array('');

      for ($i = 0; $i < count($names); $i++) {
        $name = $names[$i];
        $link =  "reports/" .$links[$i] . ".php";
        //$img = $imgs[$i];
        include('include/link.php');
      }
      ?>
    </div> -->
  </section>

</body>