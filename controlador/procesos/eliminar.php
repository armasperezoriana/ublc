<?php

  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");
  $this->modelo("Relacional");
  $trab = new Trabajador();
  $bene = new Beneficiario();
  $relacion = new Relacional();
  $trab->setCedula($_POST['cedula']);
  $trab->consultar();
  if ($trab->getId() != NULL) {
    $benes = $relacion->consultarTrab_Bene("WHERE id_trabajador = ".$trab->getId());
    foreach ($benes as $persona) {
      $bene->setId($persona['id_beneficiario']);
      $bene->eliminar();
    }

    $relacion->eliminarTrab_Pat("WHERE id_trabajador = ".$trab->getId());
    $relacion->eliminarTrab_Med("WHERE id_trabajador = ".$trab->getId());
    if ($trab->eliminar()) {
      $datos['mensaje'] = "El Titular con cédula " .$trab->getCedula() ." ha sido eliminado";
      $this->vista("mensaje", $datos);
    }
    else {
      $datos['mensaje'] = "Problema al eliminar";
      $this->vista("mensaje", $datos);
    }
  }
  else {
    $datos['mensaje'] = "El Titular ya fue eliminado";
    $this->vista("mensaje", $datos);
  }



?>
