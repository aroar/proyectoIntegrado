$(document).ready(function () {  /* Al hacer click en la hora que queremos reservar, guardamos el id de la proyeccion 
    en una cookie para poder utilizarla en la reserva final y cargar los datos */
    // cargo los datos del precio en la web 
    var valor = parseInt($("#numentradas").val());
    var precio = parseInt($("#preciotarifa").text());
    $("#preciototal").text(precio * valor);

// CUANDO ELIJO UNA HORA DE RESERVA, ENVIO LOS DATOS COMO EL ID DE MI PROYECCION PARA PODER USARLO EN RESERVAR2

  $(".spanhora").click(function () {
    var idproyeccion = $(this).attr('value');
    Cookies.set('idproyeccion', idproyeccion);
    $(location).attr('href', 'reservar2.php');
  });
// CONTROL DE LA SUMA EN LA RESERVA Y DE MUESTRA DE LOS PRECIOS 
  $("#botonsuma").click(function () {
    var valor = parseInt($("#numentradas").val());
    if (valor <= 19) {
      $("#numentradas").val(valor + 1);
      valor = parseInt($("#numentradas").val());
      var precio = parseInt($("#preciotarifa").text());
      $("#preciototal").text(precio * valor);
    }


  });
// CONTROL DE LA RESTA EN LA RESERVA Y DE MUESTRA DE LOS PRECIOS 

  $("#botonresta").click(function () {
    var valor = parseInt($("#numentradas").val());
    if (valor >= 2) {
      $("#numentradas").val(valor - 1);
      valor = parseInt($("#numentradas").val());
      var precio = parseInt($("#preciotarifa").text());
      var preciototal = parseInt($("#preciototal").text());
      $("#preciototal").text(preciototal - precio);

    }

  });

 

  

});