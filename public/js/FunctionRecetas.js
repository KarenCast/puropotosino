$(document).ready(function () {

    setTimeout("getCont();", 2000);

    $('#confirm-delete').on('show.bs.modal', function (e) {
        var data = $(e.relatedTarget).data();

        if (typeof data.id2 !== "undefined") {
            console.log(data.id2);
            $('.btn-ok', this).data('id2', data.id2);
        } else
            $('.btn-ok', this).data('id2', data.id);
        $('.title', this).text(data.recordtitle);
        $('.btn-ok', this).data('id', data.id);
    });

    $('#confirm-delete').on('click', '.btn-ok', function (e) {
        var $modalDiv = $(e.delegateTarget);
        var id = $(this).data('id');
        var urlDelete = "./api/deleteReceta";

        $.ajax({
            url: urlDelete,
            //dataType: 'json',
            type: "Delete", 
            data: {
                Id_delete: id               
            },
            success: function (r) {
                console.warn(r);
                getCont();
                $modalDiv.addClass('loading');
                setTimeout(function () {
                    $modalDiv.modal('hide').removeClass('loading');
                }, 1000);
            },
            error: function (e) {
                console.log(e);
                console.log('error');
                $modalDiv.modal('hide');
            }
        });
    });
});

function getCont() {
    $('#tablerec').dataTable().fnDestroy();
    $.ajax({
        url: "./getRec/",
        dataType: 'json',
        method: 'Get',
        success: function (r) {
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
                        mDataProp: "ID_contenido",
                        orderable: false,
                        "render": function (data) {
                            return '<button type="button" id="bed" onclick="EditEmpresa(' + data + ');" class="btn btn-secondary" style="width: 100%;" ><i class="fa fa-edit" style="color:white;"></i></button>';
                        }
                    },
                    {
                        sWidth: '7%',
                        mDataProp: "ID_contenido",
                        orderable: false,
                        "render": function (data) {
                            var btn = '<button type="button" data-recordtitle="Se eliminara la receta, este proceso es irreversible." data-id="' + data + '"  data-toggle="modal" data-target="#confirm-delete"  class="btn btn-danger" style="width: 100%;"><i class="fas fa-trash-alt" style="color:white"></i> </button>'
                            return btn;
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

    //console.log(seleccion);
    window.location = './ActualizarContenido/' + seleccion;

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
