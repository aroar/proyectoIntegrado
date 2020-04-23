<?php
 include "index.php";
?>
          <div class=" mt-5 row justify-content-center page-header">
            <h2>Contacta con nosotros</h2>
        </div>
          <form method="post" action="mailto:aroaromero@gmail.com" id="formulario-contacto" role="form" name="formcontacto">
          <div class=" mt-5 row justify-content-center">
            <div class="form-group align-items-center w-50 ">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name="nombre" id="nombre">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="inserte el email">
              <label for="exampleInputEmail1">Motivo por el cual contacta con nosotros: </label>

              <select class="custom-select custom-select-sm "  id="seleccion" name="seleccion">
                <option selected value="default">Elija una opción</option>
                <option value="1">Sugerencias</option>
                <option value="2">Empleo</option>
                <option value="3">Reclamaciones</option>
              </select>
              <label for="exampleInputEmail1">Mensaje </label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="areadetexto" id="areadetexto"></textarea>
              <button type="submit" class="btn btn-primary mx-auto">Enviar</button>

            </div>
        </div>

          </form>
          


</body>
</html>
