<?php
// TABLA QUE MUESTRA LAS RESERVAS ACTUALES DE UN USUARIO SI LAS TIENE Y SI NO UN MENSAJE
 include "index.php";
 require "conexionbd.php";
$mysqli = conexion();
$reservas = $mysqli->query("SELECT R.Butacas, R.idreservas, P.Fecha, P.Hora, P.IdSala, P.idPelicula, pe.idPelicula, pe.Título from Reserva R, Proyeccion P, Pelicula pe WHERE R.idUsuario=".$_SESSION['idusuario']." AND P.idProyeccion = R.idProyección AND pe.idPelicula = P.idPelicula" );
// compruebo si tiene reservar, si es así las muestro en una tabla sino muestro un mensaje informativo
if($reservas->fetch_assoc()>0) {

?>
<html>
<head></head>
<body>
<div class="mt-5 row justify-content-center page-header">
    <h1>Mis entradas reservadas</h1>
  </div>
<div class="d-flex justify-content-center">
    <table class=" table-responsive-md table table-bordered table-hover table-striped  table-light w-50 mt-5">
      <thead>
        <tr class="text-center">
          <th scope="col">Película</th>
          <th scope="col">Sala</th>
          <th scope="col">Fecha</th>
          <th scope="col">Hora</th>
          <th scope="col">Num. Entradas</th>


        </tr>
      </thead>
      <tbody>
        <?php
        // select de tres tablas para que los datos le queden más claros al usuario, el usuario lo recojo por la sesión actual
        $reservas = $mysqli->query("SELECT R.Butacas, R.idreservas, P.Fecha, P.Hora, P.IdSala, P.idPelicula, pe.idPelicula, pe.Título from Reserva R, Proyeccion P, Pelicula pe WHERE R.idUsuario=".$_SESSION['idusuario']." AND P.idProyeccion = R.idProyección AND pe.idPelicula = P.idPelicula" );
        while ($fila = $reservas->fetch_assoc()) {
        ?>
          <tr class="text-center">
            <td ><?php echo $fila['Título'] ?></td>
            <td><?php echo $fila['IdSala'] ?></td>
            <td><?php echo date("d-m-Y", strtotime($fila['Fecha'])) ?></td>
            <td><?php echo $fila['Hora'] ?></td>
            <td><?php echo $fila['Butacas'] ?></td>

          </tr>

        <?php } ?>
      </tbody>
    </table>
  </div>
  <?php 
  }else{
      // mensaje informativo si no hubiese entradas reservadas por este usuario
      echo "<div class='container m-2'><h2> No tiene ninguna entrada  actualmente, para comprar entradas pulse <em> Reserva</em> en el menu principal</h2></div>";
      }?>
</body>
</html>