$(document).ready(function() {


    setTimeout("getProd();", 2000);


    // document.getElementById(res[4]).selected = "true";
    // document.getElementById(res[3]).selected = "true";
});




function getProd() {
var empresa;

var fase = $('#faseactual').val();
console.log(fase);
    $('#tableproducto').dataTable().fnDestroy();
    $.ajax({
        url: "./getProductos",
        dataType: 'json',
        method: 'Get',
        success: function(r) {
            oTable = $('#tableproducto').DataTable({
            "language": {
   				   "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },
              // dom: 'Bfrtip',
              // lengthMenu: [
              //   [ 10, 25, 50, -1 ],
              //   [ '10 registros', '25 registros', '50 registros', 'Mostrar todo' ]
              // ],
              // buttons: [
              //   'pageLength', 'excel', 'pdf', 'print'
              // ],
                "data": r.data,
                "columns": [{
                            data: 'ID_producto',
                            name: 'ID_producto',
                        },
                        {
                            data: 'nombre',
                            name: 'nombre'
                        },
                        {
                            data: 'nombre_marca',
                            name: 'nombre_marca'
                        },
                        {
                            data: 'ID_empresa',
                            "render": function(data) {
                              empresa=data;
                              return '';
                            }
                        },
                        {
                            data: 'imagen',
                            "render": function(data) {
                              var n=data.slice(0,-4);
                              return '<img src="Files/'+empresa+'/Productos/' + data + '" width="50%;">';
                            }
                        },
                        {
                            data: 'ID_producto',

                            sWidth: '100px',
                            orderable: false,
                            "render": function(data) {
                              if ((fase >=0 && fase<4)||(fase >=10 && fase<14)) {
                                return '<a href="./actualizarProducto/'+data+'">Editar</a>';
                              }else {
                                return '<a href="./actualizarProducto/'+data+'">Editar</a>';
                              }

                            }
                        },

                    ],
            });
        },
        error: function() {

        }
    });
  }
