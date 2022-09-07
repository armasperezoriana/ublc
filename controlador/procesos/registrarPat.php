<?php
  $this->modelo("Conexion");
  $this->modelo("Patologia");
  $pat = new Patologia();
  $pat->setNombre($_POST['nombre']);
  $pat->consultar();
  if ($pat->getId() == NULL) {
    if ($pat->registrar()) {
      $datos['mensaje'] = "La Patología '".$pat->getNombre()."' ha sido registrada correctamente";
      $this->vista("mensaje", $datos);
    }
    else {
      $datos['mensaje'] = "Problema al registrar la patología";
      $this->vista("mensaje", $datos);
    }
  }
  else {
    $datos['mensaje'] = "La Patología '".$pat->getNombre()."' se encuentra registrada";
    $this->vista("mensaje", $datos);
  }
?>
