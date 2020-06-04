<?php
include "index.php";
?>
<html>

<head>
    <title></title>
</head>
<!-- FORMULARIO DE REGISTRO CON BOOTSTRAP Y VALIDADO CON JQUERY VALIDATE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="js/validarformularios.js"></script>

<body>
    <div class="form-group container h-100">
        <div class="row justify-content-center">
            <div class="col-sm-8 aling-self-center mt-5 h-100">
                <form name="form-registro" id="form-registro" action="registrobd.php" method="post" role="form">
                    <div class="form-group">
                        <h3>Nombre de usuario:</h3>
                        <input type="text" name="nombreusuario" id="nombreusuario" tabindex="1" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <h3>Email:</h3>
                        <input type="email" name="emailregistro" id="emailregistro" tabindex="1" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <h3>Contraseña:</h3>
                        <input type="password" name="password" id="password" tabindex="2" class="form-control">
                    </div>
                    <div class="form-group">
                        <h3>Repita su contraseña:</h3>
                        <input type="password" name="confirmpassword" id="confirmpassword" tabindex="2" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-2 ">
                            <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-light" value="Crear cuenta">
                        </div>
                    </div>
            </div>
        </div>
        </form>
    </div>
</body>

</html>