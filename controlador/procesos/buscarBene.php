<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");
  $bene = new Beneficiario();

  $bene->setCedula($_GET['buscar']);
  $datos = $bene->consultar();
  if ($bene->getId() == NULL) {
    $datos = NULL;
  }
  $this->vista("beneficiarios/consultar", $datos);
?>
