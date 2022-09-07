<?php
  require_once '../../modelo/classConexion.php';
  require_once '../../modelo/classUsuario.php';

  $encontrado = "No";
  $usu = new Usuario();

  $usu->setNombreUsu($_POST['usuario']);
  $usu->consultar();
  if ($usu->getId() != NULL) {
    $encontrado = "1";
  }

  echo $encontrado;

?>
