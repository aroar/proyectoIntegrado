<?php
include "index.php";
require "conexionbd.php";
$mysqli = conexion();
?>
<html>

<head></head>

<body>
    <div class="row">

        <?php
        /* Muestro todas las peliculas ordenas por fecha de estreno, y la valoracion haciendole la media  */
        $peliculas = $mysqli->query("SELECT * from Pelicula ORDER BY FechadeEstreno DESC");
        while ($fila = $peliculas->fetch_assoc()) {
            $idpeli = $fila['idPelicula'];
            $valoraciones = $mysqli->query("SELECT ROUND(AVG(Valoración),1) AS media from Valoración WHERE idPelicula='" . $idpeli . "'");
            $valor = $valoraciones->fetch_assoc();
        ?>

            <div class="card col-xs-8 col-sm-8 col-md-4 col-lg-4 col-xl-4">
                <div class="card-colums" style="width: 30rem;">
                    <div class="card-body">
                        <img class="card-img" src="imagenes/cartelera<?php echo $idpeli ?>.jpg">
                        <h5 class="card-title"><?php echo $fila['Título'] ?></h5>
                        <h6 class="card-subtitle mb-2"><?php echo $fila['Año'] . " | " . $fila['Duración'] . " min | " . $fila['País'] . " | " . $fila['Género'] . " | " . $fila['Calificación'] . " | " . $fila['FechadeEstreno'] ?></h6>
                        <p class="card-text"><?php echo $fila['Sinopsis'] ?></p>
                        <button type="button" class="btn btn-light">
                            Valoración <span class="badge badge-danger"><?php echo  $valor['media'] ?></span>
                        </button>

                    </div>
                </div>
            </div>

        <?php
        }
        ?>
    </div>

</body>

</html>