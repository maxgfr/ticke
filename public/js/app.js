$(function() {
  $('body > .px-nav').pxNav();
  $('body > .px-footer').pxFooter();

  $('#datatables').dataTable();
  $('#datatables_wrapper .table-caption').text('La liste des restaurants');
  $('#datatables_wrapper .dataTables_filter input').attr('placeholder', 'Rechercher...');
});
