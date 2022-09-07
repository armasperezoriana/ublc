<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $trab = new Trabajador();

  $trabajadores = $trab->consultas("WHERE cedula = '".$_POST['cedula']."'");

  if (count($trabajadores) > 0)
  {
    if ($trabajadores[0]['status'] == 0)
    {
      $trab->setTrabajador($_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['nacimiento'],
        $_POST['sexo'][0], $_POST['estCivil'], $_POST['direccion'], $_POST['telefonoFijo'],
        $_POST['telefonoCelular'], $_POST['correo'], $_POST['tipoTrabajador'],
        $_POST['estTrabajo'], $_POST['fechaIngreso']); //Construyendo el objeto
      $trab->setId($trabajadores[0]['id']);
      $trab->restaurar();
      if ($trab->modificar()) {
        $datos['mensaje'] = "La Cédula " .$trab->getCedula() ." ha sido registrada como Titular correctamente";
        $datos['cedula'] = $trab->getCedula();
        $datos['id'] = $trab->getId();
        $this->vista("trabajadores/asociarDatosBasicos", $datos);
      }
      else {
        $datos['mensaje'] = "Problema al registrar los datos";
        $this->vista("mensaje", $datos);//Mostrar el mensaje de error
      }
    }
    else
    {
      $datos['mensaje'] = "La Cédula " .$_POST['cedula'] ." se encuentra vinculada a un Titular registrado";
      $this->vista("mensaje", $datos);
    }

  }
  //-------------------------------------------------
  if (count($trabajadores) == 0)
  {
    $trab->setTrabajador($_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['nacimiento'],
      $_POST['sexo'][0], $_POST['estCivil'], $_POST['direccion'], $_POST['telefonoFijo'],
      $_POST['telefonoCelular'], $_POST['correo'], $_POST['tipoTrabajador'],
      $_POST['estTrabajo'], $_POST['fechaIngreso']); //Construyendo el objeto
    if ($trab->registrar()) {//Insertando los datos en la BD
      $trab->consultarId(); //Enviar el Id al Objeto
      $datos['mensaje'] = "La Cédula " .$trab->getCedula() ." ha sido registrada como Titular correctamente";
      $datos['cedula'] = $trab->getCedula();
      $datos['id'] = $trab->getId();
      $this->vista("trabajadores/asociarDatosBasicos", $datos);
    }
    else {
      $datos['mensaje'] = "Problema al registrar los datos";
      $this->vista("mensaje", $datos);//Mostrar el mensaje de error
    }
  }

?>
