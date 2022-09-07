<?php
  require_once '../../modelo/classConexion.php';
  if ($_POST['table'] == "patologia") {
    require_once '../../modelo/classPatologia.php';
    $pat = new Patologia();
    $pat->setNombre($_POST['nombre']);
    $pat->consultar();
    if ($pat->getId() != NULL) {
      echo $pat->getId();
    }
  }
  if ($_POST['table'] == "medicamento") {
    require_once '../../modelo/classMedicamento.php';
    $med = new Medicamento();
    $med->setNombre($_POST['nombre']);
    $med->consultar();
    if ($med->getId() != NULL) {
      echo $med->getId();
    }
  }

?>
