
$(document).ready(function() {

    setTimeout("getCont();", 2000);

});

function getCont() {


    $('#tablerec').dataTable().fnDestroy();
    $.ajax({
        url: "./getRec/",
        dataType: 'json',
        method: 'Get',
        success: function(r) {
            oTable = $('#tablerec').DataTable({
            "language": {
   				   "url": "https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            },

                "data": r.data,
                "columns": [{
                            data: 'ID_contenido',
                            name: 'ID_contenido',
                        },
                        {
                            data: 'titulo',
                            name: 'titulo'
                        },

                        {
                            sWidth: '7%',
                            orderable: false,
                            "render": function(data) {
                                  return '<button type="button" id="bed" onclick="EditEmpresa(' + data + ');" class="btn btn-secondary" style="width: 100%;" ><i class="fa fa-edit" style="color:white;"></i></button>';
                            }
                        },
                        {
                            sWidth: '7%',
                            orderable: false,
                            "render": function(data) {

                                  return '<button type="button" id="bed2" onclick="EliminaCat(' + data + ');" class="btn btn-secondary" style="width: 100%;" ><i class="fa fa-edit" style="color:white;"></i></button>';


                            }
                        },

                        



                    ],
            });
        },
        error: function() {

        }
    });
  }


  function EditEmpresa(seleccion) {

      var id;


      $("#tableconte").on('click', '#bed', function(e) {
          e.preventDefault();
          var currentRow = $(this).closest("tr");
          var data = $('#tableconte').DataTable().row(currentRow).data();

          id = data['ID_contenido'];

          window.location = './ActualizarContenido/' + id;
// qbR16j1SPA#RUESnTrJfqTvB
      });

  }






  function EliminaCat(seleccion) {

      var id;
      var nombre;

      $("#tableconte").on('click', '#bed2', function(e) {
          e.preventDefault();
          var currentRow = $(this).closest("tr");
          var data = $('#tableconte').DataTable().row(currentRow).data();

          id = data['ID_categoria'];
          nombre = data['nombre'];

          $("#id_cat").val(id);
          $("#desc_cat").val(nombre);

          $("#modaleliminarcat").modal('show');

      });



  }



  function VerEmpresa(seleccion) {

    var id;
    var desc;
    var nom;
    var titulo;
    var imagen;


    $("#tableconte").on('click', '#bedv', function(e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var data = $('#tableconte').DataTable().row(currentRow).data();


        id = data['ID_categoria'];
        nom  = data['nombre'];
        desc = data['descripcion'];
        imagen = data['imagen'];
        titulo = data['titulo'];

        $("#id_e").val(id);
        $("#nombre_e").val(nom);
        $("#desc_e").val(desc);

        var res = nom.replace(" ", "");
        var res = res.replace(" ", "");

        document.getElementById("imagen_e").src = "categorias/"+res+"/"+imagen;
        document.getElementById("titulo_e").src = "categorias/"+res+"/"+titulo;

        console.log(desc);

        $("#modalvercategoria").modal('show');

    });



}
