$(document).ready(function () {


    setTimeout("getSubcat();", 2000);


    // document.getElementById(res[4]).selected = "true";
    // document.getElementById(res[3]).selected = "true";
});




function getSubcat() {
    // var acti = $("#activas").val();
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

    $('#tablesub').dataTable().fnDestroy();
    $.ajax({
        url: "./getSub",
        dataType: 'json',
        method: 'Get',
        success: function (r) {
            console.log(r);
            oTable = $('#tablesub').DataTable({
              scrollY:        "auto",
              scrollX:        true,
              scrollCollapse: true,
              paging:         false,
              columnDefs: [
                  { width: 70, targets: 0 }
              ],
              fixedColumns: true,
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
                        data: 'ID_subcategoria',
                        name: 'ID_subcategoria',
                    },
                    {
                        data: 'nombre',
                      
                        "render": function(data) {
                          cat=data;
                          return data;
                        }
                    },
                    {
                        data: 'descripcion',
                        name: 'descripcion'
                    },
                    {
                        data: 'imagen',
                        "render": function (data) {

                          var n=cat.replace(/ /g, "");;
                          return '<img src="subcategorias/'+n+"/" + data + '" width="70%;" style="margin: 5%;">';


                        }
                    },


                    {
                        mDataProp: "ID_subcategoria",
                        sWidth: '7%',
                        orderable: false,
                        "render": function (data) {

                            return '<button type="button" id="bed" onclick="EditEmpresa(' + data + ');" class="btn btn-secondary" style="width: 100%;" ><i class="fa fa-edit" style="color:white;"></i></button>';


                        }
                    },


                    {
                        sWidth: '7%',
                        orderable: false,
                        "render": function (data) {
                            return '<button type="button" id="bedv" onclick="VerEmpresa(' + data + ');" class="btn btn-info" style="width: 100%;"><i class="fas fa-eye" style="color:white;"></i></button>';
                        }
                    },
                    {

                        sWidth: '7%',
                        orderable: false,
                        "render": function (data) {

                            return '<button type="button" id="bed2" onclick="EliminaSub(' + data + ');" class="btn btn-secondary" style="width: 100%;" ><i class="fas fa-trash-alt"></i></i></button>';


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
        error: function () {

        }
    });
}


function IrLink(seleccion) {
    var id;


    $("#tablesub").on('click', '#link', function (e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var data = $('#tablesub').DataTable().row(currentRow).data();

        id = data['url_bolsa'];

        window.location = id;

    });
}

function EditEmpresa(seleccion) {

    var id;
    window.location = './actualizaSubcategoria/' + seleccion;
    /*
    $("#tablesub").on('click', '#bed', function (e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var data = $('#tablesub').DataTable().row(currentRow).data();

        id = data['ID_empresa'];

        window.location = '/ActualizarEmpresas/' + id;

    });
    */
}




function EliminaSub(seleccion) {

    var id;
    var nombre;

    $("#tablesub").on('click', '#bed2', function (e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var data = $('#tablesub').DataTable().row(currentRow).data();

        id = data['ID_subcategoria'];
        nombre = data['nombre'];

        $("#id_cat").val(id);
        $("#desc_cat").val(nombre);

        $("#modaleliminarsub").modal('show');

    });



}



function VerEmpresa(seleccion) {

    var id;
    var desc;
    var nom;
    var padre;
    var imagen;


    $("#tablesub").on('click', '#bedv', function (e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var data = $('#tablesub').DataTable().row(currentRow).data();


        id = data['ID_subcategoria'];
        nom = data['nombre'];
        desc = data['descripcion'];
        imagen = data['imagen'];

        padre = data['ID_categoria'];



        $("#id_e").val(id);
        $("#nombre_e").val(nom);
        $("#desc_e").val(desc);
        $("#imagen_e").val(imagen);
        $("#padre_e").val(padre);

        var res = nom.replace(" ", "");
        var res = res.replace(" ", "");
        var res = res.replace(" ", "");

        document.getElementById("imagen_e").src = "subcategorias/"+res+"/"+imagen;



        console.log(desc);

        $("#modalversub").modal('show');

    });



}
