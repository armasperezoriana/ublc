<?php
  require_once '../../modelo/classConexion.php';
  require_once '../../modelo/classUsuario.php';
  $usu = new Usuario();
  $usu->setNombreUsu($_POST['usuario']);
  $usu->setClave($_POST['clave']);
  if ($usu->revisarClave()) {
    echo "true";
  }
  else {
    echo "false";
  }
?>
