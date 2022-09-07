<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>sismeu.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>
    <div class="todo">
      <?php $this->vista("menu"); ?>
      <div class="central">
        <div class="titulo">
            <h1>BIENVENIDO</h1>
            <h3><?php echo $_SESSION['login']; ?></h3>
        </div>
        <div class="center">
          <div class="sismeu">
            <img src="<?php echo img; ?>logoSISMEU2.png">
          </div>

          <a class="opciones" href="../trabajadores/">
            <div class="consultar">
              <h2>TITULAR</h2>
            </div>
          </a>
          <a class="opciones" href="../beneficiarios/">
            <div class="agregar">
              <h2>BENEFICIARIO</h2>
            </div>
          </a>
          <a class="opciones" href="datos_basicos/">
            <div class="modificar">
              <h2>DATOS BÁSICOS</h2>
            </div>
          </a>
          <a class="opciones" href="reembolsos/">
            <div class="reembolsos">
              <h2>REEMBOLSOS</h2>
            </div>
          </a>
           <a class="opciones" href="reportes/">
            <div class="reportes">
              <h2>REPORTES</h2>
            </div>
          </a>
          <a class="opciones" href="notificaciones/">
            <div class="eliminar">
            <h2>NOTIFICACIONES</h2>
            </div>
          </a>
        </div>
        <footer>
          Dirección de Gestión de Talento Humano <br>
          Unidad de Beneficios Legales y Contractuales
        </footer>
      </div>
    </div>
    <a href="notificaciones/" id="notificaciones"><div class="notificacion" id="notificacion"></div></a>
    <script type="text/javascript" src="<?php echo js; ?>s_notificar.js"></script>
  </body>
</html>
