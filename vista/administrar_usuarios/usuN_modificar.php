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
            <h1>Modificar Usuario</h1>
          </div>
          <form class="formulario" name="formulario" id="formulario" action="" method="post">
              <div class="nombresE">
                <label for="nombres">Nombres</label>
              </div>
              <div class="nombresC campoConMensaje">
                <input type="text" class="nombres" name="nombres" id="nombres" value="<?php echo $datos['nombres']; ?>">
              </div>
              <div class="apellidosE">
                <label for="apellidos">Apellidos</label>
              </div>
              <div class="apellidosC campoConMensaje">
                <input type="text" class="apellidos" name="apellidos" id="apellidos" value="<?php echo $datos['apellidos']; ?>">
              </div>
              <div class="cedulaE">
                <label for="cedula">Cedula</label>
              </div>
              <div class="cedulaC">
                <input type="text" class="cedula" name="cedula" id="cedula" value="<?php echo $datos['cedula']; ?>">
              </div>
              <div class="correoE">
                <label for="correo">Correo Electrónico</label>
              </div>
              <div class="correoC campoConMensaje">
                <input type="email" class="correo" name="correo" id="correo" value="<?php echo $datos['correo']; ?>">
              </div>
              <div class="nombreUE">
                <label for="nombreU">Nombre de Usuario</label>
              </div>
              <div class="nombreUC campoConMensaje">
                <input type="text" class="nombreU" name="nombreU" id="nombreU" value="<?php echo $datos['nombreusu']; ?>">
              </div>
              <div class="tipoUsuE">
                <label for="tipoUsu">Tipo de Usuario</label>
              </div>
              <div class="tipoUsuC">
                <h2><?php echo $datos['tipousu']; ?></h2>
                <input type="hidden" name="tipoUsu" id="tipoUsu" value="<?php echo $datos['tipousu']; ?>">
              </div>
              <div class="claveE">
                <label for="clave">Contraseña</label>
              </div>
              <div class="claveC  campoConMensaje">
                <input type="password" class="clave" name="clave" id="clave" value="<?php echo $datos['clave']; ?>">
              </div>
              <div class="claveConfE">
                <label for="claveConf">Confirmar Contraseña</label>
              </div>
              <div class="claveConfC  campoConMensaje">
                <input type="password" class="claveConf" name="claveConf" id="claveConf" value="<?php echo $datos['clave']; ?>">
              </div>

              <div class="botones">
                <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
                <a href="../../"><input type="button" class="botonRegresar" name="regresar" id="botonRegresar" value="Regresar"></a>
                <input type="button" class="botonGuardar" name="enviar" id="botonGuardar" value="Modificar">
                <input type="button" name="eliminar" value="Eliminar">
              </div>
          </form>
        </div>

      </div>
    </div>

    <div class="alertaEliminar" id="alertaEliminar">
      <div class="mensajeEliminar">
        <div class="logoEliminar">
          <img src="<?php echo img; ?>logoSISMEU2.png">
        </div>
        <div class="tituloEliminar">
          <h2>Ingrese su Contraseña para continuar con la Eliminación del Usuario</h2>
        </div>
          <form class="formularioEliminar" id="formularioEliminar" action="" method="post">
            <input type="hidden" name="usuarioEliminar" value="<?php echo $datos['id']; ?>">
            <input type="hidden" name="usuario" value="<?php echo $_SESSION['login']; ?>">
            <input type="password" name="claveConfirmar">
            <p id="mensajeClave"></p>
            <button type="button" name="regresar">Regresar</button>
            <button type="button" name="enviar">Eliminar</button>
          </form>

      </div>
    </div>

    <script type="text/javascript" src="<?php echo js; ?>usu_modificar.js"></script>

  </body>
</html>
