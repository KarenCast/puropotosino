$(document).ready(function () {
    loadProducts(idCategoriaSelect);

    setTimeout(function () {
        showperpage(1);
    }, 1000);

    $('#selectEmpresa').on('change', function () {
        var empresa = this.value;
        var empresas = document.getElementById("selectEmpresa").options;

        for (let index = 0; index < empresas.length; index++) {
            const element = empresas[index].attributes['value']['value'];

            if (empresa == -1)
                $(".M" + element).css("display", "block");
            else {
                if (empresa != element)
                    $(".M" + element).css("display", "none");
                else
                    $(".M" + element).css("display", "block");
            }

        }
    });

    $('#selectMarca').on('change', function () {
        var marca = this.value;
        var marcas = document.getElementById("selectMarca").options;

        for (let index = 0; index < marcas.length; index++) {
            const element = marcas[index].attributes['value']['value'];

            if (marca == -1)
                $(".M" + element).css("display", "block");
            else {
                if (marca != element)
                    $(".M" + element).css("display", "none");
                else
                    $(".M" + element).css("display", "block");

            }
        }
    });

    //
});

function backPage() {
    event.preventDefault();

    let elementos = document.getElementsByClassName('itemPagination active');
    var page = elementos[0].value;
    if (page > 1) {
        var back = page - 1;
        this.showperpage(back);
    }
}

function nextPage() {
    event.preventDefault();

    let elementos = document.getElementsByClassName('itemPagination active');
    let elementostotal = document.getElementsByClassName('itemPagination');
    let total = elementostotal.length;
    var page = elementos[0].value;

    if (page < total) {
        var next = page + 1;
        this.showperpage(next);
    }
}

function showperpage(page) {

    $("#numeros").css("display", "block");
    var totalp = $("#totalpa").val();
    for (let index = 1; index <= totalp; index++) {
        if (page != index) {
            $(".page" + index).css("display", "none");
            $("#page" + index).removeClass('active');
        } else {
            $(".page" + index).css("display", "block");
            $("#page" + index).addClass('active');
        }

    }
}


function todos() {
    $("#numeros").css("display", "none");
    var totalp = $("#totalpa").val();
    for (let index = 1; index <= totalp; index++) {
        $(".page" + index).css("display", "block");
    }
}


function loadProducts(CategoriaId, tipo) {
    var htmlPrd = "";

    var i = 1;
    var busqueda = $("#busqueda").val();
    $('#selectEmpresa').empty();
    $('#selectMarca').empty();
    $('#selectEmpresa').append(new Option('Todas', '-1'));
    $('#selectMarca').append(new Option('Todas', '-1'));

    $.ajax({
        url: "./api/getProductosFilter",
        dataType: 'json',
        method: 'post',
        data: {
            ID_categoria: CategoriaId,
            Tipo: tipo,
            Buscar: busqueda,
        },
        success: function (data) {
            if (data.data.length == 0) {
                htmlPrd = '<h1>Categoria Sin Productos</h1>';
            } else {
                for (let index = 0; index < data.data.length; index++) {
                    if ((index / 18) >= i) {
                        i++;
                    }
                    const element = data.data[index];
                    if ($("#selectEmpresa option[value=" + element['ID_empresa'] + "]").length == 0) {
                        $('#selectEmpresa').append(new Option(element['razon_social'], element['ID_empresa']));
                    }
                    if ($("#selectMarca option[value=" + element['ID_marca'] + "]").length == 0) {
                        $('#selectMarca').append(new Option(element['nombre_marca'], element['ID_marca']));
                    }

                    htmlPrd += ' <div class="col-6 col-md-4 col-lg-4 E' + element['ID_empresa'] + ' M' + element['ID_marca'] + ' border-top  page' + i + '">' +
                        ' <div class="single-product" onclick="mostrarProducto(' + element['ID_producto'] + ')">' +
                        ' <div class="product-img item">' +
                        ' <img' +
                        ' class="card-img img-fluid"' +
                        ' src="./Files/' + element['ID_empresa'] + '/Productos/' + element['imagen'] + '"' +
                        ' alt="" />' +
                        ' <div class="p_icon">' +
                        ' <a href="#"> <i class="far fa-eye"></i></a></div></div><div class="product-btm"><a href="#" class="d-block">' +
                        ' <h4>' + element['nombre'] + '</h4>' +
                        ' </a><div class="mt-3"><span class="mr-4">' + element['nombre_marca'] + '</span>' +
                        '<br>' + element['razon_social'] + '</div></div></div></div>' +
                        '<input style="display:none" type="text" id="descripcion' + element['ID_producto'] + '" value="' + element['descripcionproducto'] + '">' +
                        '<input style="display:none" type="text" id="imagen' + element['ID_producto'] + '" value="' + element['imagen'] + '">' +
                        '<input style="display:none" type="text" id="log' + element['ID_producto'] + '" value="' + element['disenio_imagen'] + '">' +
                        '<input style="display:none" type="text" id="nombre' + element['ID_producto'] + '" value="' + element['nombre'] + '">' +

                        '<input style="display:none" type="text" id="marca' + element['ID_producto'] + '" value="' + element['nombre_marca'] + '">' +
                        '<input style="display:none" type="text" id="razon' + element['ID_producto'] + '" value="' + element['razon_social'] + '">' +

                        '<input style="display:none" type="text" id="in' + element['ID_producto'] + '" value="' + element['instagram'] + '">' +
                        '<input style="display:none" type="text" id="fb' + element['ID_producto'] + '" value="' + element['facebook'] + '">' +
                        '<input style="display:none" type="text" id="tw' + element['ID_producto'] + '" value="' + element['twitter'] + '">' +
                        '<input style="display:none" type="text" id="sw' + element['ID_producto'] + '" value="' + element['stio_web'] + '">' +

                        '<input style="display:none" type="text" id="id_emp' + element['ID_producto'] + '" value="' + element['ID_empresa'] + '">' +
                        '<input style="display:none" type="text" id="logo' + element['ID_producto'] + '" value"' + element['disenio_imagen'] + '">';
                }
                htmlPrd += '<input type="text" name="totalpages" id="totalpages" value="' + i + '" style="display: none;"></input>';
            }
            $('#contentPrd').html(htmlPrd);
            showperpage(1);
        },
        error: function () {
            console.error('error');
        }
    });
}


function mostrarProducto(element) {
    var nombre = $("#nombre" + element).val();
    var desc = $("#descripcion" + element).val();

    var razon = $("#razon" + element).val();
    var marca = $("#marca" + element).val();
    var imagen_p = $("#imagen" + element).val();
    var imagen = $("#log" + element).val();
    var id_emp = $("#id_emp" + element).val();

    $("#nombre_e").val(nombre);
    $("#desc_e").val(desc);
    $("#marca_e").val(marca);
    $("#empresa_e").val(razon);

    $('#facebook').attr("href", ($("#fb" + element).val() == 'null') ? ('#') : ($("#fb" + element).val()));
    $('#twitter').attr("href", ($("#tw" + element).val() == 'null') ? ('#') : ($("#tw" + element).val()));
    $('#instagram').attr("href", ($("#in" + element).val() == 'null') ? ('#') : ($("#in" + element).val()));
    $('#sitio').attr("href", ($("#sw" + element).val() == 'null') ? ('#') : ($("#sw" + element).val()));

    document.getElementById("logo_e").src = "Logos/" + imagen;
    document.getElementById("img_e").src = "Files/" + id_emp + "/Productos/" + imagen_p;

    $("#modalverproducto").modal('show');
}


