<?php
include "index.php";
include "funciones.php";

?>
<html>

<head></head>
<script src="js/validarformularios.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<!-- Formulario validado con jquery validate 
que envia un email al correo de la empresa a traves de php mailer ya configurado-->

<body>
  <div class=" mt-5 row justify-content-center page-header">
    <h1>Contacta con nosotros</h1>
  </div>
  <form method="post" action="contacto.php" id="formulario-contacto" role="form" name="formcontacto">
    <div class=" mt-5 row justify-content-center text-white">
      <div class="form-group align-items-center w-50 ">
        <label for="exampleInputEmail1" class="m-1">Nombre</label>
        <input type="text" class="form-control m-1" name="nombre" id="nombre">
        <label for="exampleInputEmail1" class="m-1">Email</label>
        <input type="email" class="form-control m-1" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="inserte el email">
        <label for="exampleInputEmail1" class="m-1">Motivo por el cual contacta con nosotros: </label>

        <select class="custom-select custom-select-sm m-1" id="seleccion" name="seleccion">
          <option selected value="default">Elija una opción</option>
          <option value="sugerencias">Sugerencias</option>
          <option value="empleo">Empleo</option>
          <option value="reclamaciones">Reclamaciones</option>
        </select>
        <label for="exampleInputEmail1" class="m-1">Mensaje </label>
        <textarea class="form-control mt-1" id="exampleFormControlTextarea1" rows="3" name="areadetexto" id="areadetexto"></textarea>
        <button type="submit" name="send" class=" m-1 btn btn-danger mx-auto">Enviar</button>
        <?php

        if (isset($_POST['send'])) {
          // tomo los datos y envio a mi empresa el email con los datos del cliente
          $from = $_POST['email'];
          $name = $_POST['nombre'];
          $to = "mmaroaromero@gmail.com";
          $asunto = $_POST['seleccion'];
          $mensaje = $_POST['areadetexto'];
          $envio = enviaremail($from, $name, $to, $asunto, $mensaje);
          echo "<div class='alert alert-success ' role='alert'>$envio </div>";
        }
        ?>
      </div>

    </div>
  </form>

</body>

</html>