$(document).ready(function () {
    loadProducts(-1);

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
});


function loadProducts(CategoriaId) {
    //console.log(CategoriaId);
    var htmlPrd = "";

    $('#selectEmpresa').empty();
    $('#selectMarca').empty();
    $('#selectEmpresa').append(new Option('Todas', '-1'));
    $('#selectMarca').append(new Option('Todas', '-1'));

    $.ajax({
        url: "./api/getProductosFilter",
        dataType: 'json',
        method: 'post',
        data: {
            ID_categoria: CategoriaId

        },
        success: function (data) {
            if (data.data.length == 0)
                htmlPrd = '<h1>Categoria Sin Productos</h1>';
            else
                for (let index = 0; index < data.data.length; index++) {
                    const element = data.data[index];
                    //$('#selectEmpresa').append('<option value="' + element['ID_empresa'] + '">' + element['razonsocial'] + '</option>');

                    if ($("#selectEmpresa option[value=" + element['ID_empresa'] + "]").length == 0) {
                        $('#selectEmpresa').append(new Option(element['razonsocial'], element['ID_empresa']));
                    }
                    if ($("#selectMarca option[value=" + element['ID_marca'] + "]").length == 0) {
                        $('#selectMarca').append(new Option(element['nombre_marca'], element['ID_marca']));
                    }

                    htmlPrd += ' <div class="col-6 col-md-4 col-lg-4 E' + element['ID_empresa'] + ' M' + element['ID_marca'] + ' border-top </div>">' +
                        ' <div class="single-product">' +
                        ' <div class="product-img item">' +
                        ' <img' +
                        ' class="card-img img-fluid"' +
                        ' src="./Files/' + element['ID_empresa'] + '/Productos/' + element['imagen'] + '"' +
                        ' alt="" />' +
                        ' <div class="p_icon">' +
                        ' <a href="#"> <i class="far fa-eye"></i></a></div></div><div class="product-btm"><a href="#" class="d-block">' +
                        ' <h4>' + element['nombre'] + '</h4>' +
                        ' </a><div class="mt-3"><span class="mr-4">' + element['nombre_marca'] + '</span>' +
                        '<del>$35.00</del></div></div></div></div>';
                }
            $('#contentPrd').html(htmlPrd);
        },
        error: function () {
            console.error('error');
        }
    });
}
