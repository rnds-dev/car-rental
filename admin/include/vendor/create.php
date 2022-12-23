<?php

require_once $_SERVER['DOCUMENT_ROOT'] .'/config/db.php';

$fields = '';
$values = '';
foreach ($_POST as $key => $val) {
  if (empty($_POST[$key])) {
     'пустой txt';
  }
  $fields .= $key . ',';
  $values .= '\''. $val . '\''. ',';
}

$fields = substr($fields,0,-1);
$values = substr($values,0,-1);
$query = "INSERT INTO `$name_table` (id, ". $fields .") VALUES (NULL, ". $values .")";


mysqli_query($connect,$query);
header('Location: ../manage-'.$link.'s.php');
?>