<?php
include('connect.php');

// Delete item
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $query = "DELETE FROM `$name_table` WHERE id=$id";
  mysqli_query($connect, $query) or die(mysqli_error($connect));
}

// Get items
$query = "SELECT * FROM `$name_table`" . $condition;
$result = mysqli_query($connect, $query) or die(mysqli_error($connect));
for ($items = []; $row = mysqli_fetch_assoc($result); $items[] = $row);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="shortcut icon" href="/assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />

  <!-- Print script -->
  <script language="JavaScript" type="text/javascript" src="../assets/js/jquery-3.6.1.min.js"></script>
  <script src="../assets/js/print.js"></script>

  <title><?= $title; ?></title>
</head>
<script src="js/script.js"></script>

<body>
  <!-- Navigation -->
  <?php include('../include/nav.php'); ?>

  <h1 class="container"><?= $title ?></h1>

  <!-- Add item -->
  <section class="container">
    <form action="vendor/create.php" method="post">
      <h3>Добавить</h3>

      <label>Клиент</label>
      <select name="client">
        <option disabled selected required>Клиент</option>

        <?php foreach ($connected_items_client as $connected_item) { ?>
          <option value="<?= $connected_item[0] ?>"><?= $connected_item[1] ?> <?= $connected_item[2] ?> <?= $connected_item[3] ?></option>
        <? } ?>

      </select>

      <label>Автомобиль</label>
      <select name="car" onchange="daily_cost.value=this.options[this.selectedIndex].text; filler()">
        <option disabled selected required>Автомобиль</option>

        <?php foreach ($connected_items_car as $connected_item) { ?>
          <option value="<?= $connected_item[0] ?>" label="<?= $connected_item[2] ?> <?= $connected_item[3] ?>"><?= $connected_item[8] ?></option>
        <? } ?>

      </select>

      <label>Сотрудник</label>
      <select name="employee">
        <option disabled selected required>Сотрудник</option>

        <?php foreach ($connected_items_employee as $connected_item) { ?>
          <option value="<?= $connected_item[0] ?>" label="<?= $connected_item[1] ?> <?= $connected_item[2] ?> <?= $connected_item[3] ?>"><?= $connected_item[8] ?></option>
        <? } ?>

      </select>

      <?php
      $types_input = array(4 => 'date', 'date', 'text', 'text', 'text');
      for ($i = 4; $i < count($fields) - 1; $i++) {
      ?>
        <label><?= $fieldsRu[$i] ?></label>
        <input required class="fields" type="<?= $types_input[$i] ?>" name="<?= $fields[$i] ?>" placeholder="<?= $fieldsRu[$i] ?>" onchange="filler()">
      <? }
      $i = count($fields) - 1;
      ?>

      <label><?= $fieldsRu[$i] ?></label>
      <input type="<?= $types_input[$i] ?>" name="<?= $fields[$i] ?>" placeholder="<?= $fieldsRu[$i] ?>">

      <button type="submit">Добавить</button>
      <?php
      if (isset($_SESSION['message'])) { ?>
        <p class="msg"><?=$_SESSION['message']?></p>
      <?}
      unset($_SESSION['message']);
      ?>
    </form>
  </section>



  <!-- Table section -->
  <section class="container">
    <!-- Print button -->
    <button onclick="printTable()" class="print">
      <span class="material-symbols-outlined">print</span>
    </button>

    <!-- Search -->
    <!-- <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" class="search">
      <input type="text" name="search" id="" placeholder="Введите запрос">
    </form> -->

    <!-- Table -->
    <table class="container" id="table">
      <col class="column-one">

      <!-- Header -->
      <tr>
        <?php
        //$keys = array_keys($items[0]);
        foreach ($fieldsRu as $key) {
        ?>
          <th> <?= $key ?> </th>
        <? } ?>
      </tr>

      <!-- Items -->
      <?php
      foreach ($items as $item) {
      ?>
        <tr>

          <?php foreach ($item as $key => $data) {
            if ($key == "client" || $key == "car" || $key == "employee") {
              $connected_items = getItems($connect, $key, "WHERE `id`=$data");
              $connected_item = $connected_items[0];
          ?>

              <td> <?= $connected_item[1] ?> <?= $connected_item[2] ?> <?= $connected_item[3] ?></td>

            <? } elseif ($key!="flag") { ?>
              <td> <?= $data ?> </td>
          <? }
          } ?>

          <td class="update">
            <a href="update-<?= $links ?>.php?id=<?= $item['id'] ?>">
              <span class="material-symbols-outlined">edit</span>
            </a>
          </td>
          <td class="delete">
            <a href="vendor/delete.php?id=<?= $item['id'] ?>">
              <span class="material-symbols-outlined">remove</span>
            </a>
          </td>
        </tr>
      <? } ?>
    </table>
  </section> <!-- Table -->
</body>