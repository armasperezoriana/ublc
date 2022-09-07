<?php
  require_once '../../modelo/classConexion.php';
  require_once '../../modelo/classUsuario.php';

  $encontrado = "No";
  $usu = new Usuario();

  $resultados = $usu->consultas("WHERE correo = '".$_POST['correo']."'");

  if (count($resultados) > 0) {
    $encontrado = "1";
  }

  echo $encontrado;

?>
