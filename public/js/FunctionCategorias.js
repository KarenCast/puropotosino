$(document).ready(function() {


    setTimeout("getCat();", 2000);


    // document.getElementById(res[4]).selected = "true";
    // document.getElementById(res[3]).selected = "true";
});




function getCat() {
     var cat;
    var n = $("#tipoini").val();
    var rfc;
    // if (document.getElementById("activas").checked == false) {
    //   document.querySelector('#etiqueta1').innerText = 'VACANTES ACTIVAS';
    //   document.getElementById("vacactivas").style.backgroundColor = "#c1f0c8";
    //   console.log("activa");
    //   n=1;
    //   s='>=';
    //   dis="show";
    //   mos="none"
    // }else {
    //   document.querySelector('#etiqueta1').innerText = 'VACANTES INACTIVAS';
    //   document.getElementById("vacactivas").style.backgroundColor = "#f0bdbd";
    //   n=0;
    //   s='<';
    //   dis="none";
    //   mos="show";
    // }

    $('#tablecat').dataTable().fnDestroy();
    $.ajax({
        url: "./getCat",
        dataType: 'json',
        method: 'Get',
        success: function(r) {
            oTable = $('#tablecat').DataTable({
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
                            data: 'ID_categoria',
                            name: 'ID_categoria',
                        },
                        {
                            data: 'nombre',
                            name: 'nombre'
                        },
                        {
                            data: 'descripcion',
                            name: 'descripcion'
                        },
                        {
                            data: 'nombre',
                            "render": function(data) {
                              cat=data;
                              return '';
                            }
                        },
                        {
                            data: 'imagen',
                          "render": function(data) {
                            var n=cat.replace(/ /g, "");;
                            return '<img src="categorias/'+n+"/" + data + '" width="100%;">';
                          }
                        },
                        {
                            data: 'titulo',

                            "render": function(data) {
                                  var n=cat.replace(/ /g, "");;
                                  return '<img src="categorias/'+n+"/" + data + '" width="100%; style="margin: 2%;">';


                            }
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

                                  return '<button type="button" id="bed2" onclick="EliminaCat(' + data + ');" class="btn btn-secondary" style="width: 100%;" ><i class="fas fa-trash-alt"></i></button>';


                            }
                        },

                        {
                            sWidth: '7%',
                            orderable: false,
                            "render": function(data) {
                                return '<button type="button" id="bedv" onclick="VerEmpresa(' + data + ');" class="btn btn-info" style="width: 100%;"><i class="fas fa-eye" style="color:white;"></i></button>';
                            }
                        },

                        // {
                        //     sWidth: '7%',
                        //     orderable: false,
                        //     "render": function(data) {
                        //       if (n==1) {
                        //         return '<button type="button" data-toggle="tooltip" data-placement="top" title="Desactivar vacante" id="bed2" onclick="EliminaVacante(' + data + ');" class="btn btn-danger" style="width: 100%; display: '+dis+'"><i class="fas fa-trash-alt" style="color:white;"></i> </button>';
                        //
                        //       }else{
                        //         return '<button type="button" data-toggle="tooltip" data-placement="top" title="Reactivar vacante" id="react" onclick="ReactivaVacante(' + data + ');" class="btn btn-success" style="width: 100%; display: '+mos+'"><i class="fas fa-arrow-alt-circle-up"></i> </button>';
                        //
                        //       }
                        //     }
                        // },

                    ],
            });
        },
        error: function() {

        }
    });
  }


function IrLink(seleccion){
  var id;


  $("#tablecat").on('click', '#link', function(e) {
      e.preventDefault();
      var currentRow = $(this).closest("tr");
      var data = $('#tablecat').DataTable().row(currentRow).data();

      id = data['url_bolsa'];

      window.location = id;

  });
}


  function EditEmpresa(seleccion) {

      var id;


      $("#tablecat").on('click', '#bed', function(e) {
          e.preventDefault();
          var currentRow = $(this).closest("tr");
          var data = $('#tablecat').DataTable().row(currentRow).data();

          id = data['ID_categoria'];

          window.location = './EditarCategorias/' + id;
// qbR16j1SPA#RUESnTrJfqTvB
      });

  }






  function EliminaCat(seleccion) {

      var id;
      var nombre;

      $("#tablecat").on('click', '#bed2', function(e) {
          e.preventDefault();
          var currentRow = $(this).closest("tr");
          var data = $('#tablecat').DataTable().row(currentRow).data();

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


    $("#tablecat").on('click', '#bedv', function(e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var data = $('#tablecat').DataTable().row(currentRow).data();


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
