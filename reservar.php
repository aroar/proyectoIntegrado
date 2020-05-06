<?php
include 'index.php';
include 'conexionbd.php';
$mysqli=conexion();
?>
<html>
<head><title></title>
<script type="text/javascript" src="js/jscookie/src/js.cookie.js"></script>
<script type="text/javascript" src="reservar.js"></script>
<body>
<?php
 $peliculas = $mysqli->query("SELECT DISTINCT idPelicula from Proyeccion");

    while ($fila = $peliculas->fetch_assoc()) {
    echo "<div class='border border-info container mt-4 w-25 d-inline-block'>";
        echo "<span><img src='imagenes/cartelera".$fila['idPelicula'].".jpg' height='300' width='200'><br>";
        $idpeli=$fila['idPelicula'];
        $proyecciones = $mysqli->query("SELECT  DISTINCT Fecha from Proyeccion WHERE idPelicula =".$idpeli);
        while ($proyeccion = $proyecciones->fetch_assoc()) {
            $fecha=$proyeccion['Fecha'];
            echo "<span class='badge badge-info spanfecha' id='spanfecha' value='".$fecha."'>".$fecha."</span>";
            echo "<br>";
            $horas=$mysqli->query("SELECT Hora, idProyeccion from Proyeccion WHERE Fecha ='".$fecha."' AND idPelicula =".$idpeli);
            while ($horario = $horas->fetch_assoc()) {
                $hora=$horario['Hora'];
                $idproyeccion=$horario['idProyeccion'];
                echo "<span class='spanhora' id='spanhora' value='".$idproyeccion."'>".$hora."</span> ";              
            }
            echo "<br>";
        
        }
    echo "</div>";
    }


?>
</body>
</head>
</html>

