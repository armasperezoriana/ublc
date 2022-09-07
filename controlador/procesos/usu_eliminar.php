<?php
  $this->modelo("Conexion");
  $this->modelo("Usuario");
  $usu = new Usuario();
  $eliminar = true;
  $usu->setId($_POST['usuarioEliminar']);
  $usu->consultar();
  if ($usu->getTipoUsu() == "Administrador") {
    $usuarios = $usu->consultas("WHERE tipousu = 'Administrador'");
    if (count($usuarios) == 1) {
      $eliminar = false;
      $datos['mensaje'] = "El Usuario ".$usu->getNombreUsu()." es el único Administrador, ".
        "por lo tanto no puede ser eliminado";
      $this->vista("mensaje", $datos);
    }
  }
  if ($eliminar) {
    if ($usu->eliminar()) {
      $datos['mensaje'] = "El Usuario ha sido eliminado correctamente";
      $this->vista("mensaje", $datos);
      $usu->setNombreUsu($_SESSION['login']);
      $usu->setClave($_POST['claveConfirmar']);
      $usu->login();
    }
    else {
      $datos['mensaje'] = "Problema al eliminar Usuario";
      $this->vista("mensaje", $datos);
    }
  }


?>
