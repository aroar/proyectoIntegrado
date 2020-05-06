<?php
 include "index.php";
 include "conexionbd.php";
 $mysqli=conexion();
?>
 <html>
 <head><title>Valorar películas</title></head>
 <body>
 <?php
 // con el id del usuario, saco sus reservas y de ahí las proyecciones con join 
$usuario=$_SESSION['idusuario'];
$reservasusuario = $mysqli->query("SELECT Proyeccion.idPelicula, Proyeccion.Fecha, Proyeccion.Hora FROM Proyeccion INNER JOIN Reserva ON Reserva.idProyección = Proyeccion.idProyeccion AND Reserva.idUsuario='".$usuario."'");
// para comparar con las fechas de las proyecciones tomo el dia de hoy y la hora actual en su mismo formato
$fecha_actual=date('Y-m-d');
$hora_actual=date("H:m:s");

while ($reservasu= $reservasusuario->fetch_assoc()) {
	
     $fecha=$reservasu['Fecha']."<br>";
     $horaproyeccion=$reservasu['Hora'];
// Comparo si la fecha es superior a la proyección o sí es el mismo día si la hora es posterior
//para mostrar las películas que puede valorar 
echo "<div class='form-group row d-inline'>";
if($fecha_actual>$fecha || $fecha_actual == $fecha && $hora_actual<$horaproyeccion){
    echo "<img src='imagenes/cartelera".$reservasu['idPelicula'].".jpg' height='300' width='200'>";

?>
  <div class="col-xs-2">
    <input class="form-control" id="valoracion" type="text">
    <button type="btnvalorar" id="btnvalorar" name="btnvalorar" class="btn btn-dark">Valorar</button>

  </div>
</div>

<?php
}else{
}

  }
 ?>


 </body>