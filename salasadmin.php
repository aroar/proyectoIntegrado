<?php
include 'menuadmin.php';
require "conexionbd.php";
$mysqli = conexion();
?>
<html>

<head></head>

<script type="text/javascript" src="js/crud.js"></script>
<!-- INSERCIÓN, MODIFICACIÓN Y ELIMINACIÓN A TRAVÉS DE AJAX EN CRUD.JS Y RECIBIDO POR PHP  -->

<body>
    <div class="containertarifaadmin">
        <h2>Insertar sala</h2>

        <table style="width:auto;" class="tablatarifaadmin table table-light table-bordered table-hover">
            <tr>
                <th scope="col">Num Butacas</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
            </tr>
            <tbody>
                <tr>
                    <form class="forminsertsala" id="forminsert" method="post" action="insertar.php">
                        <input type="text" name="tabla" value="Sala" hidden>
                        <td><input id="butacas" type="number" name="butacas"></td>
                        <td><input type="text" size="8" name="tiposala"></td>
                        <td><input type="submit" id="btninsertar" name="btninsertar" value="insertar"></td>
                    </form>

                </tr>
            </tbody>
        </table>
        <br>

        <h2>Modificar|Eliminar</h2>

        <table style="width:auto;" class="tablatarifaadmin table table-light table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">idSala</th>
                    <th scope="col">Num Butacas</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Modificar</th>
                    <th scope="col">Eliminar</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $salas = $mysqli->query("SELECT * from Sala");
                while ($fila = $salas->fetch_assoc()) {
                ?>
                    <form class="formmodificar" method="post" action="update.php" name="formmodificar">
                        <tr class="text align-center">
                            <?php
                            echo "<input type='text' hidden value='Sala' name='tabla'>";
                            echo " <td ><input type='text' value='" . $fila["idsala"] . "' name='idsala' readonly></td>";
                            echo " <td ><input type='text' value= '" . $fila["Butacas"] . "' name='butacas'></td>";
                            echo " <td ><input type='text' value= '" . $fila["Tipo"] . "' name='tiposala'></td>";

                            ?>
                            <td><input type="submit" class="modificar" value="modificar" name="modificar"></td>
                            <td><input type="button" name="Sala" class="eliminar" value="eliminar" data="<?php echo $fila['idsala'] ?>" name="eliminar"></td>
                        </tr>
                    </form>


                <?php } ?>
            </tbody>
    </div>
</body>

</html>