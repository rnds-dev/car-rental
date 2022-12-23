<?php
include('../include/connection.php');
include('../include/functions.php');

$title = 'Контракты';
$name_table = 'contract';
$links = 'contract';

$fields = array('id', 'сlient', 'car', 'employee', 'rental_start_date', 'rental_end_date', 'number_of_rental_days', 'daily_cost', 'total_cost');
$fieldsRu = array('id', 'Клиент', 'Автомобиль', 'Сотрудник', 'Дата начала проката', 'Дата окончания проката', 'Количество дней проката', 'Стоимость дня проката', 'Итоговая стоимость');
$select = array(null, 1, 2, 3);
$select_tables = array(null, 'client', 'car', 'employee');

$connected_items_car = getItems($connect, 'car');
$connected_items_client = getItems($connect, 'client');
$connected_items_employee = getItems($connect, 'employee');