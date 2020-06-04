<?php
include "index.php";
include "conexionbd.php";
$mysqli = conexion();
?>
<html>

<head>
    <title>Valorar películas</title>
</head>
<script type="text/javascript" src="js/crud.js"></script>

<body>
    <div class=" m-2 row justify-content-center page-header">
        <h1>Vota tus películas y forma parte de la comunidad CINEMAX </h1>
    </div>
    <?php
    // con el id del usuario, saco sus reservas y de ahí las proyecciones con join 
    $usuario = $_SESSION['idusuario'];
    $reservasusuario = $mysqli->query("SELECT Proyeccion.idPelicula,  Proyeccion.Fecha, Proyeccion.Hora FROM Proyeccion  INNER JOIN Reserva ON Reserva.idProyección = Proyeccion.idProyeccion AND Reserva.idUsuario='" . $usuario . "' Group by Proyeccion.idPelicula");
    // para comparar con las fechas de las proyecciones tomo el dia de hoy y la hora actual en su mismo formato
    $fecha_actual = date('Y-m-d');
    $hora_actual = date("H:m:s");

    while ($reservasu = $reservasusuario->fetch_assoc()) {
        $fecha = $reservasu['Fecha'] . "<br>";

        $horaproyeccion = $reservasu['Hora'];
        // Comparo si la fecha es superior a la proyección o sí es el mismo día si la hora es posterior
        //para mostrar las películas que puede valorar 

        echo "<div class='form-group row d-inline ' id='containervaloracion'>";
        if ($fecha_actual > $fecha || $fecha_actual == $fecha && $hora_actual < $horaproyeccion) {
            echo "<img src='imagenes/cartelera" . $reservasu['idPelicula'] . ".jpg' height='300' width='200' id='imgvaloracion'>";

    ?>
            <div class="input-group">

                <?php
    // si la pelicula ya fue valorada, no se le permite revalorar
                $peliculavalorada = $mysqli->query("SELECT Valoración FROM Valoración WHERE idUsuario ='" . $usuario . "'AND idPelicula='" . $reservasu['idPelicula'] . "'");
                if ($peliculavalorada->fetch_assoc() > 0) {
                    echo '<h3 class="mt-2" >Ya valoraste esta película <h3>';
                } else {
                ?>
                <!-- Puntuación del uno al cinco que se envia por ajax a el fichero insertar -->
                    <form action="insertar.php" method="post" name="forminsert" id="forminsert">
                        <input type="text" name="tabla" value="Valoracion" hidden>
                        <input type="hidden" name="idpeli" value="<?php echo $reservasu['idPelicula'] ?>">
                        <div class="btn-group btn-group-toggle mt-2 btngrupo" data-toggle="buttons">
                            <label class="btn btn-light btnvalor active">
                                <input type="radio" name="options" autocomplete="off" value="1"> 1
                            </label>
                            <label class="btn btn-light btnvalor">
                                <input type="radio" name="options" autocomplete="off" value="2"> 2
                            </label>
                            <label class="btn btn-light  btnvalor">
                                <input type="radio" name="options" autocomplete="off" value="3"> 3
                            </label>
                            <label class="btn btn-light  btnvalor">
                                <input type="radio" name="options" autocomplete="off" value="4"> 4
                            </label>
                            <label class="btn btn-light  btnvalor">
                                <input type="radio" name="options" autocomplete="off" value="5"> 5
                            </label>
                        </div>
                        <input type="submit" id="btnvalorar" name="btnvalorar" class="btn btn-light" value=" Valorar">
                    </form>
                <?php   }  ?>
            </div>
            </div>
    <?php

        }
    }

    ?>

</body>

</html>