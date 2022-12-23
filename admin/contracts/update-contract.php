<?php
include('connect.php');

$id = $_GET['id'];

$query = "SELECT * FROM `$name_table` WHERE id = $id";
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));

$item = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/style.css">

  <title><?=$title?></title>
</head>

<body>
  <!-- Navigation -->
  <?php include('../include/nav.php'); ?>

  <h1 class="container"><?= $title ?></h1>

  <!-- Edit item -->
  <section class="container">
    <form action="vendor/update.php" method="post">
      <h3>Управление</h3>

      <input type="hidden" name="id" value="<?=$item[$fields[0]]?>">

      <label>Клиент</label>
      <select name="client" required>
        <option disabled selected>Клиент</option>

        <?php foreach ($connected_items_client as $connected_item) { ?>
          <option value="<?= $connected_item[0]?>" 
          <? if ($connected_item[0]==$item["client"]) echo "selected"; ?>
          > <?=$connected_item[1]?> <?=$connected_item[2]?> <?=$connected_item[3]?></option>
        <? } ?>
      </select>

      <label>Автомобиль</label>
      <select name="car" onchange="daily_cost.value=this.options[this.selectedIndex].text; filler()" required>
        <option disabled selected>Автомобиль</option>

        <?php foreach ($connected_items_car as $connected_item) { ?>
          <option value="<?= $connected_item[0] ?>" label="<?= $connected_item[2] ?> <?= $connected_item[3] ?>"
          <? if ($connected_item[0]==$item["car"]) echo "selected"; ?>
          ><?= $connected_item[8] ?></option>
        <? } ?>

      </select>

      <label>Сотрудник</label>
      <select name="employee" required>
        <option disabled selected >Сотрудник</option>

        <?php foreach ($connected_items_employee as $connected_item) { ?>
          <option value="<?= $connected_item[0] ?>" label="<?= $connected_item[1] ?> <?= $connected_item[2] ?> <?= $connected_item[3] ?>"><?= $connected_item[8] ?></option>
        <? } ?>

      </select>

      <?php
      $types_input = array(4 => 'date', 'date', 'text', 'text', 'text');
      for ($i = 4; $i < count($fields); $i++) {
      ?>
        <label><?= $fieldsRu[$i] ?></label>
        <input class="fields" type="<?= $types_input[$i] ?>" name="<?= $fields[$i] ?>" placeholder="<?= $fieldsRu[$i] ?>" onchange="filler()" value="<?=$item[$fields[$i]]?>" required>
      <? } ?>

      <button type="submit">Обновить</button>
    </form>
  </section>
  
  <script src="js/script.js"></script>
</body>