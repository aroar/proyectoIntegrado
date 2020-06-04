<?php
include "conexionbd.php";
$mysqli = conexion();
$tabla=$_POST['tabla'];
/* recibo los datos de ajax y según sea la tabla actualizo y recupero unos datos u otro */
if($tabla=="Sala"){

    $butacas=$_POST['butacas'];
    $tiposala=$_POST['tiposala'];
    $id=$_POST['idsala'];
    $mysqli->query("UPDATE Sala set Butacas='".$butacas."', Tipo='".$tiposala."' WHERE idsala =".$id);
    echo "sala ".$id." actualizada correctamente";

}else if($tabla=="Tarifa"){
    
    $id=$_POST['idtarifa'];
    $precio=$_POST['precio'];
    $definicion=$_POST['definicion'];
    $mysqli->query("UPDATE Tarifa set Precio=".$precio.", Definicion='".$definicion."' WHERE idTipo =".$id);
    echo "Tarifa ".$id." actualizada correctamente";
}else if($tabla=="Pelicula"){

    $id=$_POST['idpelicula'];
    $titulo=$_POST['titulo'];
    $año=$_POST['año'];
    $calificacion=$_POST['calificacion'];
    $estreno=$_POST['estreno'];
    $genero=$_POST['genero'];
    $duracion=$_POST['duracion'];
    $pais=$_POST['pais'];
    $sinopsis=$_POST['sinopsis'];

        if(!$mysqli->query("UPDATE Pelicula set Título='".$titulo."', País='".$pais."' , Género='".$genero."',  Duración='".$duracion."', FechadeEstreno='".$estreno."', Calificación='".$calificacion."',  Sinopsis='".$sinopsis."'  WHERE idPelicula =".$id)){
            printf("Errormessage: %s\n", $mysqli->error);

        }else{
            echo "La película ".$titulo." se ha actualizado correctamente";

        }
}else{
    $id=$_POST['idproyeccion'];
    $sala=$_POST['sala'];
    $pelicula=$_POST['pelicula'];
    $tarifa=$_POST['tarifa'];
    $hora=$_POST['hora'];
    $fecha=$_POST['fecha'];
    $mysqli->query("UPDATE Proyeccion set IdSala=".$sala.", idPelicula=".$pelicula." ,idTipo=".$tarifa.",  Fecha='".$fecha."', Hora='".$hora."' WHERE idProyeccion =".$id);
    echo "Proyeccion ".$id." actualizada correctamente";
}
