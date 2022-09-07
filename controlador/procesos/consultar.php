<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");
  $this->modelo("Relacional");
  $trab = new Trabajador();
  $relacion = new Relacional();

  $trab->setCedula($_POST['cedula']);
  $datos = $trab->consultar();
  $id = $relacion->consultarTrab_Bene("WHERE id_trabajador = ".$trab->getId());
  if (count($id) > 0) { //Buscando los Beneficiarios
    $i = 0;
    $condicion = "";
    while ($i < count($id)) {
      if ($i == 0) {
        $condicion = "WHERE id = ".$id[$i]['id_beneficiario'];
      }
      else {
        $condicion .= " OR id = ".$id[$i]['id_beneficiario'];
      }
      $i++;
    }
    $bene = new Beneficiario();
    $beneficiarios = $bene->consultas($condicion);
    $datos['beneficiarios'] = $beneficiarios;
  }
  else {
    $datos['beneficiarios'] = NULL;
  }

  $idPat = $relacion->consultarTrab_Pat("WHERE id_trabajador = ".$trab->getId()); //Obtener Patologías
  if (count($idPat) > 0) {
    $i = 0;
    $condicion = "";
    $this->modelo("Patologia");
    $pat = new Patologia();
    while ($i < count($idPat)) {
      if ($i == 0) {
        $condicion = "WHERE id = ".$idPat[$i]['id_patologia'];
      }
      else {
        $condicion .= " OR id = ".$idPat[$i]['id_patologia'];
      }
      $i++;
    }
    $i = 0;
    $patologias = $pat->consultas($condicion);
    foreach ($patologias as $patologia) {
      if ($i == 0) {
        $datos['patologias'] = $patologia['nombre'];
      }
      else {
        $datos['patologias'] .= ", ".$patologia['nombre'];
      }
      $i++;
    }
  }
  else {
    $datos['patologias'] = NULL;
  }

  $idMed = $relacion->consultarTrab_Med("WHERE id_trabajador = ".$trab->getId()); //Obtener Medicamentos
  if (count($idMed) > 0) {
    $i = 0;
    $condicion = "";
    $this->modelo("Medicamento");
    $med = new Medicamento();
    while ($i < count($idMed)) {
      if ($i == 0) {
        $condicion = "WHERE id = ".$idMed[$i]['id_medicamento'];
      }
      else {
        $condicion .= " OR id = ".$idPat[$i]['id_medicamento'];
      }
      $i++;
    }
    $i = 0;
    $medicamentos = $med->consultas($condicion);
    foreach ($medicamentos as $medicamento) {
      if ($i == 0) {
        $datos['medicamentos'] = $medicamento['nombre'];
      }
      else {
        $datos['medicamentos'] = ", ".$medicamento['nombre'];
      }
    }
  }
  else {
    $datos['medicamentos'] = NULL;
  }

  $this->vista("trabajadores/consultar/consultando", $datos);
?>
