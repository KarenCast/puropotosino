$(document).ready(function() {


    setTimeout("getProd();", 2000);


    // document.getElementById(res[4]).selected = "true";
    // document.getElementById(res[3]).selected = "true";
});




function getProd() {
  var empresa;

    $.ajax({
        url: "./getProductosu",
        dataType: 'json',
        method: 'Get',
        success: function(r) {
            oTable = $('#tableproductos').DataTable({
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
                "columns": [

                        {
                            data: 'nombre',
                            name: 'nombre'
                        },
                        {
                            data: 'nombre_marca',
                            name: 'nombre_marca'
                        },

                        {
                            data: 'razonsocial',
                            name: 'razonsocial'
                        },
                        {
                            data: 'ID_empresa',
                            "render": function(data) {
                              empresa=data;
                              return empresa;
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
      var nom;
      var titulo;
      var imagen;


      $("#tableproductos").on('click', '#bedv', function(e) {
          e.preventDefault();
          var currentRow = $(this).closest("tr");
          var data = $('#tableproductos').DataTable().row(currentRow).data();



          nom  = data['nombre'];
          mar  = data['nombre_marca'];
          desc = data['descripcion'];
          imagen = data['disenio_imagen'];
          id_emp = data['ID_empresa'];
          // producto = data['imagen'];
          // titulo = data['titulo'];

          $("#nombre_e").val(nom);
          $("#marca_e").val(mar);
          $("#desc_e").val(desc);




           document.getElementById("logo_e").src = "Files/"+id_emp+"/Productos/"+imagen;
          // document.getElementById("titulo_e").src = "categorias/"+res+"/"+titulo;



          $("#modalverproducto").modal('show');

      });



  }
