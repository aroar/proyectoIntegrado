<?php
 include "index.php";
 require "conexionbd.php";
 $mysqli=conexion();

?>
      <div class="mt-5 row justify-content-center page-header">
            <h1>Tarifas Cinemax Sevilla</h1>
      </div>
        <div class="d-flex justify-content-center">
        <table class=" table-responsive-md table table-bordered table-hover table-striped  table-dark w-50 mt-5">
          <caption>*Los precios corresponden a la temporada 2019/2020</caption>  
          <thead>
              <tr>
                <th scope="col">Tarifa</th>
                <th scope="col">Precio</th>
              </tr>
            </thead>
            <tbody>
  <?php
     $tarifas = $mysqli->query("SELECT * from Tarifa");
     while ($fila = $tarifas->fetch_assoc()) {
  ?>
              <tr>
                <td><?php echo $fila['Definicion']?></td>
                <td><?php echo $fila['Precio']."€"?></td>
              </tr>

<?php } ?>
          </tbody>
        </table>
      </div>


</body>
</html>