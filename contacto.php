<?php
 include "index.php";
?>
<html>
  <head></head>
  <script src="js/validarformularios.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
  <body>
    <div class=" mt-5 row justify-content-center page-header">
      <h1>Contacta con nosotros</h1>
    </div>
    <form method="post" action="contacto.php" id="formulario-contacto" role="form" name="formcontacto">
          <div class=" mt-5 row justify-content-center text-white">
            <div class="form-group align-items-center w-50 ">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="inserte el email">
              <label for="exampleInputEmail1">Motivo por el cual contacta con nosotros: </label>

              <select class="custom-select custom-select-sm "  id="seleccion" name="seleccion">
                <option selected value="default">Elija una opción</option>
                <option value="1">Sugerencias</option>
                <option value="2">Empleo</option>
                <option value="3">Reclamaciones</option>
              </select>
              <label for="exampleInputEmail1">Mensaje </label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="areadetexto" id="areadetexto"></textarea>
              <button type="submit" name="send" class="btn btn-danger mx-auto">Enviar</button>
            </div>
        </div>
    </form>
    <?php
    
              if(isset($_POST['send'])){
                echo  "<div class='text-white'>Enviar email y confirmacion de envio</div>";
              }

    ?>
</body>

</html>
