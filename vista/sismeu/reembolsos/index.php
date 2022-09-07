<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>s_reembolsos.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>
    <div class="todo">
      <?php $this->vista("menu"); ?>
      <div class="central">
        <div class="center">
          <div class="sismeu">
            <img src="<?php echo img; ?>logoSISMEU2.png" alt="">
          </div>
          <div class="titulo">
            <h1>REEMBOLSO</h1>
          </div>
          <form class="reembolsar" id="reembolsar" action="" method="post" target="_blank">
            <label for="cedula">Cédula de la Persona:</label>
            <input type="text" name="cedula" id="cedula">
            <p class="mensajeCedula" id="mensajeCedula"></p>
            <label for="diagnostico">Diagnóstico: </label>
            <textarea name="diagnostico" id="diagnostico" rows="3" maxlength="300"></textarea>
            <label for="monto">Monto Total:</label>
            <input type="text" name="monto" id="monto">
            <div class="fechasOcuL fechas">
              <label for="fechaOcurrencia">Fecha de Ocurrencia: </label>
            </div>
            <div class="fechasRecL fechas">
              <label for="fechaRecepcion">Fecha de Recepción: </label>
            </div>
            <div class="fechasOcu fechas">
              <input type="date" name="fechaOcurrencia" id="fechaOcurrencia">
            </div>
            <div class="fechasRec fechas">
              <input type="date" name="fechaRecepcion" id="fechaRecepcion">
            </div>
            <button type="button" class="enviar" name="enviar" id="enviar">Generar</button>
          </form>

        </div>
        <footer>
          Dirección de Gestión de Talento Humano <br>
          Unidad de Beneficios Legales y Contractuales
        </footer>
      </div>
    </div>


    <script type="text/javascript" src="<?php echo js; ?>s_reembolsos.js"></script>
  </body>
</html>
