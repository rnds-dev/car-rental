<?
function getItems($connect, $name_table, $condition = "")
{
  $query = "SELECT * FROM `$name_table` " . $condition;
  $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
  $items = mysqli_fetch_all($result);
  return $items;
}