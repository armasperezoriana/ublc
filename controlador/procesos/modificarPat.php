<?php
  $this->modelo("Conexion");
  $this->modelo("Patologia");
  $modificar = true;
  $pat = new Patologia();
  $pat->setNombre($_POST['nombre']);
  $pat->consultar();
  if ($pat->getId() != NULL && $pat->getId() != $_POST['id']) {
    $modificar = false;
    $datos['mensaje'] = "La Patología '".$pat->getNombre()."' se encuentra registrada";
    $this->vista("mensaje", $datos);
  }
  if ($modificar) {
    $pat->setId($_POST['id']);
    if ($pat->modificar()) {
      $datos['mensaje'] = "La Patología '".$pat->getNombre()."' ha sido modificada correctamente";
      $this->vista("mensaje", $datos);
    }
    else {
      $datos['mensaje'] = "Problema al modificar la patología";
      $this->vista("mensaje", $datos);
    }
  }
?>
