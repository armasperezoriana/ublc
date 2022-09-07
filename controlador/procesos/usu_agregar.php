<?php
  $this->modelo("Conexion");
  $this->modelo("Usuario");

  $usu = new Usuario(); //Creo el Objeto de Clase Usuario
  $usu->setNombreUsu($_POST['nombreU']);
  $usu->consultarId();
  if ($usu->getId() != NULL) {
    $datos['mensaje'] = "El Usuario ".$usu->getNombreUsu().
      " se encuentra registrado a otra persona";
    $this->vista("mensaje", $datos);
  }
  else {
    $usu->setUsuario($_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['correo'],
      $_POST['nombreU'], $_POST['tipoUsu'], $_POST['clave']);
    if ($usu->registrar()) {
      $datos['mensaje'] = "El Usuario de ".$usu->getNombres()." ".$usu->getApellidos().
        " ha sido registrado correctamente";
      $this->vista("mensaje", $datos);
    }
    else {
      $datos['mensaje'] = "Problema al registrar Usuario";
      $this->vista("mensaje", $datos);
    }
  }
?>
