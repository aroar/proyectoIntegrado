<?php
 include "index.php";
 include "conexionbd.php";
 $mysqli=conexion();
?>

<?php

 $peliculas = $mysqli->query("SELECT * from Pelicula ORDER BY FechadeEstreno DESC");

    while ($fila = $peliculas->fetch_assoc()) {
        echo "<div class='border border-info container mt-4'>";
        echo "<img src='imagenes/cartelera".$fila['idPelicula'].".jpg' height='300' width='200'>";
        echo $fila['Título']."<br>";
        echo $fila['Duración']." min | ".$fila['País']." | ".$fila['Género']." | ".$fila['Calificación']." | ".$fila['FechadeEstreno']."<br>";
        echo $fila['Sinopsis']."<br>";
        $idpeli=$fila['idPelicula'];
        $proyecciones = $mysqli->query("SELECT  DISTINCT Fecha from Proyeccion WHERE idPelicula =".$idpeli);
        while ($proyeccion = $proyecciones->fetch_assoc()) {
            $fecha=$proyeccion['Fecha'];
            echo $fecha."<br>";
            $horas=$mysqli->query("SELECT Hora from Proyeccion WHERE Fecha ='".$fecha."' AND idPelicula =".$idpeli);
            while ($horario = $horas->fetch_assoc()) {
                echo $horario['Hora']."  ";                
            }
            echo "<br>";

        
        }
        echo "</div>";
    }


?>

