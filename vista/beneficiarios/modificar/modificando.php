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
            <h1>Modificar Beneficiario</h1>
          </div>
          <div class="titular" id="titular">
            <h2>Beneficiario</h2>
          </div>
          <form class="formulario" name="formulario" id="formulario" action="" method="post" enctype="multipart/form-data">

              <div class="cedulaTitE">
                <label for="cedulaTit">Cédula del Titular</label>
              </div>
              <div class="cedulaTitC campoConMensaje">
                <input type="text" class="cedulaTitular" name="cedulaTitular" id="cedulaTitular" value="<?php echo $datos['cedulatitular']; ?>">
              </div>
              <div class="parentescoE">
                <label for="parentesco">Parentesco</label>
              </div>
              <div class="parentescoC">
                <select class"parentesco" name="parentesco" id="parentesco">
                  <option value="" <?php
                  if ($datos['parentesco'] == "")
                  {
                    echo "selected";
                  } ?>>-Seleccionar-</option>
                  <option value="Esposo" <?php
                    if ($datos['parentesco'] == "Esposo")
                    {
                      echo "selected";
                    }
                    if ($datos['parentesco'] == "Conyugue" && $datos['sexo'] == "Masculino")
                    {
                      echo "selected";
                    }
                  ?>>Esposo</option>
                  <option value="Esposa" <?php
                    if ($datos['parentesco'] == "Esposa")
                    {
                      echo "selected";
                    }
                    if ($datos['parentesco'] == "Conyugue" && $datos['sexo'] == "Femenino")
                    {
                      echo "selected";
                    }
                  ?>>Esposa</option>
                  <option value="Padre" <?php
                    if ($datos['parentesco'] == "Padre")
                    {
                      echo "selected";
                    }
                  ?>>Padre</option>
                  <option value="Madre" <?php
                    if ($datos['parentesco'] == "Madre")
                    {
                      echo "selected";
                    }
                  ?>>Madre</option>
                  <option value="Hijo" <?php
                    if ($datos['parentesco'] == "Hijo")
                    {
                      echo "selected";
                    }
                  ?>>Hijo</option>
                  <option value="Hija" <?php
                    if ($datos['parentesco'] == "Hija")
                    {
                      echo "selected";
                    }
                  ?>>Hija</option>
                  <option value="Excepcional" <?php
                    if ($datos['parentesco'] == "Excepcional")
                    {
                      echo "selected";
                    }
                  ?>>Excepcional</option>
                </select>
              </div>
              <div class="nombresE">
                <label for="nombres" class="nombresL">Nombres</label>
              </div>
              <div class="nombresC campoConMensaje">
                <input type="text" class="nombres" name="nombres" id="nombres" value="<?php echo $datos['nombres']; ?>">
              </div>
              <div class="apellidosE">
                <label for="apellidos" class="apellidosL">Apellidos</label>
              </div>
              <div class="apellidosC campoConMensaje">
                <input type="text" class="apellidos" name="apellidos" id="apellidos" value="<?php echo $datos['apellidos']; ?>">
              </div>
              <div class="cedulaE">
                <label for="cedula" class="cedulaL">Cédula</label>
              </div>
              <div class="cedulaC campoConMensaje">
                <input type="text" class="cedula" name="cedula" id="cedula" value="<?php echo $datos['cedula']; ?>">
              </div>
              <div class="nacimientoE">
                <label for="nacimiento" class="nacimientoL">Fecha de Nacimiento</label>
              </div>
              <div class="nacimientoC">
                <input type="date" class="nacimiento" name="nacimiento" id="nacimiento" value="<?php echo $datos['nacimiento']; ?>">
              </div>
              <div class="sexoE">
                <label for="sexo" class="sexoL">Sexo</label>
              </div>
              <div class="sexoC">
                Masculino <input type="radio" class="sexo" name="sexo[]" id="hombre" value="Masculino"
                  <?php
                    if ($datos['sexo'] == "Masculino")
                    {
                      echo "checked='true'";
                    }
                  ?>>
                Femenino <input type="radio" class="sexo" name="sexo[]" id="mujer" value="Femenino"
                  <?php
                    if ($datos['sexo'] == "Femenino")
                    {
                      echo "checked='true'";
                    }
                  ?>>
              </div>
              <div class="estCivilE">
                <label for="estCivil" class="estCivilL">Estado Civil</label>
              </div>
              <div class="estCivilC">
                <select class="estCivil" name="estCivil" id="estCivil" >
                  <!-- <option value="">-Seleccionar-</option> -->
                  <option value="Soltero"
                  <?php
                    if ($datos['estcivil'] == "Soltero")
                    {
                      echo "selected";
                    }
                  ?>>Soltero</option>
                  <option value="Casado"
                  <?php
                    if ($datos['estcivil'] == "Casado")
                    {
                      echo "selected";
                    }
                  ?>>Casado</option>
                  <option value="Divorciado"
                  <?php
                    if ($datos['estcivil'] == "Divorciado")
                    {
                      echo "selected";
                    }
                  ?>>Divorciado</option>
                  <option value="Viudo"
                  <?php
                    if ($datos['estcivil'] == "Viudo")
                    {
                      echo "selected";
                    }
                  ?>>Viudo</option>
                </select>
              </div>

              <div class="direccionE">
                <label for="direccion">Dirección Completa</label>
              </div>
              <div class="direccionC">
                <textarea class="direccion" name="direccion" id="direccion" rows="3" maxlength="100"><?php echo $datos['direccion']; ?></textarea>
              </div>
              <div class="telefonoFijoE">
                <label for="telefonoFijo" class="telefonoFijoL">Teléfono Fijo</label>
              </div>
              <div class="telefonoFijoC campoConMensaje">
                <input type="tel" class="telefonoFijo" name="telefonoFijo" id="telefonoFijo" value="<?php echo $datos['telefonofijo']; ?>">
              </div>
              <div class="telefonoCelularE">
                <label for="telefonoCelular" class="telefonoCelularL">Teléfono Celular</label>
              </div>
              <div class="telefonoCelularC campoConMensaje">
                <input type="tel" class="telefonoCelular" name="telefonoCelular" id="telefonoCelular" value="<?php echo $datos['telefonocelular']; ?>">
              </div>
              <div class="correoE">
                <label for="correo" class="correoL">Correo Electrónico</label>
              </div>
              <div class="correoC campoConMensaje">
                <input type="email" class="correo" name="correo" id="correo" value="<?php echo $datos['correo']; ?>">
              </div>

              <div class="botones">
                <a href="../"><input type="button" class="botonRegresar" name="regresar" id="botonRegresar" value="Regresar"></a>
                <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
                <input type="button" class="botonGuardar" name="enviar" id="botonGuardar" value="Guardar">
              </div>
          </form>
        </div>

      </div>
    </div>

    <script type="text/javascript" src="<?php echo js; ?>s_modificar.js"></script>
  </body>
</html>
