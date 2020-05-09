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
<div class="mt-5 row justify-content-center page-header">
            <h1>Elija Fecha y hora para reservar entradas: </h1>
      </div>
<?php
 $peliculas = $mysqli->query("SELECT DISTINCT idPelicula from Proyeccion");
 while ($fila = $peliculas->fetch_assoc()) {
    echo "<div class=' container mt-2 w-25' id='contenedorReservas'>";
        echo "<img src='imagenes/cartelera".$fila['idPelicula'].".jpg' id='imgreserva'>";
        $proyecciones = $mysqli->query("SELECT  DISTINCT Fecha from Proyeccion WHERE idPelicula =".$fila['idPelicula']." ORDER BY Fecha");
        echo "<div id='contenidoreservas'>";
        while ($proyeccion = $proyecciones->fetch_assoc()) {
            $newDate = date("d-m-Y", strtotime($proyeccion['Fecha']));
          
            echo "<h3 id='fecha' value='".$proyeccion['Fecha']."'>".$newDate."</h3>";
            $horas=$mysqli->query("SELECT Hora, idProyeccion from Proyeccion WHERE Fecha ='".$proyeccion['Fecha']."' AND idPelicula =".$fila['idPelicula']);
            while ($horario = $horas->fetch_assoc()) {
                $hora=$horario['Hora'];  
            echo '<button id="spanhora" class="spanhora btn btn-light" value="'.$horario['idProyeccion'].'">'.$hora.'</button>';
            }
        
        }
        echo "</div>";
        echo "</div>";

    }


?>
</body>
</head>
</html>

