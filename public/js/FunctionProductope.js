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
                            sWidth: '7%',
                            orderable: false,
                            "render": function(data) {
                                return '<button type="button" id="bedv" onclick="VerProducto(' + data + ');" class="btn btn-info" style="width: 100%;"><i class="fas fa-eye" style="color:white;"></i></button>';
                            }
                        },

                    ],
            });
        },
        error: function() {

        }
    });
  }






      function VerProducto(seleccion) {

        var mar;
        var desc;
        var id_emp;
        var nom;
        var image_p;
        var tabla;
        var url;


        $("#tableproductope").on('click', '#bedv', function(e) {
            e.preventDefault();
            var currentRow = $(this).closest("tr");
            var data = $('#tableproductope').DataTable().row(currentRow).data();

            nom  = data['nombre'];
            mar  = data['nombre_marca'];
            desc = data['descripcion'];
            id_emp = data['ID_empresa'];
            imagen_p=data['imagen'];
            tabla=data['tabla_nutricional'];

            url="../linkprod/"+id_emp+"/"+tabla;
            console.log(url);
            // producto = data['imagen'];
            // titulo = data['titulo'];

            $("#nombre_e").val(nom);
            $("#marca_e").val(mar);
            $("#desc_e").val(desc);

            $("#tabla").attr("href", url);

             document.getElementById("img_e").src = "../Files/"+id_emp+"/Productos/"+imagen_p;
            // document.getElementById("titulo_e").src = "categorias/"+res+"/"+titulo;

            $("#modalverproducto").modal('show');

        });



    }
