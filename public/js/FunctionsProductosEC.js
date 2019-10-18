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

function showperpage(page){
    var totalp = $("#totalpages").val();
  for (let index = 1; index <= totalp; index++) {


          if (page.value != index)
              $(".page" + index).css("display", "none");
          else
              $(".page" + index).css("display", "block");

  }
  console.log(page.value);
}

function loadProducts(CategoriaId, tipo) {
    //console.log(CategoriaId);
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
            if (data.data.length == 0){
                htmlPrd = '<h1>Categoria Sin Productos</h1>';
            }else{
                for (let index = 0; index < data.data.length; index++) {


                  if ((index/24)>=i) {
                    i++;
                  }

                    const element = data.data[index];
                    //$('#selectEmpresa').append('<option value="' + element['ID_empresa'] + '">' + element['razonsocial'] + '</option>');

                    if ($("#selectEmpresa option[value=" + element['ID_empresa'] + "]").length == 0) {
                        $('#selectEmpresa').append(new Option(element['razonsocial'], element['ID_empresa']));
                    }
                    if ($("#selectMarca option[value=" + element['ID_marca'] + "]").length == 0) {
                        $('#selectMarca').append(new Option(element['nombre_marca'], element['ID_marca']));
                    }

                    htmlPrd += ' <div class="col-6 col-md-4 col-lg-4 E' + element['ID_empresa'] + ' M' + element['ID_marca'] + ' border-top  page'+i+'">' +
                        ' <div class="single-product" onclick="mostrarProducto('+element['ID_producto']+')">' +
                        ' <div class="product-img item">' +
                        ' <img' +
                        ' class="card-img img-fluid"' +
                        ' src="./Files/' + element['ID_empresa'] + '/Productos/' + element['imagen'] + '"' +
                        ' alt="" />' +
                        ' <div class="p_icon">' +
                        ' <a href="#"> <i class="far fa-eye"></i></a></div></div><div class="product-btm"><a href="#" class="d-block">' +
                        ' <h4>' + element['nombre'] + '</h4>' +
                        ' </a><div class="mt-3"><span class="mr-4">' + element['nombre_marca'] + '</span>' +
                        '<br>'+element['razonsocial']+'</div></div></div></div>'+
                        '<input style="display:none" type="text" id="descripcion'+element['ID_producto']+'" value="'+element['descripcionproducto']+'">'+
                        '<input style="display:none" type="text" id="imagen'+element['ID_producto']+'" value="'+element['imagen']+'">'+
                        '<input style="display:none" type="text" id="log'+element['ID_producto']+'" value="'+element['disenio_imagen']+'">'+
                        '<input style="display:none" type="text" id="nombre'+element['ID_producto']+'" value="'+element['nombre']+'">'+

                        '<input style="display:none" type="text" id="marca'+element['ID_producto']+'" value="'+element['nombre_marca']+'">'+
                        '<input style="display:none" type="text" id="razon'+element['ID_producto']+'" value="'+element['razonsocial']+'">'+

                        '<input style="display:none" type="text" id="in'+element['ID_producto']+'" value="'+element['instagram']+'">'+
                        '<input style="display:none" type="text" id="fb'+element['ID_producto']+'" value="'+element['facebook']+'">'+
                        '<input style="display:none" type="text" id="tw'+element['ID_producto']+'" value="'+element['twitter']+'">'+
                        '<input style="display:none" type="text" id="sw'+element['ID_producto']+'" value="'+element['stio_web']+'">'+

                        '<input style="display:none" type="text" id="id_emp'+element['ID_producto']+'" value="'+element['ID_empresa']+'">'+
                        '<input style="display:none" type="text" id="logo'+element['ID_producto']+'" value"'+element['disenio_imagen']+'">';




                }
                  htmlPrd += '<input type="text" name="totalpages" id="totalpages" value="'+i+'" style="display: none;"></input>';
              }
            $('#contentPrd').html(htmlPrd);
        },
        error: function () {
            console.error('error');
        }
    });
}


function mostrarProducto(element){


  var nombre = $("#nombre"+element).val();
  var desc = $("#descripcion"+element).val();

  var razon = $("#razon"+element).val();
  var marca = $("#marca"+element).val();
  var imagen_p = $("#imagen"+element).val();
  var imagen = $("#log"+element).val();
  var id_emp = $("#id_emp"+element).val();

  $("#nombre_e").val(nombre);
  $("#desc_e").val(desc);


    $("#marca_e").val(marca);
    $("#empresa_e").val(razon);

  document.getElementById("logo_e").src = "Logos/"+id_emp+"/"+imagen;
  document.getElementById("img_e").src = "Files/"+id_emp+"/Productos/"+imagen_p;
  $("#modalverproducto").modal('show');
}
