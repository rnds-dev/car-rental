<?php
$title= 'Сотрудники';
$name_table = 'employee';
$links = 'user';

$fields = array('id', 'surname', 'name', 'patronymic', 'email', 'phone');
$fieldsRu = array('id', 'Фамилия', 'Имя',  'Отчество', 'E-Mail', 'Номер телефона');
$search_fields = array('surname', 'name', 'patronymic', 'email', 'phone');
$search_fields_ru = array('Фамилия', 'Имя',  'Отчество', 'E-Mail', 'Номер телефона');

include('../include/manage.php')

?>