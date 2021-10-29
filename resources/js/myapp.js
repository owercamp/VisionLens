
$(document).ready(function () {
  tables();
  $('#identity_client').mask('#.##0', { reverse: true });
  $('#phone').mask('(###) ######0');

});

function tables() {
  let langs = $('html').attr('lang');
  if (langs == 'es') {
    // ?configuración de las tablas en español
    $('#table').DataTable({
      responsive: true,
      language: {
        Processing: "Procesando...",
        infoEmpty: "Mostrando entradas del 0 al 0 de un total de 0 entradas",
        emptyTable: "No hay datos disponibles en la tabla",
        search: "Buscar",
        lengthMenu: 'Mostrar _MENU_ entradas',
        info: "Mostrando de _START_ a _END_ de _TOTAL_ entradas",
        paginate: {
          first: " |<Primero ",
          last: " Último>| ",
          next: " Siguiente &raquo; ",
          previous: " &laquo; Anterior ",
        },
      }
    });
  }
  else if (langs == 'en') {
    // *table settings in english
    $('#table').DataTable({
      responsive: true,
    });
  }
}
