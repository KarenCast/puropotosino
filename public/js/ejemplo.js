$(document).ready(function() {

  console.log("inicio");
    setTimeout("getProd();", 2000);


    // document.getElementById(res[4]).selected = "true";
    // document.getElementById(res[3]).selected = "true";
});




function getProd() {

// var tipo = $.ajax({
//     url: "./getProductos",
//     dataType: 'json',
//     method: 'Get',
//     success: function(r) {
//       console.log("exito");
//     },
//     error: function() {
//       console.log("fail");
//     }});
//
// console.log(tipo);

console.log("hello");
var xmlhttp = new XMLHttpRequest();
var url = "./getProductoEjemplo";
xmlhttp.onreadystatechange=function() {
   if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     var array = xmlhttp.responseText;
     var i;

      var obj = JSON.parse(array);


     var out = "<p>"+obj;

     out += "</p>";
     document.getElementById("resultado").innerHTML = out;
   }
}


  xmlhttp.open("GET", url, true);
  xmlhttp.send();
}
