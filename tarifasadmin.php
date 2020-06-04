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
        <h2>Insertar tarifa</h2>

        <table style="width:auto; " class=" tablatarifaadmin table table-light table-bordered table-hover ">
            <tr>
                <th scope="col">Definicion</th>
                <th scope="col">Precio</th>
                <th scope="col"></th>
            </tr>
            <tbody>
                <tr>
                    <form id="forminsert" method="post" action="insertar.php">
                        <input type="text" name="tabla" value="Tarifa" hidden>
                        <td><input type="text" name="definicion"></td>
                        <td><input type="text" size="2" name="precio"></td>
                        <td><input type="submit" id="btninsertar" name="btninsertar" value="insertar"></td>
                    </form>

                </tr>
            </tbody>
        </table>
    </div>

    <div class="containertarifaadmin">
        <h2>Modificar|Eliminar</h2>

        <table style="width:auto; " class=" tablatarifaadmin table table-light table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">idTarifa</th>
                    <th scope="col">Definicion</th>
                    <th scope="col">Precio</th>
                    <th scope="col"></th>


                </tr>
            </thead>
            <tbody>
                <?php
                $salas = $mysqli->query("SELECT * from Tarifa");
                while ($fila = $salas->fetch_assoc()) {
                ?>
                    <form class="formmodificar" method="post" action="update.php" name="formmodificar">
                        <tr>
                            <?php
                            echo "<input type='text' hidden value='Tarifa' name='tabla'>";
                            echo ' <td ><input type="text" size="2" value='. $fila["idTipo"] . ' name="idtarifa" readonly></td>';
                            echo '<td><input type="text" size="30" value="'.$fila["Definicion"].'" name="definicion"></td>';
                            echo '<td ><input type="text" size="2" value='. $fila["Precio"] . ' name="precio"></td>';
                            ?>
                            <td><input type="submit" class="modificar" value="modificar" name="modificar">
                                <input type="button" name="Tarifa" class="eliminar" value="eliminar" data="<?php echo $fila['idTipo'] ?>" name="eliminar"></td>
                        </tr>
                    </form>
                <?php } ?>
            </tbody>
        </table>

    </div>
</body>

</html>