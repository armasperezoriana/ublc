<div class="menu">
  <div class="invocar">
    <a href="#lateral">
    <img src="<?php echo img; ?>desplegable2.png" alt="">
    </a>
  </div>

  <aside id="lateral">
    <a href="<?php echo dir; ?>sismeu/"><nav>SISMEU</nav></a>
    <a href="<?php echo dir; ?>trabajadores/"><nav>Titulares</nav></a>
    <a href="<?php echo dir; ?>beneficiarios/"><nav>Beneficiarios</nav></a>
    <a href="<?php echo dir; ?>sismeu/datos_basicos/"><nav>Datos Básicos</nav></a>
    <a href="<?php echo dir; ?>usuarios/"><nav>
      <?php if ($_SESSION['level'] == "Administrador") {
        echo "Administrar Usuarios";
      }
      if ($_SESSION['level'] == "Normal") {
        echo "Configurar Usuario";
      } ?></nav></a>
    <a href="<?php echo dir; ?>inicio/logout"><nav>Cerrar Sesión</nav></a>
    <div class="esconder">
      <a href="#">
      <img src="<?php echo img; ?>desplegable.png" alt="">
      </a>
    </div>
  </aside>
</div>
