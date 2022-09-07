<?php
  require_once '../../modelo/classConexion.php';
  require_once '../../modelo/classTrabajador.php';
  require_once '../../modelo/classBeneficiario.php';

  $encontrado = "No";
  $trab = new Trabajador();
  $bene = new Beneficiario();

  $trab->setCedula($_POST['cedula']);
  $trabajadores = $trab->consultas("WHERE cedula = '".$_POST['cedula']."' AND status = 1");

  $bene->setCedula($_POST['cedula']);
  $beneficiarios = $bene->consultas("WHERE cedula = '".$_POST['cedula']."' AND status = 1");
  $encontrado = "No";
  if (count($trabajadores) > 0) {
    $encontrado = "0";
  }
  if (count($beneficiarios) > 0) {
    $encontrado = "2";
  }

  echo $encontrado;

?>
