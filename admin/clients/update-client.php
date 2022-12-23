<?php
$title= 'Клиенты';
$name_table = 'client';
$links = 'client';

$fields = array('id', 'surname', 'name',  'patronymic', 'passport', 'driver_license', 'phone_number', 'email', 'age', 'driver_experience');
$fieldsRu = array('id', 'Фамилия', 'Имя', 'Отчество', 'Пасспорт', 'Водительское удостоверение', 'Номер телефона', 'E-Mail', 'Возраст', 'Водительский стаж');
include('../include/update.php')
?>