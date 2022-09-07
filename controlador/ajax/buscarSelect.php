<?php
  require_once '../../modelo/classConexion.php';
  if ($_POST['table'] == "patologia") {
    require_once '../../modelo/classPatologia.php';
    $pat = new Patologia();
    if (isset($_POST['condicion'])) {
      $condicion = "WHERE nombre LIKE '%".$_POST['condicion']."%' ORDER BY nombre";
    }
    else {
      $condicion = "ORDER BY nombre";
    }
    $resultados = $pat->consultas($condicion);
  }
  if ($_POST['table'] == "medicamento") {
    require_once '../../modelo/classMedicamento.php';
    $med = new Medicamento();
    if (isset($_POST['condicion'])) {
      $condicion = "WHERE nombre LIKE '%".$_POST['condicion']."%' ORDER BY nombre";
    }
    else {
      $condicion = "ORDER BY nombre";
    }
    $resultados = $med->consultas($condicion);
  }

  if (count($resultados) > 0) {
    foreach ($resultados as $opcion) {
      echo "<option value='".$opcion['nombre']."'>".$opcion['nombre']."</option>";
    }
  }

?>
