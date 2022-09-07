<?php 
  $this->modelo("Conexion");
  $this->modelo("Medicamento");
  $med = new Medicamento();
  $med->setNombre($_POST['nombre']);
  $med->setId($_POST['id']);
  if ($med->eliminar()) {
    $datos['mensaje'] = "El Medicamento '".$med->getNombre()."' ha sido eliminado correctamente";
    $this->vista("mensaje", $datos);
  }
  else {
    $datos['mensaje'] = "Problema al eliminar el medicamento";
    $this->vista("mensaje", $datos);
  }
?>
