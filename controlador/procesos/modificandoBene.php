<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");
  $this->modelo("Relacional");
  $bene = new Beneficiario();
  $trab = new Trabajador();
  $relacion = new Relacional();
  $bene->setCedula($_POST['cedula']);
  $datos = $bene->consultar();
  //Conseguir su titular
  $id = $relacion->consultarTrab_Bene("WHERE id_beneficiario = ".$bene->getId());
  $trab->setId($id[0]['id_trabajador']);
  $trab->consultar();
  $datos['cedulatitular'] = $trab->getCedula();

  $this->vista("beneficiarios/modificar/modificando", $datos);
?>
