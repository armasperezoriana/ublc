<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>UBLC</title>
    <link rel="stylesheet" href="<?php echo css; ?>pat_med.css">
    <link rel="shortcut icon" href="<?php echo img; ?>institucion.ico">
  </head>
  <body>

    <div class="todo">
      <?php $this->vista("menu"); ?>
      <div class="central">
        <div class="center">
          <div class="sismeu">
            <img src="<?php echo img; ?>logoSISMEU2.png" alt="">
          </div>
          <div class="titulo">
            <h1>MEDICAMENTOS</h1>
          </div>
          <form class="formulario" action="" method="post" id="formulario">
            <input type="hidden" name="tabla" value="medicamento">
            <div class="busca">
              <input type="text" class="busqueda" name="busqueda" placeholder="Ingrese el nombre">
            </div>
            <select class="seleccion" name="seleccion">
              <option value="">-Seleccionar-</option>
            </select>
            <input type="hidden" name="id" value="">
            <div class="botones">
              <button type="button" name="button" id="modificar">Modificar</button>
              <button type="button" name="button" id="eliminar">Eliminar</button>
            </div>
            <button type="button" class="registrar" name="button" id="registrar">Registrar</button>
          </form>

        </div>
        <footer>
          Dirección de Gestión de Talento Humano <br>
          Unidad de Beneficios Legales y Contractuales
        </footer>
      </div>
    </div>

    <div class="registra">
      <div class="contenido">
        <h2>Registrar Medicamento</h2>
        <form class="" id="formRegistrar" action="registrar/" method="post">
          <input type="text" name="nombre" placeholder="Nombre de Medicamento">
        </form>
        <div class="opciones">
          <button type="button" name="button" id="atrasRegistrar">Atras</button>
          <button type="button" name="button" id="registralo">Guardar</button>
        </div>
      </div>
    </div>
    <div class="modifica">
      <div class="contenido">
        <h2>Modificar Medicamento</h2>
        <form class="" id="formModificar" action="modificar/" method="post">
          <input type="text" name="nombre" placeholder="">
          <input type="hidden" name="id" value="">
        </form>
        <div class="opciones">
          <button type="button" name="button" id="atrasModificar">Atras</button>
          <button type="button" name="button" id="modificalo">Guardar</button>
        </div>
      </div>
    </div>
    <div class="elimina">
      <div class="contenido">
        <h2>Eliminar Medicamento</h2>
        <form class="" id="formEliminar" action="eliminar/" method="post">
          <input type="text" name="nombre" readonly>
          <input type="hidden" name="id" value="">
        </form>
        <div class="opciones">
          <button type="button" name="button" id="eliminalo">Sí</button>
          <button type="button" name="button" id="atrasEliminar">No</button>
        </div>
      </div>
    </div>

    <script type="text/javascript" src="<?php echo js; ?>pat_med.js"></script>
  </body>
</html>
