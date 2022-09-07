<?php
  if (!isset($datos['mensaje']))
  {
    $datos['mensaje'] = "Error";
  }
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>
    <style media="screen">
      body
      {
        margin: 0;
        padding: 0;
      }
      .central
      {
        display: none;
      }
      .mensaje
      {
        background: url(/ublc/recursos/img/fondo.jpg);
        margin: 0;
        padding: 0;
        position: fixed;
        width: 100%;
        height: 100%;
        display: flex;
        justify-items: center;
        align-items: center;

      }
      .centralMensaje
      {
        width: 100%;
        margin-top: auto;
        margin-bottom: auto;
        display: grid;
        grid-template-areas:
        "principal"
        "footer";
      }

      .centerMensaje
      {
        grid-area: principal;
        width: 40%;
        margin: auto;
        display: grid;
        grid-gap: 15px;
        grid-template-columns: 1fr;
        grid-template-areas:
        "logo"
        "titulo"
        "formulario";
        justify-items: center;
        padding: 12px 16px;
        background: #86B0A0;
        border-radius: 20px;
        box-shadow: 10px;
      }
      .logoMensaje
      {
        grid-area: logo;
        width: 33%;
      }
      .logoMensaje img
      {
        width: 100%;
      }

      h2
      {
        font-family: serif, sans-serif,  Algerian;
        font-weight: bold;
        text-align: center;
        font-size: 22px;
        color: #ffffff;
      }
      .tituloMensaje
      {
        grid-area: titulo;
      }
      .formulario
      {
        grid-area: formulario;
        display: grid;
        grid-template-columns: 1fr;
        grid-row-gap: 5px;
        justify-content: stretch;
        justify-items: center;
      }
      input
      {
        padding: 5px;
        font-family:  sans-serif,"Times New Roman";
        font-size: 16px;
        background: #6E887D;
        color: white;
        border: 2px solid #6E887D;
        border-radius: 18px;
      }
      input:hover
      {
        color: #ffffff;
        border: 2px solid #01579B;
        background: #000000;
      }
      button
      {
        font-family: Dungeon, "Arial Black";
        font-size: 18px;
        padding: 5px 10px;
        background: #4AB088;
        color: #ffffff;
        border-radius: 10px;
        border: 0px;
      }
      button:hover
      {
        background: #66A55F;
        color: black;
      }
      button:active
      {
        background: #E8F5E9;
      }

      footer
      {
        grid-area: footer;
        justify-self: center;
        display: flex;
        align-items: center;
        margin-top: 7.5px;
        padding: 5px 15px;
        font-family: Arial, calibri;
        font-size: 12px;
        font-weight: bold;
        text-align: center;
        background: rgba(134, 176, 160, 0.5);
        border-radius: 10px;
      }
    </style>

      <div class="mensaje">


         <div class="centralMensaje">

          <div class="centerMensaje">
            <div class="logoMensaje">
              <img src="<?php echo img; ?>logoSISMEU2.png">
            </div>
            <div class="tituloMensaje">
              <h2>INGRESE EL CORREO O USUARIO PARA RECUPERAR EL ACCESO</h2>
            </div>
            <form class="formulario" id="formulario" action="" method="post">
              <input type="text" name="recupera" id="recupera" placeholder="Correo o Usuario" maxlength="50">
              <button type="button" name="enviar" id="enviar">Enviar</button>
            </form>
          </div>

          <footer>
            Dirección de Gestión de Talento Humano <br>
            Unidad de Beneficios Legales y Contractuales
          </footer>

        </div>

      </div>
      <script type="text/javascript">
        enviando = function() {
          var valido = true;
          if (recupera.value.length < 8) {
            alert("El campo no puede tener menos de 8 caracteres");
            valido = false;
          }
          else {
            if (recupera.value.length > 50) {
              alert("El campo no puede tener más de 50 caracteres");
              valido = false;
            }
          }
          if (valido) {
            formulario.submit();
          }
        }
        var enviar = document.getElementById("enviar");
        var recupera = document.getElementById("recupera");
        var formulario = document.getElementById("formulario");
        enviar.onclick = enviando;

      </script>
  </body>
</html>
