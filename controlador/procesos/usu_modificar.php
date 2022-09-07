<?php
    $this->modelo("Conexion");
    $this->modelo("Usuario");

    $usu = new Usuario(); //Creo el Objeto de Clase Usuario
    $usuarios = $usu->consultas("WHERE correo = '".$_POST['correo']."'");
    if (count($usuarios) > 0 && $usuarios[0]['id'] != $_POST['id']) {
      $datos['mensaje'] = "El Correo ".$_POST['correo']." se encuentra registrado a otra persona";
      $this->vista("mensaje", $datos);
    }
    else {
      $usu->setNombreUsu($_POST['nombreU']);
      $usu->consultarId();
      $modificar = true;
      if ($usu->getId() != NULL && $usu->getId() != $_POST['id']) {
        $modificar = false;
        $datos['mensaje'] = "El Usuario ".$usu->getNombreUsu().
          " se encuentra registrado a otra persona";
        $this->vista("mensaje", $datos);
      }
      if ($modificar) {
        $usu->setId($_POST['id']);
        $usu->setUsuario($_POST['nombres'], $_POST['apellidos'], $_POST['cedula'], $_POST['correo'],
          $_POST['nombreU'], $_POST['tipoUsu'], $_POST['clave']);
        if ($usu->modificar()) {
          $datos['mensaje'] = "El Usuario de ".$usu->getNombres()." ".$usu->getApellidos().
            " ha sido modificado";
          $this->vista("mensaje", $datos);
        }
        else {
          $datos['mensaje'] = "Problema al modificar Usuario";
          $this->vista("mensaje", $datos);
        }
      }
    }

?>
