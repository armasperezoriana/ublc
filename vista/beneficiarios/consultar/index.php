<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>s_consultar.css">
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
            <h1>BUSCAR BENEFICIARIO</h1>
          </div>
          <div class="busca">
            <form class="buscando" name="buscando" id="buscando" action="" method="GET">
              <input type="text" class="buscar" name="buscar" id="buscar" placeholder="Ingrese la cédula">
              <input type="button" class="botonBuscar" name="botonBuscar" id="botonBuscar" value="Ir">
            </form>
          </div>

          <?php

            if (isset($datos['nombres']) || isset($datos['apellidos']) || isset($datos['cedula']))
            {
             echo
              "
               <div class='contenido'>

                <div class='nombre'>
                  <h2 class='subtitulo'>Nombres: </h2>
                </div>
                <div class='nombreCampo'>
                  <h2>" .$datos['nombres'] ."</h2>
                </div>
                <div class='apellido'>
                  <h2 class='subtitulo'>Apellidos: </h2>
                </div>
                <div class='apellidoCampo'>
                  <h2>" .$datos['apellidos'] ."</h2>
                </div>
                <div class='cedula'>
                  <h2 class='subtitulo'>Cedula: </h2>
                </div>
                <div class='cedulaCampo'>
                  <h2>" .$datos['cedula'] ."</h2>
                </div>
              </div>

              <div class='consulta'>
              <form class='consultando' name='consultando' id='consultando' method='post'>
                <input type='hidden' name='cedula' id='cedula' value='" .$datos['cedula'] ."'>
                <button type='button' name='modificar' id='modificar'>Modificar</button>
                <button type='button' name='consultar' id='consultar'>Consultar</button>
                <button type='button' name='eliminar' id='eliminar'>Eliminar</button>
              </form>
              </div>
             ";
            }
            else
            {
              if (isset($_GET['buscar']) && !isset($datos))
              {
                echo "<h3>La cedula " .$_GET['buscar'] ." no pertenece a ningún beneficiario registrado</h3>";
                echo "<h4>Ingrese otra cédula para consultar los datos</h4>";
              }
              else
              {
                echo "<h4>Ingrese una cédula para consultar los datos</h4>";
              }
            }

          ?>

        </div>
        <footer>
          Dirección de Gestión de Talento Humano <br>
          Unidad de Beneficios Legales y Contractuales
        </footer>
      </div>
    </div>

    <div class="confirmar" id="confirmar">
      <div class="confirmando">
        <div class="pregunta">
          <h3>¿Está seguro de eliminar todos los datos?</h3>
        </div>
        <div class="si">
          <form class="elimina" name="elimina" id="elimina" action="../eliminar/" method="post">
            <input type="hidden" name="cedula" value="<?php echo $datos['cedula'] ?>">
            <button type="button" class="si" name="si" id="si">Sí</button>
          </form>

        </div>
        <div class="no">
            <button type="button" class="no" name="no" id="no">No</button>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo js; ?>s_consultar.js"></script>
  </body>
</html>
