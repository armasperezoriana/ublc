<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>s_agregarBene.css">
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
            <h1>Registrar Beneficiario</h1>
          </div>


          <div class="titular" id="titular">
            <h2>Beneficiario</h2>
          </div>

          <!-- Formulario para Beneficiarios -->

          <form class="formulario" name="formulario" id="formulario_dos" action="" method="post" enctype="multipart/form-data">
            <div class="cedulaTitE">
              <label for="cedulaTit">Cédula del Titular</label>
            </div>
            <div class="cedulaTitC  campoConMensaje">
              <input type="text" class="cedulaTitular" name="cedulaTitular" id="cedulaTitular">
            </div>
            <div class="parentescoE">
              <label for="parentesco">Parentesco</label>
            </div>
            <div class="parentescoC">
              <select class="parentesco" name="parentesco" id="parentesco">
                <option value="">-Seleccionar-</option>
                <option value="Esposo">Esposo</option>
                <option value="Esposa">Esposa</option>
                <option value="Padre">Padre</option>
                <option value="Madre">Madre</option>
                <option value="Hijo">Hijo</option>
                <option value="Hija">Hija</option>
                <option value="Excepcional">Excepcional</option>
              </select>
            </div>

            <div class="nombresE">
              <label for="nombresBene" class="nombresL">Nombres</label>
            </div>
            <div class="nombresC  campoConMensaje">
              <input type="text" class="nombres" name="nombres" id="nombresBene">
            </div>
            <div class="apellidosE">
              <label for="apellidosBene" class="apellidosL">Apellidos</label>
            </div>
            <div class="apellidosC  campoConMensaje">
              <input type="text" class="apellidos" name="apellidos" id="apellidosBene">
            </div>
            <div class="cedulaE">
              <label for="cedulaBene" class="cedulaL">Cédula</label>
            </div>
            <div class="cedulaC  campoConMensaje">
              <input type="text" class="cedula" name="cedula" id="cedulaBene">
            </div>
            <div class="nacimientoE">
              <label for="nacimientoBene" class="nacimientoL">Fecha de Nacimiento</label>
            </div>
            <div class="nacimientoC">
              <input type="date" class="nacimiento" name="nacimiento" id="nacimientoBene">
            </div>
            <div class="sexoE">
              <label for="sexoBene" class="sexoL">Sexo</label>
            </div>
            <div class="sexoC">
              Masculino <input type="radio" class="sexo" name="sexo[]" id="hombreBene" value="Masculino">
              Femenino <input type="radio" class="sexo" name="sexo[]" id="mujerBene" value="Femenino">
            </div>
            <div class="estCivilE">
              <label for="estCivilBene" class="estCivilL">Estado Civil</label>
            </div>
            <div class="estCivilC">
              <select class="estCivil" name="estCivil" id="estCivilBene">
                <option value="">-Seleccionar-</option>
                <option value="Soltero">Soltero</option>
                <option value="Casado">Casado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Viudo">Viudo</option>
              </select>
            </div>
            <div class="direccionE">
              <label for="direccionBene">Dirección Completa</label>
            </div>
            <div class="direccionC">
              <textarea class="direccion" name="direccion" id="direccionBene" rows="3" maxlength="100"></textarea>
            </div>
            <div class="telefonoFijoE">
              <label for="telefonoFijoBene" class="telefonoFijoL">Teléfono Fijo</label>
            </div>
            <div class="telefonoFijoC campoConMensaje">
              <input type="tel" class="telefonoFijo" name="telefonoFijo" id="telefonoFijoBene">
            </div>
            <div class="telefonoCelularE">
              <label for="telefonoCelularBene" class="telefonoCelularL">Teléfono Celular</label>
            </div>
            <div class="telefonoCelularC campoConMensaje">
              <input type="tel" class="telefonoCelular" name="telefonoCelular" id="telefonoCelularBene">
            </div>
            <div class="correoE">
              <label for="correoBene" class="correoL">Correo Electrónico</label>
            </div>
            <div class="correoC campoConMensaje">
              <input type="email" class="correo" name="correo" id="correoBene">
            </div>
            <div class="botones">
              <a href="../"><input type="button" class="botonRegresar" name="regresar" id="botonRegresarBene" value="Regresar"></a>
              <input type="button" class="botonGuardar" name="enviar" id="botonGuardarBene" value="Guardar">
              <input type="button" class="botonLimpiar" name="limpiar" id="botonLimpiarBene" value="Limpiar">
            </div>
          </form>
        </div>


      </div>
    </div>

    <div class="alertaRestaurar" id="alertaRestaurar">
      <div class="mensajeRestaurar">
        <div class="logoRestaurar">
          <img src="<?php echo img; ?>logoSISMEU2.png">
        </div>
        <div class="tituloRestaurar">
          <h2 id="mensajeRestauracion"></h2>
        </div>
        <div class="botonesRestaurar">
          <form class="formularioRestaurar" id="formularioRestaurar" action="" method="post">
            <input type="hidden" name="cedulaRestaurar" value="">
            <button type="button" name="regresar">Regresar</button>
            <button type="button" name="restaurar">Restaurar</button>
          </form>

        </div>
      </div>
    </div>
    <script type="text/javascript" src="<?php echo js; ?>s_agregaBene.js"></script>
  </body>
</html>
