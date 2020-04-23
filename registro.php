<?php
include "index.php";
?>
<html>
<head> <title></title></head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
<script src="js/validarformularios.js"></script>
<body>
    <div class="form-group container h-100">
     <div class="row justify-content-center">
         <div class="col-sm-8 aling-self-center mt-5 h-100">
        <form name="form-registro" id="form-registro" action="registrobd.php" method="post" role="form">
            <div class="form-group">
                <input type="text" name="nombreusuario" id="nombreusuario" tabindex="1" class="form-control" placeholder="Usuario" value="">
            </div>
            <div class="form-group">
                <input type="email" name="emailregistro" id="emailregistro" tabindex="1" class="form-control" placeholder="Correo electronico" value="">
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
            </div>
            <div class="form-group">
                <input type="password" name="confirmpassword" id="confirmpassword" tabindex="2" class="form-control" placeholder="Confirmar contraseña">
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-2 ">
                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register mx-auto" value="Crear cuenta">
             </div>
        </div> 
    </div>
</div>
</form>
</div>
</body>
</html>