<?php  
  $this->modelo("Conexion");
  $this->modelo("Medicamento");
  $modificar = true;
  $med = new Medicamento();
  $med->setNombre($_POST['nombre']);
  $med->consultar();
  if ($med->getId() != NULL) {
    if ($med->getId() != NULL && $med->getId() != $_POST['id']) {
      $modificar = false;
      $datos['mensaje'] = "El Medicamento '".$med->getNombre()."' se encuentra registrado";
      $this->vista("mensaje", $datos);
    }
  }
  if ($modificar) {
    $med->setId($_POST['id']);
    if ($med->modificar()) {
      $datos['mensaje'] = "El Medicamento '".$med->getNombre()."' ha sido modificado correctamente";
      $this->vista("mensaje", $datos);
    }
    else {
      $datos['mensaje'] = "Problema al modificar el medicamento";
      $this->vista("mensaje", $datos);
    }
  }
?>
