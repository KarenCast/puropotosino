

var rad = document.form.ope;
var prev = null;
for (var i = 0; i < rad.length; i++) {
    rad[i].addEventListener('change', function() {

        if(this.value=='t'){
          $("#fechaope").css("visibility", "hidden");
        }else {
              $("#fechaope").css("visibility", "visible");
        }
    });
}


var rad1 = document.form.incu;
var prev1 = null;
for (var i = 0; i < rad.length; i++) {
    rad1[i].addEventListener('change', function() {

        if(this.value=='t'){
          $("#tipo_incu").css("visibility", "visible");
        }else {
              $("#tipo_incu").css("visibility", "hidden");
        }
    });
}


var rad2 = document.form.altahacienda;
var prev2 = null;
for (var i = 0; i < rad.length; i++) {
    rad2[i].addEventListener('change', function() {

        if(this.value=='t'){
          $("#tipo_regimen").css("visibility", "visible");
        }else {
              $("#tipo_regimen").css("visibility", "hidden");
        }
    });
}




function versub() {
    $('option[name=subs]').css("display", "none");
    document.getElementById("subcat").value="";
    var x = document.getElementById("categoria").value;
    console.log(x);
    $("#"+x).css("display", "block");
}


function regimen2(){
  var tipor = $("#regimen").val();

  if ($("#regimen").val().trim()=='otro') {
    $("#tipo_regimen22").css("display", "block");
      $("#esp").css("display", "block");
  }else{

    $("#tipo_regimen22").css("display", "none");
    $("#esp").css("display", "none");
  }
}

function incubacion2(){


  if ($("#tipoincu").val().trim()=='otro') {
    $("#tipoincu2").css("display", "block");
      $("#esp2").css("display", "block");
  }else{

    $("#tipoincu2").css("display", "none");
    $("#esp2").css("display", "none");
  }
}
