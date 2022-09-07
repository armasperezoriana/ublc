<?php
  $this->modelo("Conexion");
  $this->modelo("Relacional");
  $relacion = new Relacional();
  if (isset($_POST['patologias'])) {
    for ($i=0; $i < count($_POST['patologias']); $i++) {
      $relacion->SETbene_pat($_POST['idPersona'], $_POST['patologias'][$i]);
      $relacion->registrarBene_Pat();
    }
  }

  if (isset($_POST['medicamentos'])) {
    for ($i=0; $i < count($_POST['medicamentos']); $i++) {
      $relacion->SETbene_med($_POST['idPersona'], $_POST['medicamentos'][$i]);
      $relacion->registrarBene_Med();
    }
  }
  $datos['mensaje'] = "La Cédula " .$_POST['cedulaPersona'] ." ha sido registrada como Beneficiario correctamente";
  $this->vista("mensaje", $datos);//Mostrar el mensaje de registro
?>
