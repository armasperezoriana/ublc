<?php  
  $this->modelo("Conexion");
  $this->modelo("Patologia");
  $pat = new Patologia();
  $pat->setNombre($_POST['nombre']);
  $pat->setId($_POST['id']);
  if ($pat->eliminar()) {
    $datos['mensaje'] = "La Patología '".$pat->getNombre()."' ha sido eliminada correctamente";
    $this->vista("mensaje", $datos);
  }
  else {
    $datos['mensaje'] = "Problema al eliminar la patología";
    $this->vista("mensaje", $datos);
  }
?>
