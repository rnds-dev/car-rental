<?
$title = 'Количество заказов по автомобилям';
include('report-start.php');

//Creation report - Difference
$contract_report = array();
foreach ($contracts as $contract) {
  if (!isset($contract_report[$contract[2]])) {
    $contract_report[$contract[2]] = 1;
  } else {
    $contract_report[$contract[2]] += 1;
  }
}
ksort($contract_report);
include('report-end.php');
