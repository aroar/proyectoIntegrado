<?php
include "conexionbd.php";
$mysqli = conexion();
//  paso por ajax el id de la fila y el nombre de la tabla para hacer el delete adecuado
$id=$_POST["id"];
$tabla=$_POST['tabla'];
// delete generico segun la tabla enviada por el formulario
if($tabla == "Sala"){
    if ($mysqli->query('DELETE FROM '.$tabla.' WHERE idsala = '.$id) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    } 
}else if($tabla=="Pelicula"){
    if ($mysqli->query('DELETE FROM '.$tabla.' WHERE idPelicula = '.$id) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    } 
}else if($tabla=="Proyeccion"){
    if ($mysqli->query('DELETE FROM '.$tabla.' WHERE idProyeccion = '.$id) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    } 
}else{
    if ($mysqli->query('DELETE FROM '.$tabla.' WHERE idTipo = '.$id) === TRUE) {

    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    } 
}
?>