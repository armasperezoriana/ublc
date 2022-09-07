<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css ?>usu_modificar.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>

    <div class="todo">
      <?php $this->vista("menu"); ?>
      <div class="central">
        <div class="center">
          <div class="ivss">
            <img src="<?php echo img ?>logoIVSS.png">
          </div>
          <div class="sismeu">
            <img src="<?php echo img ?>logoSISMEU2.png">
          </div>
          <div class="titulo">
            <h1>Crear Usuario</h1>
          </div>
          <form class="formulario" name="formulario" id="formulario" action="" method="post">
              <div class="nombresE">
                <label for="nombres">Nombres</label>
              </div>
              <div class="nombresC campoConMensaje">
                <input type="text" class="nombres" name="nombres" id="nombres">
              </div>
              <div class="apellidosE">
                <label for="apellidos">Apellidos</label>
              </div>
              <div class="apellidosC campoConMensaje">
                <input type="text" class="apellidos" name="apellidos" id="apellidos">
              </div>
              <div class="cedulaE">
                <label for="cedula">Cedula</label>
              </div>
              <div class="cedulaC">
                <input type="text" class="cedula" name="cedula" id="cedula">
              </div>
              <div class="correoE">
                <label for="correo">Correo Electrónico</label>
              </div>
              <div class="correoC campoConMensaje">
                <input type="email" class="correo" name="correo" id="correo">
              </div>
              <div class="nombreUE">
                <label for="nombreU">Nombre de Usuario</label>
              </div>
              <div class="nombreUC campoConMensaje">
                <input type="text" class="nombreU" name="nombreU" id="nombreU">
              </div>
              <div class="tipoUsuE">
                <label for="tipoUsu">Tipo de Usuario</label>
              </div>
              <div class="tipoUsuC">
                <select class="tipoUsu" name="tipoUsu" id="tipoUsu">
                  <option value="Normal">Normal</option>
                  <option value="Administrador">Administrador</option>
                </select>
              </div>
              <div class="claveE">
                <label for="clave">Contraseña</label>
              </div>
              <div class="claveC  campoConMensaje">
                <input type="password" class="clave" name="clave" id="clave">
              </div>
              <div class="claveConfE">
                <label for="claveConf">Confirmar Contraseña</label>
              </div>
              <div class="claveConfC  campoConMensaje">
                <input type="password" class="claveConf" name="claveConf" id="claveConf">
              </div>

              <div class="botones">
                <a href="../"><input type="button" class="botonRegresar" name="regresar" id="botonRegresar" value="Regresar"></a>
                <input type="button" class="botonGuardar" name="enviar" id="botonGuardar" value="Guardar">
              </div>
          </form>
        </div>

      </div>
    </div>


    <script type="text/javascript" src="<?php echo js; ?>usu_agregar.js"></script>

  </body>
</html>
