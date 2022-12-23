<?php

require_once '../../../config/db.php';

$id = $_GET['id'];

mysqli_query($connect,"DELETE FROM `$link` WHERE `$link`.`id` = '$id'");

header('Location: ../manage-'.$link.'s.php');