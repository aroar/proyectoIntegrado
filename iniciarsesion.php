<?php
 include "index.php";
 include "conexionbd.php";
 $mysqli=conexion();
?>
<html>
    <head></head>
    <script src="js/validarformularios.js"></script>
  <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
  <body>

<div class="container w5 text-white">
          <div class=" mt-5 row justify-content-center page-header">
            <h2>Iniciar sesión</h2>
        </div>
<form class="form-horizontal" name="form-registro" role="form" method="post" action="sesion.php">
    <div class="form-group">
    <label for="exampleInputEmail1">Nombre de usuario</label>

        <input type="text" name="username" id="username" tabindex="1" class="form-control"  value="">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
        <input type="password" name="password" id="password" tabindex="2" class="form-control">
    </div>
    <button type="submit" class="btn btn-danger mx-auto">Iniciar sesión</button>
    <div class="text-center">
        <a href="registro.php" tabindex="5" class="btn-register">No estoy registrado</a>
    </div>

 </div>
</body>
</html>