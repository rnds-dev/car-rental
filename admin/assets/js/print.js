function printTable() {
  var body = $('body').html();
  var table = $('#table');

  $('body').html(table);
  window.print();
  $('body').html(body);
}