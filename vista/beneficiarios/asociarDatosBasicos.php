<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>datosB.css">
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
            <h1>ASOCIAR INFORMACIÓN AL BENEFICIARIO <?php if (isset($datos['cedula'])) {
              echo "CON CÉDULA ".$datos['cedula'];
            } ?></h1>
          </div>
          <form class="formulario" action="" method="post" id="formulario">
            <input type="text" name="buscarPat" value="" placeholder="Buscar Patología">
            <input type="text" name="buscarMed" value="" placeholder="Buscar Medicamento">
            <div class="selectPat">
              <select id="seleccionPat">
                <option value="">-Seleccionar-</option>
              </select>
              <button type="button" id="incluirPat">Incluir</button>
            </div>
            <div class="selectMed">
              <select id="seleccionMed">
                <option value="">-Seleccionar-</option>
              </select>
              <button type="button" id="incluirMed">Incluir</button>
            </div>
            <div class="seleccionesPat">
              <h2 class="subtitulo">Patologías:</h2>
              <?php if (isset($datos['patologias'])) {
                foreach ($datos['patologias'] as $patologia) {
                  echo "<h3>".$patologia['nombre']."</h3>";
                  echo "<input type='hidden' name='patologias[]' value='".$patologia['id']."'>";
                }
              } ?>
            </div>
            <div class="seleccionesMed">
              <h2 class="subtitulo">Medicamentos:</h2>
              <?php if (isset($datos['medicamentos'])) {
                foreach ($datos['medicamentos'] as $medicamento) {
                  echo "<h3>".$medicamento['nombre']."</h3>";
                  echo "<input type='hidden' name='medicamentos[]' value='".$medicamento['id']."'>";
                }
              } ?>
            </div>
            <div class="botones">
              <a href="../"><button type="button" name="regresar">Regresar</button></a>
              <button type="submit" name="guardar">Guardar</button>
              <button type="button" name="limpiar">Limpiar</button>
            </div>
            <input type="hidden" name="idPersona" value="<?php echo $datos['id']; ?>">
            <input type="hidden" name="cedulaPersona" value="<?php echo $datos['cedula']; ?>">
          </form>

        </div>
        <footer>
          Dirección de Gestión de Talento Humano <br>
          Unidad de Beneficios Legales y Contractuales
        </footer>
      </div>
    </div>

    <div class="mensaje" id="mensaje">
      <h3><?php echo $datos['mensaje']; ?></h3>
    </div>
    <script type="text/javascript" src="<?php echo js; ?>datosB.js"></script>
  </body>
</html>
