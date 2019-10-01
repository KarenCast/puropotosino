$(document).ready(function() {


    setTimeout("getMarca();", 2000);


    // document.getElementById(res[4]).selected = "true";
    // document.getElementById(res[3]).selected = "true";
});




function getMarca() {

    $('#tablemarca').dataTable().fnDestroy();
    $.ajax({
        url: "./getMarca",
        dataType: 'json',
        method: 'Get',
        success: function(r) {
            oTable = $('#tablemarca').DataTable({
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
                            data: 'ID_marca',
                            name: 'ID_marca',
                        },
                        {
                            data: 'nombre_marca',
                            name: 'nombre_marca'
                        },
                        {
                            data: 'archivo',
                            name: 'archivo'
                        },
                        {
                            data: 'ID_marca',

                            sWidth: '7%',
                            orderable: false,
                            "render": function(data) {
                                  return '<a href="./actualizarMarca/'+data+'">Editar</a>';
                            }
                        },


                    ],
            });
        },
        error: function() {

        }
    });
  }
