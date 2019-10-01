$(document).ready(function() {


    setTimeout("getProd();", 2000);


    // document.getElementById(res[4]).selected = "true";
    // document.getElementById(res[3]).selected = "true";
});




function getProd() {
var empresa;
var id= $("#id_empresa").val();
console.log(id);
    $('#tableproductope').dataTable().fnDestroy();
    $.ajax({
        url: "../getProductospe/"+id,
        dataType: 'json',
        method: 'Get',
        success: function(r) {
            oTable = $('#tableproductope').DataTable({
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
                              return '<img src="../Files/'+empresa+'/Productos/' + data + '" width="50%;">';
                            }
                        },
                        {
                            data: 'ID_producto',

                            sWidth: '7%',
                            orderable: false,
                            "render": function(data) {
                                  return '<a href="'+data+'">Ver</a>';
                            }
                        },

                    ],
            });
        },
        error: function() {

        }
    });
  }
