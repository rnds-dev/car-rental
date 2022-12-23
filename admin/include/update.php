<?php
include('connection.php');
include('functions.php');

$id = $_GET['id'];

$items = getItems($connect, $name_table, "WHERE id = $id");
$item = $items[0];
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


  <title><?= $title ?></title>
</head>

<body>
  <!-- Navigation -->
  <?php include('nav.php'); ?>

  <h1 class="container"><?= $title ?></h1>

  <!-- Edit item -->
  <section class="container">
    <form action="vendor/update.php" method="post">
      <h3>Управление</h3>
      <input type="hidden" name="id" value="<?= $item[0] ?>">

      <?php for ($i = 1; $i < count($fields); $i++) { ?>

        <label> <?= $fieldsRu[$i] ?> </label>
        <input type="text" name="<?= $fields[$i] ?>" value="<?= $item[$i] ?>">

      <? } ?>

      <button type="submit">Обновить</button>
    </form>
  </section>

  <?
  $fieldsRu = array('id', 'Клиент', 'Автомобиль', 'Сотрудник','Дата начала проката', 'Дата окончания проката', 'Количество дней проката', 'Стоимость дня проката', 'Итоговая стоимость');

  $contracts = getItems($connect, 'contract', "WHERE $name_table=$id");
  ?>

  <!-- Table -->
  <section>
    <table class="container" id="table">
      <col class="column-one">

      <!-- Header -->
      <tr>
        <? for ($i = 1; $i < count($fieldsRu); $i++) { ?>
            <th> <?= $fieldsRu[$i] ?></th>
        <? } ?>
      </tr>

      <!-- Items -->
      <? 
      $name_tables = array(1=>'client', 2=>'car', 3=>'employee');
      foreach ($contracts as $contract) { ?>
        <tr>
          <? for ($i = 1; $i < count($contract)-1; $i++) {
            if ($i >= 1 && $i<=3) {
              $connected_item = getItems($connect, $name_tables[$i], "WHERE id = $contract[$i]")[0]; ?>
              <td> <?= $connected_item[1] ?> <?= $connected_item[2] ?> <?= $connected_item[3] ?></td>

            <? } else { ?>
              <td> <?= $contract[$i] ?> </td>
          <? }
          } ?>

          <td class="update">
            <a href="../contracts/update-contract.php?id=<?= $contract[0] ?>">
              <span class="material-symbols-outlined">edit</span>
            </a>
          </td>
          <!-- <td class="delete">
            <a href="vendor/delete.php?id=<?= $contract[0] ?>">
              <span class="material-symbols-outlined">remove</span>
            </a>
          </td> -->

        </tr>
      <? } ?>
    </table>
  </section> <!-- Table -->
</body>