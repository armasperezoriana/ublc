<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>s_consultando.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>
    <div class="todo">
      <?php $this->vista("menu"); ?>
      <div class="central">
        <div class="center">
          <div class="logo">
            <img src="<?php echo img; ?>logoSISMEU2.png" alt="">
          </div>
          <div class="titulo">
            <h1>Consultar</h1>
          </div>
          <div class="consultaBene">
              <h2 class="subtitulo">Datos del Beneficiario</h2>

              <div class="nombres subtitle">
                <h2><b>Nombres: </b></h2>
              </div>
              <div class="nombresC">
                <h2><?php echo $datos['nombres']; ?></h2>
              </div>

              <div class="apellidos subtitle">
                <h2><b>Apellidos: </b></h2>
              </div>

              <div class="apellidosC">
                <h2><?php echo $datos['apellidos']; ?></h2>
              </div>

              <div class="cedula subtitle">
                <h2><b>Cédula: </b></h2>
              </div>

              <div class="cedulaC">
                <h2><?php echo $datos['cedula']; ?></h2>
              </div>

              <div class="nacimiento subtitle">
                <h2><b>Fecha de Nacimiento: </b></h2>
              </div>
               <div class="nacimientoC">
                <h2><?php echo $datos['nacimiento']; ?></h2>
              </div>
              <div class="sexo subtitle">
                <h2> <b>Sexo: </b></h2>
              </div>
              <div class="sexoC">
                <h2><?php echo $datos['sexo']; ?></h2>
              </div>
              <div class="estCivil subtitle">
                <h2> <b>Estado Civil: </b> </h2>
              </div>
              <div class="estCivilC">
                <h2> <?php echo $datos['estcivil']; ?></h2>
              </div>

              <div class="direccion subtitle">
                <h2> <b>Dirección Completa: </b></h2>
              </div>
              <div class="direccionC">
                <h2><?php echo $datos['direccion']; ?></h2>
              </div>

              <div class="telefonoFijo subtitle">
                <h2> <b>Teléfono Fijo: </b></h2>
              </div>

                 <div class="telefonoFijoC">
                <h2><?php echo $datos['telefonofijo']; ?></h2>
              </div>


              <div class="telefonoCelular subtitle">
                <h2> <b>Teléfono Celular: </b></h2>
              </div>

              <div class="telefonoCelularC">
                <h2><?php echo $datos['telefonocelular']; ?></h2>
              </div>

              <div class="correo subtitle">
                <h2> <b>Correo Electrónico: </b></h2>
              </div>

              <div class="correoC">
                <h2> <?php echo $datos['correo']; ?></h2>
              </div>

              <div class="patologias subtitle">
                <h2> <b>Patologías: </b></h2>
              </div>
              <div class="patologiasC">
                <h2><?php echo $datos['patologias']; ?></h2>
              </div>
              <div class="medicamentos subtitle">
                <h2> <b>Medicamentos: </b></h2>
              </div>
               <div class="medicamentosC">
                <h2><?php echo $datos['medicamentos']; ?></h2>
              </div>

              <div class="parentesco subtitle">
                <h2> <b>Parentesco: </b></h2>
              </div>
              <div class="parentescoC">
                <h2><?php echo $datos['parentesco']; ?> </h2>
              </div>

              <?php
                  echo "<div class='titular'>
                    <h2 class='subtitulo'> Titular </h2>
                      <h2 class='subtitle'><b>Nombres y Apellidos</b></h2> <h2 class='subtitle'><b>Cedula</b></h2>";
                  echo "<h2>" .$datos['titular']['nombres'] ." " .$datos['titular']['apellidos'] ."</h2> <h2>" .$datos['titular']['cedula'] ."</h2>";
                  echo "</div>";
               ?>

               <div class="regresando">
                <form class="consultaPDF" action="consultarPDF" method="post" target="_blank">
                  <a href="../"><button type="button" class="regresar" name="regresar" id="regresar">Regresar</button></a>
                  <input type="hidden" name="patologias" value="<?php echo $datos['patologias']; ?>">
                  <input type="hidden" name="medicamentos" value="<?php echo $datos['medicamentos']; ?>">
                  <input type="hidden" name="cedula" value="<?php echo $datos['cedula']; ?>">
                  <button type="submit" name="pdf">Generar PDF</button>
                </form>
              </div>

         </div>
        </div>

      </div>
    </div>

  </body>
</html>
