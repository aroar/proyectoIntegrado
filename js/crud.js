$(document).ready(function () {
  
  // metodo de elminacion generico para todos los campos les paso el id y la tabla
  

  $(".eliminar").click(function () {
    var id = $(this).attr('data');
    var tabla = $(this).attr('name');

    $.ajax({
      data: { id: id, tabla: tabla },
      url: 'delete.php', //archivo que recibe la peticion
      type: 'post', //método de envio
      success: function (returnResponseData) { 
        $localizacion=$(location).attr('pathname');
        //una vez que el archivo recibe el request lo procesa y lo devuelve
        alert("se ha eliminado correctamente");
        // recargo la pagina segun sea sala, tarifa..
        location.reload($localizacion);

      }
    });

  });

    // metodo de insert generico paso el formulario completo y segun recojo en php

  $("#forminsert").bind("submit",function(){
    $.ajax({
        type: $(this).attr("method"),
        url: $(this).attr("action"),
        data:$(this).serialize(),
        success: function(data){
          //obtengo mi archivo para actualizarlo y muestro el data del php que corresponda
         $localizacion=$(location).attr('pathname');
          alert(data);
          location.reload($localizacion);
        },
        error: function(data){
            // si la peticion es erronea
            alert("Problemas al tratar de enviar el formulario");
        }
    });
    // Nos permite cancelar el envio del formulario el submit
    return false;
}); 

//modificar generico, envio el formulario entero y segun el valor tabla ejecuto un metodo u otro en php


$(".formmodificar").bind("submit",function(){
  // Capturamnos el boton de envío

  $.ajax({
      type: $(this).attr("method"),
      url: $(this).attr("action"),
      data:$(this).serialize(),
      success: function(data){
        //obtengo mi archivo para actualizarlo y muestro el data del php que corresponda
       $localizacion=$(location).attr('pathname');
        alert(data);
        location.reload($localizacion);
      },
      error: function(data){
          // si la peticion es erronea
          alert("Problemas al tratar de enviar el formulario");
      }
  });
  // Nos permite cancelar el envio del formulario el submit
  return false;
});

});
