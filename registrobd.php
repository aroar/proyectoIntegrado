<?php
include "conexionbd.php";
$mysqli = conexion();

 $nombreusuario= $_POST['nombreusuario'];
 $emailregistro= $_POST['emailregistro'];
 $password= $_POST['password'];
/* Busco si el email está ya registrado en la base de datos */
 $consulta = ("SELECT * FROM Usuario  WHERE Mail ='".$emailregistro."'");
 $usuarioconsulta = $mysqli->query($consulta);
 $usuarioencontrado = $usuarioconsulta->fetch_assoc();
/* Sí esta registrado el email lanzo un mensaje y redirijo a iniciar sesión */

if($usuarioencontrado >0){
    echo "<p>Este email ya está registrado!.</p>";
    header('Refresh: 2 , url=iniciarsesion.php');
/* Sí no inserto en la base de datos el nuevo usuario y redirijo a iniciar sesión */
}else{

    $sql = ("INSERT INTO Usuario(Nombre,Mail,Psw,Admin) 
    VALUES ('".$nombreusuario."','".$emailregistro."','".$password."','0')");
if ($mysqli->query($sql) === TRUE) {

    echo "<p>Registro satisfactorio!.</p>";
    header('Refresh: 2 , url=iniciarsesion.php');
   
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}



}
 

?>