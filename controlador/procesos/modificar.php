<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");

  $trab = new Trabajador();
  $bene = new Beneficiario();

  $trabajador = $trab->consultas("WHERE cedula = '".$_POST['cedula']."'");

  $bene->setCedula($_POST['cedula']);
  $bene->consultar();

  $modificar = true;
  $restaurar = false;
  if ($bene->getId() != NULL)
  {
    $modificar = false;
    $datos['mensaje'] = "La Cédula " .$_POST['cedula'] ." se encuentra vinculada a un Beneficiario registrado";
    $this->vista("mensaje", $datos);
  }
  if (count($trabajador) > 0)
  {
    if ($trabajador[0]['id'] != $_POST['id'])
    {
      if ($trabajador[0]['status'] == 1) {
        $modificar = false;
        $datos['mensaje'] = "La Cédula " .$_POST['cedula'] ." se encuentra vinculada a un Titular registrado";
        $this->vista("mensaje", $datos);
      }
      else {
        $trab->setId($trabajador[0]['id']);
        if ($trab->eliminarCompleto());
      }
    }
  }

  if ($modificar)
  {// Realizando las modificaciones de los datos
    $trab->setId($_POST['id']);
    $trab->setTrabajador($_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['nacimiento'],
      $_POST['sexo'][0], $_POST['estCivil'], $_POST['direccion'], $_POST['telefonoFijo'],
      $_POST['telefonoCelular'], $_POST['correo'], $_POST['tipoTrabajador'],
      $_POST['estTrabajo'], $_POST['fechaIngreso']); //Construyendo el objeto
    if ($trab->modificar()) {
      $this->modelo("Patologia");
      $this->modelo("Medicamento");
      $this->modelo("Relacional");
      $relacion = new Relacional();
      $datos['cedula'] = $trab->getCedula();
      $datos['id'] = $trab->getId();
      $idPat = $relacion->consultarTrab_Pat("WHERE id_trabajador = ".$trab->getId());
      $idMed = $relacion->consultarTrab_Med("WHERE id_trabajador = ".$trab->getId());
      if (count($idPat) > 0) {
        $i = 0;
        $condicion = "";
        while ($i < count($idPat)) {
          if ($i == 0) {
            $condicion = "WHERE id = ".$idPat[$i]['id_patologia'];
          }
          else {
            $condicion .= " OR id = ".$idPat[$i]['id_patologia'];
          }
          $i++;
        }
        $pat = new Patologia();
        $datos['patologias'] = $pat->consultas($condicion);
      }
      else {
        $datos['patologias'] = NULL;
      }
      $i = 0;
      if (count($idMed) > 0) {
        $condicion = "";
        while ($i < count($idMed)) {
          if ($i == 0) {
            $condicion = "WHERE id = ".$idMed[$i]['id_medicamento'];
          }
          else {
            $condicion .= " OR id = ".$idMed[$i]['id_medicamento'];
          }
          $i++;
        }
        $this->modelo("Medicamento");
        $med = new Medicamento();
        $datos['medicamentos'] = $med->consultas($condicion);
      }
      else {
        $datos['medicamentos'] = NULL;
      }

      $datos['mensaje'] = "El Titular con cédula " .$trab->getCedula() ." ha sido modificado";
      $this->vista("trabajadores/asociarDatosBasicos", $datos);
    }
    else {
      $datos['mensaje'] = "Problema al modificar los datos";
      $this->vista("mensaje", $datos);
    }

  }

?>
