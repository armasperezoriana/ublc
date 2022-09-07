<?php
  $this->modelo("Conexion");
  $this->modelo("Medicamento");
  $med = new Medicamento();
  $med->setNombre($_POST['nombre']);
  $med->consultar();
  if ($med->getId() == NULL) {
    if ($med->registrar()) {
      $datos['mensaje'] = "El Medicamento '".$med->getNombre()."' ha sido registrado correctamente";
      $this->vista("mensaje", $datos);
    }
    else {
      $datos['mensaje'] = "Problema al registrar el medicamento";
      $this->vista("mensaje", $datos);
    }
  }
  else {
    $datos['mensaje'] = "El Medicamento '".$med->getNombre()."' se encuentra registrado";
    $this->vista("mensaje", $datos);
  }
?>
