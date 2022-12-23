<?php
$title= 'Автомобили';
$name_table = 'car';
$links = 'car';

$fields = array('id', 'number', 'brand', 'model', 'type', 'drive_unit', 'engine_power', 'availability', 'rental_day_price', 'insurance_value');
$fieldsRu = array('id', 'Гос.номер', 'Марка', 'Модель', 'Тип', 'Привод', 'Мощность двигателя', 'Наличие', 'Стоимость дня проката', 'Страховая стоимость');

include('../include/update.php')
?>