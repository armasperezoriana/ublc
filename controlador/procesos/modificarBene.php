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

  $bene->setCedula($_POST['cedula']);
  $bene->consultar();

  $modificar = true;
  if ($trab->getId() != NULL)
  {
    $modificar = false;
    $datos['mensaje'] = "La Cédula " .$_POST['cedula'] ." se encuentra vinculada a un Titular registrado";
    $this->vista("mensaje", $datos); //Enlace al mensaje
  }
  if ($bene->getId() != NULL)
  {
    if ($bene->getId() != $_POST['id'])
    {
      $modificar = false;
      $datos['mensaje'] = "La Cédula " .$_POST['cedula'] ." se encuentra vinculada a un Beneficiario registrado";
      $this->vista("mensaje", $datos);
    }
  }

  if ($modificar)
  {
    $trab->setCedula($_POST['cedulaTitular']);
    $trab->consultar();
    if ($trab->getId() != NULL)
    {
      $bene->setBeneficiario($_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['nacimiento'],
        $_POST['sexo'][0], $_POST['estCivil'], $_POST['direccion'], $_POST['telefonoFijo'],
        $_POST['telefonoCelular'], $_POST['correo'], $_POST['cedulaTitular'], $_POST['parentesco']); //Construyendo el objeto
      $bene->setId($_POST['id']);
      if ($bene->modificar()) {
        $relacion->eliminarTrab_Bene("WHERE id_beneficiario = ".$bene->getId());//Eliminar asociación titular
        $trab->setCedula($bene->getCedulaTitular());
        $trab->consultar();
        $relacion->SETtrab_bene($trab->getId(), $bene->getId());
        $relacion->registrarTrab_Bene(); //Crear asociación con Titular

        $this->modelo("Patologia");
        $this->modelo("Medicamento");
        $this->modelo("Relacional");
        $relacion = new Relacional();
        $datos['cedula'] = $bene->getCedula();
        $datos['id'] = $bene->getId();
        $idPat = $relacion->consultarBene_Pat("WHERE id_beneficiario = ".$trab->getId());
        $idMed = $relacion->consultarBene_Med("WHERE id_beneficiario = ".$trab->getId());
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

        $datos['mensaje'] = "El Beneficiario con cédula " .$bene->getCedula() ." ha sido modificado";
        $this->vista("trabajadores/asociarDatosBasicos", $datos);
      }
      else {
        $datos['mensaje'] = "Problema al modificar los datos";
        $this->vista("mensaje", $datos);
      }
    }
    else
    {
      $datos['mensaje'] = "La Cédula " .$_POST['cedulaTitular'] ." no se encuentra vinculada a ningún Titular";
      $this->vista("mensaje", $datos);
    }
  }
?>
