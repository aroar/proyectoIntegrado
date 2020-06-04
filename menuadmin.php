<?php
session_start();
?>
<html>
<!-- Menu de la zona administradora donde se puede eliminar, añadir o modificar valores -->

<head>
  <title>CINEMAX </title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<script src="http://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.js"></script>

<body>
  <nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="menuadmin.php" id="tituloadmin">CINEMAX admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link text-dark" href="proyeccionesadmin.php"> Proyecciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href=tarifasadmin.php>Tarifas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="salasadmin.php">Salas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="peliculasadmin.php">Películas</a>
        </li>
      </ul>
    </div>
    <?php
    if ($_SESSION['email'] == null) {
    ?>
      <a href="iniciarsesion.php" class="btn btn btn-danger" role="button"> Identificate</a>
    <?php
    } else {
    ?>
      <a href="cerrarsesion.php" class="btn btn-danger" role="button"> Cerrar sesión</a>
    <?php
    }
    ?>
  </nav>

</body>

</html>