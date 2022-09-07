<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $trab = new Trabajador();

  $trab->setCedula($_GET['buscar']);
  $datos = $trab->consultar();
  if ($trab->getId() == NULL) {
    $datos = NULL;
  }
  $this->vista("trabajadores/consultar", $datos);
?>
