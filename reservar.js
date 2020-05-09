$(document).ready(function()
{  /* Al hacer click en la hora que queremos reservar, guardamos el id de la proyeccion 
    en una cookie para poder utilizarla en la reserva final y cargar los datos */
    $(".spanhora").click(function(){
          var idproyeccion=$(this).attr('value');
          Cookies.set('idproyeccion', idproyeccion);
          $(location).attr('href','reservar2.php');
        });

        $("#botonsuma").click(function(){
          var valor=parseInt($("#numentradas").val());
          if(valor<=9){
          $("#numentradas").val(valor+1);
          valor=parseInt($("#numentradas").val());
          var precio = parseInt($("#preciotarifa").text());
          $("#preciototal").text(precio*valor);
          }
   

        });

        $("#botonresta").click(function(){
          var valor=parseInt($("#numentradas").val());
          if(valor>=2){
            $("#numentradas").val(valor-1);
            valor=parseInt($("#numentradas").val());
          var precio = parseInt($("#preciotarifa").text());
          var preciototal=parseInt($("#preciototal").text());
          $("#preciototal").text(preciototal-precio);

          }

        });

    

});