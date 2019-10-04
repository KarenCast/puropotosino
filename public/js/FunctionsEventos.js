$(document).ready(function () {
    setDTData();
    $("#DTEventos").on('click', '.btnEdit', function (e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var dataTr = $('#DTEventos').DataTable().row(currentRow).data();
        //e.stopPropagation();
        //e.stopImmediatePropagation();
        setData(dataTr);

    });

    $('#btnNuevo').on('click', function (e) {
        $('#AgregarNuevo').html('Nuevo Evento');
        $('#blah').attr('src', "");
    });

    $('#confirm-delete').on('click', '.btn-ok', function (e) {
        var $modalDiv = $(e.delegateTarget);
        var id = $(this).data('id');
        var urlDelete = "./api/deleteEvento";

        $.ajax({
            url: urlDelete,
            dataType: 'text',
            type: "delete",
            data: {
                ID_evento: id,
            },
            success: function (r) {
                setDTData();
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

    $('#ModalAddNew').on('show.bs.modal', function (e) {
        document.getElementById("eventoSave").reset();
    });

    $("#foto").change(function () {
        readURL(this);
    });

});

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

function setDTData() {
    $('#DTEventos').dataTable().fnDestroy();

    $.ajax({
        url: "./api/getEventos",
        dataType: 'json',
        method: 'get',
        success: function (data) {
            oTable = $('#DTEventos').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'pageLength', 'excel'
                ],
                "data": data,
                "columns": [{
                        data: 'ID_evento',
                        name: 'Identificador'
                    },
                    {
                        data: 'fecha_evento',
                        name: 'Fecha/hora'
                    },
                    {
                        data: 'nombre_evento',
                        name: 'Nombre'
                    },
                    {
                        data: 'costo',
                        name: 'Costo'
                    },
                    {
                        data: 'tema',
                        name: 'Tema'
                    },
                    {
                        data: 'observaciones',
                        name: 'Observaciones'
                    },
                    {
                        data: 'requisitos',
                        name: 'Requisitos'
                    },
                    {
                        mDataProp: "ID_evento",
                        sWidth: '7%',
                        orderable: false,
                        "render": function (data) {
                            var btn = '<button type="button" class="btn btn-secondary btnEdit" style="width: 100%;"><i class="fa fa-edit" style="color:white"></i> </button>'
                            return btn;
                        }
                    },
                    {
                        mDataProp: "ID_evento",
                        sWidth: '7%',
                        orderable: false,
                        "render": function (data) {
                            var btn = '<button type="button" data-recordtitle="Se eliminara el evento, este proceso es irreversible." data-id="' + data + '"  data-toggle="modal" data-target="#confirm-delete"  class="btn btn-danger" style="width: 100%;"><i class="fas fa-trash-alt" style="color:white"></i> </button>'
                            return btn;
                        }
                    }
                ],
            });
        },
        error: function () {
            console.error('error');
        }
    });
}

function soloNumeros(e) {
    var keynum = window.event ? window.event.keyCode : e.which;

    if ((keynum == 8 || keynum == 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function setData(dataDT) {
   var im = "."+dataDT['foto'];
    $('#AgregarNuevo').html('Editar Evento');
    $('#ModalAddNew').modal('show');
    console.warn(dataDT);
    $('#ID_evento').val(dataDT['ID_evento']);
    $('#fecha_evento').val(dataDT['fecha_evento']);
    $('#nombre_evento').val(dataDT['nombre_evento']);
    $('#costo').val(dataDT['costo']);
    $('#tema').val(dataDT['tema']);
    $('#observaciones').val(dataDT['observaciones']);
    $('#requisitos').val(dataDT['requisitos']);

    $('#blah').attr('src', im);
}
