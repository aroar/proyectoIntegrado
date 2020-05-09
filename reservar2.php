<?php
include 'conexionbd.php';
include 'index.php';
$mysqli=conexion();
?>
<html>
<head>
<tile> </title>
</head>
<script type="text/javascript" src="reservar.js"></script>
<body>

<?php
// me quedo con los datos de sesión del usuario y la cookie dónde tengo mi reserva
$idproyeccion=$_COOKIE['idproyeccion'];
$idusuario=$_SESSION['idusuario'];

//lanzo la información de confirmar la reserva
$proyeccion = $mysqli->query("SELECT * from Proyeccion WHERE idproyeccion='".$idproyeccion."'");
while ($proyecciones = $proyeccion->fetch_assoc()) {
    $tituloPeli= $mysqli->query("SELECT Título from Pelicula WHERE idPelicula='".$proyecciones['idPelicula']."'");
    $titulo = $tituloPeli->fetch_assoc();
    $tarifas= $mysqli->query("SELECT Precio from Tarifa WHERE idTipo='".$proyecciones['idTipo']."'");
    $preciotarifa=$tarifas->fetch_assoc();
    echo "<span id='preciotarifa'style='display:none'>".$preciotarifa['Precio']."</span>";

    
?>
<div  id="containerconfreserva" class='container w-50 justify-content center'>
        <form action='reservar2.php' method='post'>
            <h1><?php echo  $titulo['Título'] ?><h1>
            <h2><strong>Fecha: </strong><?php echo $proyecciones['Fecha']?></h2>
            <h2><strong>Hora: </strong><?php echo $proyecciones['Hora'] ?><strong> Sala </strong><?php echo $proyecciones['IdSala']?> </h2>
            
        <div class="row">

            <div class="col-lg-6">
                <div class="input-group">
                <span class="input-group-btn">
                    <button class="btn btn-danger" id="botonsuma" type="button">+</button>
                </span>
                <input type="text" name="numentradas" id="numentradas"readonly value='1'>
                <span class="input-group-btn">
                    <button class="btn btn-danger" id="botonresta" type="button">-</button>
                </span> 

                </div>

            </div>
        </div>
        <span>
         <p>Precio total: <span id='preciototal' name='preciototal' class='d-inline-block' ></span>€</p>       
        
         <button type='submit' id='btnreservar' name='btnreservar' class='btn btn-danger'>Reservar</button>
        </form>
</div>

<?php
}

    if(isset($_POST['btnreservar'])){
       
        // numero de butacas que ya están reservas de esa proyección
        $numbutacas = $mysqli->query("SELECT SUM(Butacas) as breservadas from Reserva WHERE idProyección='".$idproyeccion."'");
        $butacasreservadas = $numbutacas->fetch_assoc();
        $breservadas=$butacasreservadas['breservadas'];
         echo $breservadas;
        // número total de butacas permitida en la sala
        $butacastotal = $mysqli->query("SELECT Butacas from Sala WHERE idsala='".$sala."'");
        $btotal = $butacastotal->fetch_assoc();
        $btotales=$btotal['Butacas'];
        // numero de entradas a elegir en esta reserva
        $butacas=$_POST['numentradas'];
        //numero de reservas previas a la base de datos
        $reservaprevia=$breservadas+$butacas;

        if($reservaprevia>$btotales){
            $libres = $btotales-$breservadas;
            echo "<div class='alert alert-danger' role='alert'> Quedan solo ".$libres." entradas disponibles!</div>";
        }else{
                // envio de email
            $message="Aquí tiene la reserva de susc".$butacas." entradas ";
            $success = mail('mmaroaromero@gmail.com', 'Entradas de cine', $message);
            if (!$success) {
                $errorMessage = error_get_last()['message'];
                echo $errorMessage;
            }
            // inserción de la reserva en la base de datos
            if($mysqli->query("INSERT INTO Reserva (idUsuario, idProyección, Butacas)VALUES (".$idusuario.",".$idproyeccion.",".$butacas.")")==TRUE){
            }else{
                echo  $mysqli->error;
            };  
            // mensaje de reserva de exito y redirección a la cartelera
          echo'  <div class="alert alert-success" role="alert">
                <h4 class="alert-heading">Gracias por su compra!</h4>
                <p>Se ha enviado un email con su reserva</p>
                </div>';
            header('Refresh: 2 , url=cartelera.php');

        
        }
    
    }
?>
</body>
</html>
