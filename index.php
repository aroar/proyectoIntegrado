<?php
session_start();
?>
<html>
    <head> 
        <title>Mushu cinema</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    </head>
    <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Aroa Cinema</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item ">
                  <a class="nav-link" href="cartelera.php"> Cartelera <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href=tarifas.php>Tarifas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contacto.php">Contacto</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="ubicacion.php">Ubicación</a>
                </li>
                <?php
                if($_SESSION['nombre']!=null){
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="reservar.php">Reservar</a>
                </li>
                <?php
                }
                ?>
              </ul>
            </div>
            <?php
                if($_SESSION['nombre']==null){
                ?>
            <a href="iniciarsesion.php" class="btn btn-primary" role="button"> Iniciar sesión</a>
            <?php
                }else{
               
            ?>
            <a href="cerrarsesion.php" class="btn btn-primary" role="button"> Cerrar sesión</a>
            <?php
            }
            ?>
          </nav>
    </body>
</html>