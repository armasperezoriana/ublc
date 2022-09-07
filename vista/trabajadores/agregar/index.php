<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>s_agregar.css">
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
            <h1>Registrar Titular</h1>
          </div>
          <div class="titular" id="titular">
            <h2>Titular</h2>
          </div>

          <form class="formulario" name="formulario" id="formulario" action="" method="post" enctype="multipart/form-data">
              <div class="nombresE">
                <label for="nombres" class="nombresL">Nombres</label>
              </div>
              <div class="nombresC campoConMensaje">
                <input type="text" class="nombres" name="nombres" id="nombres">
              </div>
              <div class="apellidosE">
                <label for="apellidos" class="apellidosL">Apellidos</label>
              </div>
              <div class="apellidosC  campoConMensaje">
                <input type="text" class="apellidos" name="apellidos" id="apellidos">
              </div>
              <div class="cedulaE">
                <label for="cedula" class="cedulaL">Cédula</label>
              </div>
              <div class="cedulaC  campoConMensaje">
                <input type="text" class="cedula" name="cedula" id="cedula">
              </div>
              <div class="nacimientoE">
                <label for="nacimiento" class="nacimientoL">Fecha de Nacimiento</label>
              </div>
              <div class="nacimientoC">
                <input type="date" class="nacimiento" name="nacimiento" id="nacimiento">
              </div>
              <div class="sexoE">
                <label for="sexo" class="sexoL">Sexo</label>
              </div>
              <div class="sexoC">
                Masculino <input type="radio" class="sexo" name="sexo[]" id="hombre" value="Masculino">
                Femenino <input type="radio" class="sexo" name="sexo[]" id="mujer" value="Femenino">
              </div>
              <div class="estCivilE">
                <label for="estCivil" class="estCivilL">Estado Civil</label>
              </div>
              <div class="estCivilC">
                <select class="estCivil" name="estCivil" id="estCivil">
                  <option value="">-Seleccionar-</option>
                  <option value="Soltero">Soltero</option>
                  <option value="Casado">Casado</option>
                  <option value="Divorciado">Divorciado</option>
                  <option value="Viudo">Viudo</option>
                </select>
              </div>

              <div class="direccionE">
                <label for="direccion">Dirección Completa</label>
              </div>
              <div class="direccionC">
                <textarea class="direccion" name="direccion" id="direccion" rows="3" maxlength="100"></textarea>
              </div>
              <div class="telefonoFijoE">
                <label for="telefonoFijo" class="telefonoFijoL">Teléfono Fijo</label>
              </div>
              <div class="telefonoFijoC campoConMensaje">
                <input type="tel" class="telefonoFijo" name="telefonoFijo" id="telefonoFijo">
              </div>
              <div class="telefonoCelularE">
                <label for="telefonoCelular" class="telefonoCelularL">Teléfono Celular</label>
              </div>
              <div class="telefonoCelularC campoConMensaje">
                <input type="tel" class="telefonoCelular" name="telefonoCelular" id="telefonoCelular">
              </div>
              <div class="correoE">
                <label for="correo" class="correoL">Correo Electrónico</label>
              </div>
              <div class="correoC campoConMensaje">
                <input type="email" class="correo" name="correo" id="correo">
              </div>
              <div class="tipoTrabajadorE">
                <label for="tipoTrabajador" class="tipoTrabajadorL">Tipo de Trabajo</label>
              </div>
              <div class="tipoTrabajadorC">
                <select class="tipoTrabajador" name="tipoTrabajador" id="tipoTrabajador">
                  <option value="">-Seleccionar-</option>
                  <option value="Docente">Docente</option>
                  <option value="Administrativo">Administrativo</option>
                  <option value="Servicio">Obrero</option>
                </select>
              </div>
              <div class="estTrabajoE">
                <label for="estTrabajo" class="estTrabajoL">Estado de Trabajo</label>
              </div>
              <div class="estTrabajoC">
                <select class="estTrabajo" name="estTrabajo" id="estTrabajo">
                  <option value="">-Seleccionar-</option>
                  <option value="Titular">Titular</option>
                  <option value="Fijo">Fijo</option>
                  <option value="Contratado">Contratado</option>
                  <option value="Jubilado">Jubilado</option>
                </select>
              </div>
              <div class="fechaIngresoE">
                <label for="fechaIngreso" class="fechaIngresoL">Fecha de Ingreso</label>
              </div>
              <div class="fechaIngresoC">
                <input type="date" class="fechaIngreso" name="fechaIngreso" id="fechaIngreso">
              </div>

              <div class="botones">
                <a href="../"><input type="button" class="botonRegresar" name="regresar" id="botonRegresar" value="Regresar"> </a>
                <input type="button" class="botonGuardar" name="enviar" id="botonGuardar" value="Guardar">
                <input type="button" class="botonLimpiar" name="limpiar" id="botonLimpiar" value="Limpiar">
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
    <script type="text/javascript" src="<?php echo js; ?>s_agrega.js"></script>
  </body>
</html>
