<?php
require_once '../../../config/db.php';

$id = $_POST['id'];
$query = "UPDATE `$link` SET ";

foreach ($_POST as $key => $val) {
  $query .= $key . " = \"" . $val . "\", ";
}
$query = substr($query, 0, -2);
$query .= " WHERE `$link`.`id` = '$id'";

var_dump($query);
mysqli_query($connect, $query);
header('Location: ../manage-'.$link.'s.php'); 