<?php
include 'menuadmin.php';
require "conexionbd.php";
$mysqli = conexion();
?>
<html>

<head></head>
<script type="text/javascript" src="js/crud.js"></script>

<body>
    <div class="containertarifaadmin">
        <h2>Insertar Película</h2>
        <table style="width:auto;" class="tablatarifaadmin table table-light table-bordered table-hover">
            <tr>
                <th scope="col">Título</th>
                <th scope="col">Año</th>
                <th scope="col">Calificación</th>
                <th scope="col">Estreno</th>
                <th scope="col">Genero</th>
                <th scope="col">Duracion</th>
                <th scope="col">País</th>
                <th scope="col">Sinopsis</th>
                <th scope="col"></th>

            </tr>
            <tbody>
                <tr>
                    <!-- Insertar pelicula, enviando form por ajax y recibido por php -->
                    <form id="forminsert" method="post" action="insertar.php">
                        <input type="text" name="tabla" value="Pelicula" hidden>
                        <td><input type="text" name="titulo"></td>
                        <td><input type="text" size="4" name="año"></td>
                        <td><input type="text" size="2" name="calificacion"></td>
                        <td><input type="text" size="10" name="estreno"></td>
                        <td><input type="text" name="genero"></td>
                        <td><input type="text" size="3" name="duracion"></td>
                        <td><input type="text" size="10" name="pais"></td>
                        <td><input type="text" name="sinopsis"></td>
                        <td><input type="submit" id="btninsertar" name="btninsertar" value="insertar"></td>
                    </form>

                </tr>
            </tbody>
        </table>
        <!-- SE ELIMINA O MODIFICAN LOS DATOS MANDADOS POR AJAX A UN ARCHIVO CRUD DE PHP -->
        <br>
        <h2>Modificar|Eliminar</h2>


        <table style="width:auto;" class="tablatarifaadmin table table-light table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">idPelicula</th>
                    <th scope="col">Título</th>
                    <th scope="col">Año</th>
                    <th scope="col">Calificación</th>
                    <th scope="col">Estreno</th>
                    <th scope="col">Genero</th>
                    <th scope="col">Duracion</th>
                    <th scope="col">País</th>
                    <th scope="col">Sinopsis</th>
                    <th scope="col"></th>
                    <th scope="col"></th>

                </tr>
            </thead>
            <tbody>
                <?php
                $salas = $mysqli->query("SELECT * from Pelicula");
                while ($fila = $salas->fetch_assoc()) {
                ?>
                    <form class="formmodificar" method="post" action="update.php" name="formmodificar">
                        <tr class="text align-center">
                            <input type='text' hidden value='Pelicula' name='tabla'>
                            <td><input type="text" maxlength="2" size="2" class="idPelicula" value="<?php echo $fila['idPelicula'] ?>" name="idpelicula" readonly></td>
                            <td><input type="text" value="<?php echo $fila['Título'] ?>" name="titulo"></td>
                            <td><input type="text" maxlength="4" size="4" value="<?php echo $fila['Año'] ?>" name="año"></td>
                            <td><input type="text" maxlength="2" size="2" value="<?php echo $fila['Calificación'] ?>" name="calificacion"></td>
                            <td><input type="text" maxlength="12" size="12" value="<?php echo $fila['FechadeEstreno'] ?>" name="estreno"></td>
                            <td><input type="text" maxlength="6" size="6" value="<?php echo $fila['Género'] ?>" name="genero"></td>
                            <td><input type="text" maxlength="3" size="3" value="<?php echo $fila['Duración'] ?>" name="duracion"></td>
                            <td><input type="text" maxlength="10" size="10" value="<?php echo $fila['País'] ?>" name="pais"></td>
                            <td><input type="text" value="<?php echo $fila['Sinopsis'] ?>" name="sinopsis"></td>

                            <td><input type="submit" class="modificar" value="modificar" name="modificar"></td>
                            <td><input type="button" name="Pelicula" class="eliminar" value="eliminar" data="<?php echo $fila['idPelicula'] ?>" name="eliminar"></td>

                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>