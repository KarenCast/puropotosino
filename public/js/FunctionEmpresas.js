$(document).ready(function() {


    setTimeout("getEmpresas();", 2000);


    // document.getElementById(res[4]).selected = "true";
    // document.getElementById(res[3]).selected = "true";
});




function getEmpresas() {
    // var acti = $("#activas").val();

    var url="./getEmpresas";
    if (document.getElementById("activas").checked == false) {
      document.querySelector('#etiqueta1').innerText = 'FISICAS';
      document.getElementById("vacactivas").style.backgroundColor = "#c1f0c8";
      document.querySelector('#curp_rfc').innerText = 'CURP';
      document.querySelector('#nombre_rs').innerText = 'Nombre';
      console.log("activa");
      n=1;
      s='>=';
      dis="show";
      mos="none"
      getFisicas();
    }else {
      document.querySelector('#etiqueta1').innerText = 'MORALES';
      document.getElementById("vacactivas").style.backgroundColor = "#f0bdbd";
      document.querySelector('#curp_rfc').innerText = 'RFC';
      document.querySelector('#nombre_rs').innerText = 'Razon Social';
      n=0;
      s='<';
      dis="none";
      mos="show";
      getMorales();
    }

  }

function getFisicas(){

      $('#tableemp').dataTable().fnDestroy();
      $.ajax({
          url: "./getEmpresas",
          dataType: 'json',
          method: 'Get',
          success: function(r) {
              oTable = $('#tableemp').DataTable({
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
                              data: 'ID_empresa',
                              name: 'ID_empresa',
                          },
                          {
                              data: 'CURP',
                              name: 'CURP'
                          },
                          {
                              data: 'nombre',
                              name: 'nombre'
                          },

                          {
                              data: 'ID_empresa',

                              sWidth: '7%',
                              orderable: false,
                              "render": function(data) {

                                    return '<a href="./verEmpresa/'+data+'/1">Ver Empresa</a>';
                              }
                          },


                      ],
              });
          },
          error: function() {

          }
      });
}


function getMorales(){

      $('#tableemp').dataTable().fnDestroy();
      $.ajax({
          url: "./getEmpresasM",
          dataType: 'json',
          method: 'Get',
          success: function(r) {
              oTable = $('#tableemp').DataTable({
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
                              data: 'ID_empresa',
                              name: 'ID_empresa',
                          },
                          {
                              data: 'RFC',
                              name: 'RFC'
                          },
                          {
                              data: 'razonsocial',
                              name: 'razonsocial'
                          },
                          {
                              data: 'ID_empresa',

                              sWidth: '7%',
                              orderable: false,
                              "render": function(data) {

                                    return '<a href="./verEmpresa/'+data+'/0">Ver Empresa</a>';

                              }
                          },


                      ],
              });
          },
          error: function() {

          }
      });
}



function IrLink(seleccion){
  var id;


  $("#tableemp").on('click', '#link', function(e) {
      e.preventDefault();
      var currentRow = $(this).closest("tr");
      var data = $('#tableemp').DataTable().row(currentRow).data();

      id = data['url_bolsa'];

      window.location = id;

  });
}

  function EditEmpresa(seleccion) {

      var id;


      $("#tableemp").on('click', '#bed', function(e) {
          e.preventDefault();
          var currentRow = $(this).closest("tr");
          var data = $('#tableemp').DataTable().row(currentRow).data();

          id = data['ID_empresa'];

          window.location = '/ActualizarEmpresas/' + id;

      });

  }






  function EliminaEmpresa(seleccion) {

      var id;
      var nombre;

      $("#tableemp").on('click', '#bed2', function(e) {
          e.preventDefault();
          var currentRow = $(this).closest("tr");
          var data = $('#tableemp').DataTable().row(currentRow).data();

          id = data['ID_empresa'];
          nombre = data['nombre_empresa'];

          $("#id_emp").val(id);
          $("#desc_e").val(nombre);

          $("#modaleliminarvac").modal('show');

      });



  }



  function VerEmpresa(seleccion) {

    var id;
    var desc;
    var cant;
    var fini;
    var ffin;
    var sal;

    $("#tableemp").on('click', '#bedv', function(e) {
        e.preventDefault();
        var currentRow = $(this).closest("tr");
        var data = $('#tableemp').DataTable().row(currentRow).data();


        id = data['ID_empresa'];
        rfc = data['RFC_camara'];
        cant = data['url_bolsa'];
        fini = data['correo_contacto'];
        ffin = data['nombre_empresa'];
        sal = data['logo'];


        $("#id_e").val(id);
        $("#rfc_e").val(rfc);
        $("#url_e").val(cant);
        $("#correo_e").val(fini);
        $("#nombre_e").val(ffin);
        // $("#logo_e").val(sal);
        document.getElementById("logo_e").src = "Empresas/"+sal;



        console.log(desc);

        $("#modalverempresa").modal('show');

    });



}
