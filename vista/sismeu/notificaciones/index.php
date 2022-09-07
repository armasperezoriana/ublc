
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>s_notificaciones.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>
    <div class="todo">
      <?php $this->vista("menu"); ?>
      <div class="central">
          <div class="center">
            <div class="cabecera">
              <div class="logo">
                <img src="<?php echo img; ?>logoIVSS.png" alt="">
              </div>
              <div class="titulo">
                <h1>Notificaciones</h1>
              </div>
            </div>
            <?php $this->controlador("notificacion"); ?>

          </div>
          <footer>
            Dirección de Gestión de Talento Humano <br>
            Unidad de Beneficios Legales y Contractuales
          </footer>
      </div>
   </div>

    <script type="text/javascript">
      var subNoti = document.getElementsByName('subtitulo_notificacion');
      var contNoti = document.getElementsByName('contenido_notificacion');
      for (var i = 0; i < subNoti.length; i++)
      {
        contNoti[i].style.display = "none";
        subNoti[i].onclick = function()
        {
          if (this.nextSibling.style.display == "none")
          {
            this.nextSibling.style.display = "grid";
            this.style.color = "#000000";
            this.style.border = "2px solid #0B2E66";
          }
          else
          {
            this.nextSibling.style.display = "none";
            this.style = "border-top-left-radius: none; border-top-right-radius: none";
            this.style.border = "none";
          }
        };
      }
    </script>
  </body>
</html>
