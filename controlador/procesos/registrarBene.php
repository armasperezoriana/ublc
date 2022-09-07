<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");
  $this->modelo("Relacional");
  $trab = new Trabajador();
  $bene = new Beneficiario();
  $relacion = new Relacional();

  $bene->setCedula($_POST['cedula']);
  $bene->consultar();

  if ($bene->getId() != NULL)
  {
      $datos['mensaje'] = "La Cédula " .$_POST['cedula'] ." se encuentra vinculada a un Beneficiario registrado";
      $this->vista("mensaje", $datos);
  }
  //-------------------------------------------------

  if ($bene->getId() == NULL)
  {
    $trab->setCedula($_POST['cedulaTitular']);
    $trab->consultar();

    if ($trab->getId() != NULL)
    {
      $bene->setBeneficiario($_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['nacimiento'],
        $_POST['sexo'][0], $_POST['estCivil'], $_POST['direccion'], $_POST['telefonoFijo'],
        $_POST['telefonoCelular'], $_POST['correo'], $_POST['cedulaTitular'], $_POST['parentesco']);
      if ($bene->registrar()) {
        $bene->consultarId(); //Enviar el Id al Objeto
        $relacion->SETtrab_bene($trab->getId(), $bene->getId());
        $relacion->registrarTrab_Bene();
        $datos['mensaje'] = "La Cédula " .$bene->getCedula() ." ha sido registrada como Beneficiario correctamente";
        $datos['cedula'] = $bene->getCedula();
        $datos['id'] = $bene->getId();
        $this->vista("beneficiarios/asociarDatosBasicos", $datos);
      }
      else {
        $datos['mensaje'] = "Problema al registrar los datos";
        $this->vista("mensaje", $datos);//Mostrar el mensaje de error
      }

    }
    else
    {
      $datos['mensaje'] = "La Cédula " .$_POST['cedulaTitular'] ." no se encuentra vinculada a ningún Titular";
      $this->vista("mensaje", $datos);
    }
  }

?>
