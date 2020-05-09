<?php
session_start();
?>
<html>
    <head> 
        <title>CINEMAX </title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    </head>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <body>
        <nav id="menu" class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="principal.php" id="titulo">CINEMAX</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link text-light" href="cartelera.php"> CARTELERA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href=tarifas.php>TARIFAS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="contacto.php">CONTACTO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="ubicacion.php">UBICACION</a>
                </li>
                <?php
                if($_SESSION['nombre']!=null){
                ?>
                <li class="nav-item">
                  <a class="nav-link text-light" href="reservar.php">RESERVAR</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="valorarpelicula.php">VALORAR MIS PELICULAS</a>
                </li>
                <?php
                }
                ?>
              </ul>
            </div>
            <?php
                if($_SESSION['nombre']==null){
                ?>
            <a href="iniciarsesion.php" class="btn btn btn-danger" role="button"> Identificate</a>
            <?php
                }else{
               
            ?>
            <a href="cerrarsesion.php" class="btn btn-danger" role="button"> Cerrar sesion</a>
            <?php
            }
            ?>
          </nav>
    </body>
</html>