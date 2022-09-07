<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");
  $this->modelo("Relacional");

  $bene = new Beneficiario();
  $trab = new Trabajador();
  $relacion = new Relacional();
  $bene->setCedula($_POST['cedula']);
  $datos = $bene->consultar();
  $idTrab = $relacion->consultarTrab_Bene("WHERE id_beneficiario = ".$bene->getId());//Conseguir el titular
  $trab->setId($idTrab[0]['id_trabajador']);
  $datos['titular'] = $trab->consultar();

  $idPat = $relacion->consultarBene_Pat("WHERE id_beneficiario = ".$bene->getId()); //Obtener Patologías
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

  $idMed = $relacion->consultarBene_Med("WHERE id_beneficiario = ".$bene->getId()); //Obtener Medicamentos
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


  $this->vista("beneficiarios/consultar/consultando", $datos);
?>
