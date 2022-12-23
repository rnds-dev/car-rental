
  <section class="container">

<!-- Form filter with dates -->
<form action="" method="post">
  <?php
  $fields = array("start_date", "end_date");
  $fieldsRu = array("С", "По");
  $vals = array($start_date, $end_date);
  for ($i = 0; $i < count($fields); $i++) {
  ?>
    <label><?= $fieldsRu[$i] ?></label>
    <input class="fields" type="date" name="<?= $fields[$i] ?>" placeholder="<?= $fieldsRu[$i] ?>" value="<?= $vals[$i] ?>">
  <? } ?>
  <button type="submit">Построить</button>
</form>

<!-- Print button -->
<button onclick="printTable()" class="print">
  <span class="material-symbols-outlined">print</span>
</button>

<!-- Difference -->
<!-- <h3>Доход по автомобилям: <?= $sum ?> р</h3> -->

<!-- Table -->

<table id="table">
  <col class="column-one">

  <!-- Header -->
  <tr>
    <th>#</th>
    <th>Имя</th>
    <th>Сумма</th>
  </tr>

  <!-- Items -->
  <?
  foreach ($contract_report as $key => $val) {
    $car = getItems($connect, 'car', "WHERE `id` = $key");;
  ?>
    <tr>
      <td> <?= $key ?> </td>
      <td> <?= $car[0][2] ?> <?= $car[0][3] ?> </td>
      <td> <?= $val ?> </td>
    </tr>
  <? } ?>

</table>
</section>
</body>