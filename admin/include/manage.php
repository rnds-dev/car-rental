<?php
include('connection.php');

// Delete item
if (isset($_GET['del'])) {
  $id = $_GET['del'];
  $query = "DELETE FROM `$name_table` WHERE id=$id";
  mysqli_query($connect, $query) or die(mysqli_error($connect));
}

//Search
$input_search = "";
$search_filter = array();
$condition = "";

if (!empty($_REQUEST) && isset($_REQUEST['search_filter'])) {
  $input_search = $_REQUEST['search'];
  $search_filter = $_REQUEST['search_filter'];

  //$condition = "WHERE `$search_filter` LIKE '%{$input_search}%'";
  $condition = "WHERE ";
  for ($i = 0; $i < count($search_filter); $i++)
    $condition .= "`$search_filter[$i]` LIKE '%{$input_search}%' || ";

  $condition = substr($condition, 0, -4);
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

  <!-- Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0" />

  <!-- Print -->
  <script language="JavaScript" type="text/javascript" src="../assets/js/jquery-3.6.1.min.js"></script>
  <script src="../assets/js/print.js"></script>

  <title><?= $title; ?></title>
</head>

<body>
  <!-- Navigation -->
  <?php include('nav.php'); ?>

  <h1 class="container"><?= $title ?></h1>

  <!-- Add item -->
  <section class="container">
    <form action="vendor/create.php" method="post">
      <h3>Добавить</h3>

      <?php for ($i = 1; $i < count($fields); $i++) { ?>

        <label> <?= $fieldsRu[$i] ?> </label>

        <?php if (isset($select) and array_search($i, $select)) { ?>

          <select required name="<?= $fields[$i] ?>">
            <option disabled selected><?= $fieldsRu[$i] ?></option>

            <?php
            $connected_query = "SELECT * FROM `$select_tables[$i]`";

            // Get items
            $connected_result = mysqli_query($connect, $connected_query) or die(mysqli_error($connect));
            $connected_items = mysqli_fetch_all($connected_result);

            foreach ($connected_items as $connected_item) {
            ?>

              <option value="<?= $connected_item[0] ?>"><?= $connected_item[1] ?> <?= $connected_item[2] ?> <?= $connected_item[3] ?></option>

            <? } ?>

          </select>

        <? } else { ?>
          <input required type="text" name="<?= $fields[$i] ?>" placeholder="<?= $fieldsRu[$i] ?> ">
        <? } ?>
      <? } ?>

      <button type="submit">Добавить</button>
    </form>
  </section>



  <!-- Table section -->
  <section class="container">
    <!-- Print button -->
    <button onclick="printTable()" class="print">
      <span class="material-symbols-outlined">print</span>
    </button>

    <!-- Search -->
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" class="search">

      <input type="text" name="search" id="" placeholder="Введите запрос" value="<?= $input_search ?>">
      <div class="search-filters">
        <? for ($i = 0; $i < count($search_fields); $i++) { ?>
          <fieldset>
            <input type="checkbox" name="search_filter[]" id="<?= $search_fields[$i] ?>" value="<?= $search_fields[$i] ?>">
            <label for="<?= $search_fields[$i] ?>"><?= $search_fields_ru[$i] ?></label>
          </fieldset>
        <? } ?>
      </div>
    </form>

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

          <?php
          
          foreach ($item as $data) {
            
          ?>
            <td> <?= $data ?> </td>
          <? } ?>

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