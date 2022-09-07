<?php

  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");
  $this->modelo("Relacional");
  $bene = new Beneficiario();
  $bene->setCedula($_POST['cedula']);
  $bene->consultar();
  if ($bene->getId() != NULL) {
    if ($bene->eliminar()) {
      $datos['mensaje'] = "El Beneficiario con cédula " .$bene->getCedula() ." ha sido eliminado";
      $this->vista("mensaje", $datos);
    }
    else {
      $datos['mensaje'] = "Error al eliminar los datos";
      $this->vista("mensaje", $datos);
    }
  }
  else {
    $datos['mensaje'] = "El Beneficiario ya fue eliminado";
    $this->vista("mensaje", $datos);
  }


?>
