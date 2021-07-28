$(document).ready(function(){
    tables();
});

function tables(){
    let langs = $('html').attr('lang');    
    if( langs == 'es')
    {
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
    } 
    else if(langs == 'en')
    {
        $('#tableClient').DataTable({
            responsive: true,
        });
    }
}
