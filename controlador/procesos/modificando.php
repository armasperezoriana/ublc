<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $trab = new Trabajador();
  $trab->setCedula($_POST['cedula']);
  $datos = $trab->consultar();

  $this->vista("trabajadores/modificar/modificando", $datos);
?>
