<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>s_reportes.css">
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
            <h1>REPORTES</h1>
          </div>
          <form class="buscarReporte" id="buscarReporte" action="" method="post" target="_blank">
            <label for="tipoPersona">Tipo de Persona:</label>
            <select class="tipoPersona" name="tipoPersona">
              <option value="trabajador">Titular</option>
              <option value="beneficiario">Beneficiario</option>
              <option value="Todos">Todos</option>
            </select>
            <label for="tipoReporte">Tipo de Reporte:</label>
            <select class="tipoReporte" name="tipoReporte" id="tipoReporte">
              <option value="General">Información General</option>
              <option value="patologia">Patologías</option>
              <option value="medicamento">Medicamentos</option>
            </select>
            <select class="selectDinamico" name="selectDinamico" id="selectDinamico">
              <!-- Esto se generará dinámicamente -->
            </select>

            <button type="button" class="enviar" name="enviar" id="enviar">Generar</button>
          </form>

        </div>
        <footer>
          Dirección de Gestión de Talento Humano <br>
          Unidad de Beneficios Legales y Contractuales
        </footer>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo js; ?>s_reportes.js"></script>
  </body>
</html>
