<?php
  require_once '../../modelo/classConexion.php';
  require_once '../../modelo/classTrabajador.php';

  $trab = new Trabajador();
  $condicion = "WHERE cedula = '".$_POST['cedula']."' AND status = 0";
  $resultado = $trab->consultas($condicion);
  if (count($resultado) > 0) {
    echo "1";
  }

?>
