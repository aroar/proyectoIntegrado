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
        <h2>Insertar proyeccion</h2>
        <table style="width:auto;" class="tablatarifaadmin table table-light table-bordered table-hover">
            <tr>
                <th scope="col">Sala</th>
                <th scope="col">Pelicula</th>
                <th scope="col">Tarifa</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col"></th>

            </tr>
            <tbody>
                <tr>
                    <!-- AJAX Y PHP, EN ESTE CASO OBLIGO MEDIANTE SELECT A ELEGIR PELICULAS, SALAS Y TARIFAS
    QUE REALMENTE EXISTAN EN NUESTRA BASE DE DATOS Y DEJO LIBERTAD EN HORA Y FECHA -->
                    <form id="forminsert" method="post" action="insertar.php">
                        <input type="text" name="tabla" value="Proyeccion" hidden>
                        <td>
                            <select name="salas">
                                <?php
                                $salas = $mysqli->query("SELECT * from Sala");
                                while ($fila = $salas->fetch_assoc()) {
                                    echo "<option value='" . $fila['idsala'] . "'>" . $fila['idsala'] . "</option>";
                                } ?>
                            </select>
                        </td>
                        <td>
                            <select name="peliculas">
                                <?php

                                $pelis = $mysqli->query("SELECT * from Pelicula");
                                while ($fila = $pelis->fetch_assoc()) {
                                    echo "<option value='" . $fila['idPelicula'] . "'>" . $fila['Título'] . "</option>";
                                } ?>
                            </select>
                        </td>
                        <td>
                            <select name="tarifas">
                                <?php

                                $tarifas = $mysqli->query("SELECT * from Tarifa");
                                while ($fila = $tarifas->fetch_assoc()) {
                                    echo "<option value='" . $fila['idTipo'] . "'>" . $fila['Definicion'] . "</option>";
                                } ?>
                            </select>
                        </td>
                        <td><input type="text" name="Fecha" placeholder="yyyy-mm-dd"></td>
                        <td><input type="text" name="Hora" placeholder="hh:hh:hh"></td>
                        <td><input type="submit" id="btninsertar" name="btninsertar" value="insertar"></td>
                    </form>

                </tr>
            </tbody>
        </table>
        <br>


        <h2>Modificar|Eliminar proyeccion</h2>

        <table style="width:auto;" class="tablatarifaadmin table table-light table-bordered table-hover ">
            <thead>
                <tr>
                    <th scope="col">idProyeccion</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Pelicula</th>
                    <th scope="col">Tarifa</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Hora</th>
                    <th scope="col"></th>


                </tr>
            </thead>
            <tbody>
                <?php
                $salas = $mysqli->query("SELECT * from Proyeccion");
                while ($fila = $salas->fetch_assoc()) {
                ?>
                    <form class="formmodificar" method="post" action="update.php" name="formmodificar">
                        <tr class="text align-center">
                            <input type='text' hidden value='Proyeccion' name='tabla'>
                            <td><input type="text" maxlength="4" size="4" class="idproyeccion" value="<?php echo $fila['idProyeccion'] ?>" name="idproyeccion" readonly></td>
                            <td>
                                <select name="sala">
                                    <?php
                                    $salamod = $mysqli->query("SELECT * from Sala");
                                    while ($filasala = $salamod->fetch_assoc()) {
                                        if ($filasala['idsala'] == $fila['IdSala']) {
                                            echo "<option value='" . $filasala['idsala'] . "' selected>" . $filasala['idsala'] . "</option>";
                                        } else {
                                            echo "<option value='" . $filasala['idsala'] . "' >" . $filasala['idsala'] . "</option>";
                                        }
                                    } ?>
                                </select>
                            </td>
                            <td>
                                <select name="pelicula">
                                    <?php
                                    $pelimod = $mysqli->query("SELECT * from Pelicula");
                                    while ($filapeli = $pelimod->fetch_assoc()) {
                                        if ($filapeli['idPelicula'] == $fila['idPelicula']) {
                                            echo "<option value='" . $filapeli['idPelicula'] . "' selected>" . $filapeli['Título'] . "</option>";
                                        } else {
                                            echo "<option value='" . $filapeli['idPelicula'] . "' >" . $filapeli['Título'] . "</option>";
                                        }
                                    } ?>
                                </select>
                            </td>
                            <td>

                                <select name="tarifa">
                                    <?php
                                    $tarifamod = $mysqli->query("SELECT * from Tarifa");
                                    while ($filatarifa = $tarifamod->fetch_assoc()) {
                                        if ($filatarifa['idTipo'] == $fila['idTipo']) {
                                            echo "<option value='" . $filatarifa['idTipo'] . "' selected>" . $filatarifa['Definicion'] . "</option>";
                                        } else {
                                            echo "<option value='" . $filatarifa['idTipo'] . "' >" . $filatarifa['Definicion'] . "</option>";
                                        }
                                    } ?>
                                </select>




                            </td>
                            <td><input type="text" maxlength="10" size="10" value="<?php echo $fila['Fecha'] ?>" name="fecha"></td>
                            <td><input type="text" maxlength="8" size="8" value="<?php echo $fila['Hora'] ?>" name="hora"></td>

                            <td><input type="submit" class="modificar" value="modificar" name="modificar">
                                <input type="button" name="Proyeccion" class="eliminar" value="eliminar" data="<?php echo $fila['idProyeccion'] ?>" name="eliminar">
                            </td>

                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>