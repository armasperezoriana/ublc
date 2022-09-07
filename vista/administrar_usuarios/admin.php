<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>usu_admin.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>
    <div class="todo">
    <?php $this->vista("menu"); ?>
    <div class="central">
        <div class="center">
          <div class="cabecera">
            <div class="logo">
              <img src="<?php echo img; ?>logoUPTAEB2.png" alt="">
            </div>
            <div class="titulo">
              <h1>Administrar Usuarios</h1>
            </div>
          </div>

          <div class="usuarios">
            <h2 class="subtitulo_informacion">Mi Usuario</h2>
            <div class="contenidoUsuarios">
              <div class="subtitulo">
                <h2>Nombres y Apellidos</h2>
              </div>
              <div class="subtitulo">
                <h2>Cédula</h2>
              </div>
              <div class="subtitulo">
                <h2>Nombre de Usuario</h2>
              </div>
              <div class="subtitulo">
                <h2>E-mail</h2>
              </div>

              <h2 class="subtitulo_dato"><?php echo $datos['nombres']." ".$datos['apellidos']; ?></h2>
              <h2 class="subtitulo_dato"><?php echo  $datos['cedula']; ?></h2>
              <h2 class="subtitulo_dato"><?php echo $datos['nombreusu']; ?></h2>
              <h2 class="subtitulo_dato"><?php echo $datos['correo']; ?></h2>
            </div>
            <div class="botones">
              <a href="../usu_modificar/"> <button type="button" name="modicarme">Modificar mi Usuario</button></a>
              <a href="../usu_agregar/"> <button type="button" name="crear">Crear un Usuario</button></a>
            </div>
          </div>

          <?php $this->controlador("usu_consultando"); ?>

        </div>
    </div>
    <form class="formulario" id="formularioConsultando" action="../usu_modificar/" method="post">
      <input type="hidden" name="nombreUsu" value="">
    </form>
   </div>
   <script type="text/javascript" src="<?php echo js; ?>usu_consultando.js"></script>
  </body>
</html>
