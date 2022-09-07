<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>opciones.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>
    <div class="todo">
      <?php $this->vista("menu"); ?>
      <div class="central">
        <div class="center">
          <div class="sismeu">
            <img src="<?php echo img; ?>logoSISMEU2.png">
          </div>

          <div class="subtitulos">
            <h2 class="subtitulo">DATOS BÁSICOS</h2>
          </div>
          <a href="<?php echo dir; ?>patologias/" class="opcion">
            <div class="uno">
              <h2>PATOLOGÍAS</h2>
            </div>
          </a>
          <a href="<?php echo dir; ?>medicamentos/" class="opcion">
            <div class="dos">
              <h2>MEDICAMENTOS</h2>
            </div>
          </a>

        </div>
        <footer>
          Dirección de Gestión de Talento Humano <br>
          Unidad de Beneficios Legales y Contractuales
        </footer>
      </div>
    </div>
  </body>
</html>
