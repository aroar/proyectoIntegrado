<?php
include "index.php";
include "conexionbd.php";

$mysqli=conexion();

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
            echo "<p>Bienvenido administrador.</p>";
			header('Refresh: 2 , url=paneladministrador.php');
        }else{
            echo "<p>Bienvenido $usuario.</p>";

			header('Refresh: 2 , url=cartelera.php');
        }
	
    }else{
		$_SESSION['nombre']=null;
		$_SESSION['idusuario']==null;
		echo "no autorizado será redirigido a la página principal";
		header('Refresh: 1 , url=index.php');

		
	}

?>
