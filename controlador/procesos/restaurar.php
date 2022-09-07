<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $trab = new Trabajador();
  $trab->setCedula($_POST['cedulaRestaurar']);
  $trab->restaurar();
  $trab->consultarId();
  if ($trab->getId() != NULL) {
    $mensaje = "La Información del trabajador con la Cédula ".$trab->getCedula().
    " ha sido restaurada";
  }
  else {
    $mensaje = "La Información del trabajador con la Cédula ".$_POST['cedulaRestaurar'].
    " no pudo ser restaurada";
  }
  $datos = ['mensaje' => $mensaje];
  $this->vista("mensaje", $datos);
?>
