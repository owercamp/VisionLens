
require('./Jquery.all');
require('datatables.net-dt');
require('datatables.net-responsive-dt');
require('jquery-mask-plugin');

$(document).ready(function(){
    tables();
    $('#identity_client').mask('#.##0',{reverse: true});
    $('#phone').mask('(###) ######0');
    
});

function tables(){
    let langs = $('html').attr('lang');    
    if( langs == 'es')
    {
        // tabla clientes
        $('#tableClient').DataTable({
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
        // tabla usuarios
        $('#tableUser').DataTable({
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
    else if(langs == 'en')
    {
        // table customers
        $('#tableClient').DataTable({
            responsive: true,
        });
        // table users
        $('#tableUser').DataTable({
            responsive: true,
        });
    }
}
