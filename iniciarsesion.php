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

<div class="container text-white" id="contenedorsesion">
          <div class=" mt-5 row justify-content-center page-header">
            <h2>Iniciar sesión</h2>
        </div>
<form class="form-horizontal" name="form-registro" role="form" method="post" action="iniciarsesion.php">
    <div class="form-group">
    <label for="exampleInputEmail1">Nombre de usuario</label>

        <input type="text" name="username" id="username" tabindex="1" class="form-control"  value="">
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Contraseña</label>
        <input type="password" name="password" id="password" tabindex="2" class="form-control">
    </div>
    <button type="submit" name="iniciarsesion" class="btn btn-danger mx-auto">Iniciar sesión</button>
    </form>
    <?php
        if(isset($_POST['iniciarsesion'])){

        //Sentencia SQL para buscar un usuario con esos datos
            $usuario=$_POST['username'];
            $contraseña=$_POST['password'];
            $consulta = "SELECT * FROM Usuario  WHERE Nombre ='".$usuario."' AND Psw='".$contraseña."'";
            
        //Ejecuto la sentencia y comprubeo si da fallos
            if(!$resultado = $mysqli->query($consulta)){
                echo $mysqli->error;
            }
            $dato = $resultado->fetch_assoc();
        
            // si encuentra en la bd mi usuario mirará si es admin o usuario normal y será redirigido según categoría
            if($dato>0){
                $_SESSION['nombre']=$usuario;
                $_SESSION['idusuario']=$dato['idCliente'];
                if($dato['Admin']==1){
                    header('Refresh: 1 , url=paneladministrador.php');
                }else{
                    echo '<div class="alert alert-dark" role="alert">
                   Bienvenido '.$usuario.', cargando nuestra cartelera!
                  </div>';
                    header('Refresh: 2 , url=cartelera.php');
                }
            
            }else{
                $_SESSION['nombre']=null;
                $_SESSION['idusuario']==null;
                echo '<div class="alert alert-danger" role="alert">
                El usuario no se encuentra registrado!
              </div>';                
            }
        }

    ?>
    <div class="text-center">
        <label style="font-family:fuentemenu; font-size:1.75rem;">¿No eres usuario de CineMax?</label><br>
        <a href="registro.php" tabindex="5" class= " btn btn-light ">CREAR UNA CUENTA</a>
    </div>

 </div>
</body>
</html>