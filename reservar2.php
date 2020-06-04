<?php
include 'conexionbd.php';
include 'index.php';
include 'funciones.php';
$mysqli = conexion();
?>
<html>

<head>
    <tile>
        </title>
</head>
<script type="text/javascript" src="js/reservar.js"></script>

<body>

    <?php
    // me quedo con los datos de sesión del usuario y la cookie dónde tengo mi reserva
    $idproyeccion = $_COOKIE['idproyeccion'];
    $idusuario = $_SESSION['idusuario'];

    //lanzo la información de confirmar la reserva
    $proyeccion = $mysqli->query("SELECT * from Proyeccion WHERE idproyeccion='" . $idproyeccion . "'");
    while ($proyecciones = $proyeccion->fetch_assoc()) {
        $sala = $proyecciones['IdSala'];
        $tituloPeli = $mysqli->query("SELECT Título from Pelicula WHERE idPelicula='" . $proyecciones['idPelicula'] . "'");
        $titulo = $tituloPeli->fetch_assoc();
        $tarifas = $mysqli->query("SELECT Precio from Tarifa WHERE idTipo='" . $proyecciones['idTipo'] . "'");
        $preciotarifa = $tarifas->fetch_assoc();
        echo "<span id='preciotarifa'style='display:none'>" . $preciotarifa['Precio'] . "</span>";


    ?>
        <div id="containerconfreserva" class='container  justify-content center'>
            <form action='reservar2.php' method='post'>
                <h2 class="tituloreserva"> Título de la película: <strong><?php echo  $titulo['Título'] ?></strong>
                    <h2>
                        <hr>

                        <h3 class="tituloreserva"><strong>Fecha: </strong><?php echo date("d-m-Y", strtotime($proyecciones['Fecha'])) ?></h3>
                        <h3 class="tituloreserva"><strong>Hora: </strong><?php echo $proyecciones['Hora'] ?><strong> </h3>
                        <h3 class="tituloreserva">Sala </strong><?php echo $proyecciones['IdSala'] ?> </h3>
                        <hr>

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="input-group " id="botonesreserva">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" id="botonsuma" type="button">+</button>
                                    </span>
                                    <input type="text" name="numentradas" id="numentradas" readonly value='1'>
                                    <button class="btn btn-danger" id="botonresta" type="button">-</button>
                                </div>

                            </div>
                        </div>
                        <p id="ptotal"><strong>Precio final </strong> <span id='preciototal' name='preciototal' class='d-inline-block'></span>.00€</p>
                        <button type='submit' id='btnreservar' name='btnreservar' class='btn btn-danger'>Reservar</button>
            </form>
  

    <?php
    }

    if (isset($_POST['btnreservar'])) {

        // numero de butacas que ya están reservas de esa proyección
        $numbutacas = $mysqli->query("SELECT SUM(Butacas) as breservadas from Reserva WHERE idProyección='" . $idproyeccion . "'");
        $butacasreservadas = $numbutacas->fetch_assoc();
        $breservadas = $butacasreservadas['breservadas'];
        // número total de butacas permitida en la sala
        $butacastotal = $mysqli->query("SELECT Butacas from Sala WHERE idsala='" . $sala . "'");
        $btotal = $butacastotal->fetch_assoc();
        $btotales = $btotal['Butacas'];
        // numero de entradas a elegir en esta reserva
        $butacas = $_POST['numentradas'];
        //numero de reservas previas a la base de datos
        $reservaprevia = $breservadas + $butacas;
        // aqui compruebo si el aforo está completo y muestro cuantas quedan disponibles al usuario si intentara comprar de más
        if ($reservaprevia > $btotales) {
            $libres = $btotales - $breservadas;
            echo "<div class='container alert alert-danger w-50' role='alert'> Quedan solo " . $libres . " entradas disponibles!</div>";
        } else {
            // envio de email por phpmailer con reserva
            $from = "mmaroaromero@gmail.com";
            $name = "usuario cinemax";
            $to = $_SESSION['email'];
            $asunto = "Reserva de entradas";
            $mensaje = " Ha reservado para la película <strong> " . $titulo['Título'] . "</strong> aquí tiene la confirmación de sus " . $butacas . " entradas para la  sala " . $sala . "<br> <strong> Disfrute de la película!</strong>";
            enviaremail($from, $name, $to, $asunto, $mensaje);
            // inserción de la reserva en la base de datos
            if ($mysqli->query("INSERT INTO Reserva (idUsuario, idProyección, Butacas)VALUES (" . $idusuario . "," . $idproyeccion . "," . $butacas . ")") == TRUE) {
            } else {
                echo  $mysqli->error;
            };
            // mensaje de reserva de exito y redirección a la cartelera
            echo '  <div class="alert alert-success w-50  mt-2 justify-content center " role="alert">
                <h4 class="alert-heading">Gracias por su compra!</h4>
                <p>Se ha enviado un email con su reserva</p>
                </div>';
            header('Refresh: 2 , url=cartelera.php');
        }
    }

    ?>
        </div>
</body>

</html>