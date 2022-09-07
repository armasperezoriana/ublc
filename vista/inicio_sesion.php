<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>index.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>
   <div class="todo">
    <div class="central">
    <div class="center">
      <div class="logo">
        <img src="<?php echo img; ?>logoUPTAEB2.png" alt="">
      </div>
      <div class="titulo">
        <h1>INGRESAR AL SISTEMA</h1>
      </div>
      <form class="formulario" name="formulario" id="formulario" action="" method="post">

      <div class="usuarioC">
        <input type="text" class="usuario" name="usuario" id="usuario" placeholder="USUARIO">
      </div>

      <div class="claveC">
        <input type="password" class="clave" name="clave" id="clave" placeholder="CONTRASEÑA">
      </div>

      <div class="botones">
        <input type="button" class="ingresar" name="ingresar" id="ingresar" value="INGRESAR">
      </div>

     </form>
     <div class="recuperar">
       <a href="<?php echo dir ?>inicio/recuperar"><h4>Recuperar usuario y/o contraseña</h4></a>
     </div>

     <div class="mensajito">
       <h3><?php
        if (isset($datos['mensaje']))
        {
          echo $datos['mensaje'];
        }
       ?></h3>
     </div>

    </div>
    <footer>
      Dirección de Gestión de Talento Humano <br>
      Unidad de Beneficios Legales y Contractuales
    </footer>
    </div>
   </div>
   <script type="text/javascript" src="<?php echo js; ?>ingresar.js"></script>
  </body>
</html>
