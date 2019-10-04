$(document).ready(function () {

    setTimeout("getCont();", 2000);

    $('#confirm-delete').on('show.bs.modal', function (e) {
        var data = $(e.relatedTarget).data();
        $('.btn-ok', this).data('id2', data.id);
        $('.title', this).text(data.recordtitle);
        $('.btn-ok', this).data('id', data.id);
    });

    $('#confirm-delete').on('click', '.btn-ok', function (e) {
        var $modalDiv = $(e.delegateTarget);
        var id = $(this).data('id');
        var urlDelete = "./api/deleteContenido";
        
        
        $.ajax({
            url: urlDelete,
            //dataType: 'text',
            type: "delete",
            data: {
                Id_delete: id,
            },
            success: function (r) {
                getCont();
                $modalDiv.addClass('loading');
                setTimeout(function () {
                    $modalDiv.modal('hide').removeClass('loading');
                }, 1000);
            },
            error: function (e) {
                // console.log(e);
                // console.log('error');
                $modalDiv.modal('hide');
            }
        });
        
    });
});

function getCont() {

    var pathname = window.location.pathname;
    var cont;
    var test;
    if (pathname == './consultaRecetas') {
        cont = 0;
        test = 0;
        document.getElementById("vacactivas").style.display = "none";
    } else {
        cont = 1;

        if (document.getElementById("activas").checked == false) {
            test = '1';
            document.querySelector('#etiqueta1').innerText = 'IMAGENES';
        } else {
            test = '2';
            document.querySelector('#etiqueta1').innerText = 'VIDEOS';
        }
    }

    //console.log(pathname);

    var n = $("#tipoini").val();
    var rfc;

    $('#tableconte').dataTable().fnDestroy();
    $.ajax({
        url: "./getCont/" + cont + "/" + test,
        dataType: 'json',
        method: 'Get',
        success: function (r) {
            oTable = $('#tableconte').DataTable({
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
                        data: 'descripcion',
                        name: 'descripcion'
                    },
                    {
                        sWidth: '7%',
                        orderable: false,
                        "render": function (data) {
                            return '<button type="button" id="bed" onclick="EditEmpresa(' + data + ');" class="btn btn-secondary" style="width: 100%;" ><i class="fa fa-edit" style="color:white;"></i></button>';
                        }
                    },
                    {
                        mDataProp: "ID_contenido",
                        sWidth: '7%',
                        orderable: false,
                        "render": function (data) {

                            //return '<button type="button" id="bed2" onclick="EliminaCat(' + data + ');" class="btn btn-secondary" style="width: 100%;" ><i class="fas fa-trash-alt"></i></button>';
                            return '<button type="button" data-recordtitle="Se eliminara el testimonio, este proceso es irreversible." data-id="' + data + '"  data-toggle="modal" data-target="#confirm-delete"  class="btn btn-danger" style="width: 100%;"><i class="fas fa-trash-alt" style="color:white"></i> </button>';

                        }
                    },
                ],
            });
        },
        error: function () {

        }
    });
}


function EditEmpresa(seleccion) {

    var id;


    $("#tableconte").on('click', '#bed', function (e) {
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

    $("#tableconte").on('click', '#bed2', function (e) {
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


    $("#tableconte").on('click', '#bedv', function (e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var data = $('#tableconte').DataTable().row(currentRow).data();


        id = data['ID_categoria'];
        nom = data['nombre'];
        desc = data['descripcion'];
        imagen = data['imagen'];
        titulo = data['titulo'];

        $("#id_e").val(id);
        $("#nombre_e").val(nom);
        $("#desc_e").val(desc);

        var res = nom.replace(" ", "");
        var res = res.replace(" ", "");

        document.getElementById("imagen_e").src = "categorias/" + res + "/" + imagen;
        document.getElementById("titulo_e").src = "categorias/" + res + "/" + titulo;

        console.log(desc);

        $("#modalvercategoria").modal('show');

    });



}
