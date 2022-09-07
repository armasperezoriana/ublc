<?php
  $this->modelo("Conexion");
  $this->modelo("Usuario");
  $usu = new Usuario();
  $enviar = false;
  $usuarios = $usu->consultas("WHERE correo = '".$_POST['recupera']."'");
  if (count($usuarios) > 0) {
    $correo = $usuarios[0]['correo'];
    $usuario = $usuarios[0]['nombreusu'];
    $clave = $usuarios[0]['clave'];
    $enviar = true;
  }
  $usu->setNombreUsu($_POST['recupera']);
  $usu->consultar();
  if ($usu->getId() != NULL) {
    $correo = $usu->getCorreo();
    $usuario = $usu->getNombreUsu();
    $clave = $usu->getClave();
    $enviar = true;
  }
  if ($enviar) {
    $mensaje = "Recuperar Usuario del UBLC \n ".
     "Usuario: ".$usuario." \n ".
     "Contraseña: ".$clave." \n ";
    mail($correo, "Recuperar Usuario del UBLC", $mensaje);
    $datos['mensaje'] = "La información para recuperar el acceso fue enviada al correo ".$correo;
    $this->vista("mensaje", $datos);
  }
  else {
    $datos['mensaje'] = "El Usuario o Correo ingresado no se encuentra registrado";
    $this->vista("mensaje", $datos);
  }
?>
