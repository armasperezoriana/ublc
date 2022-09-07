<?php
  $this->modelo("Conexion");
  $this->modelo("Relacional");
  $relacion = new Relacional();
  $relacion->eliminarBene_Pat("WHERE id_beneficiario = ".$_POST['idPersona']);
  $relacion->eliminarBene_Med("WHERE id_beneficiario = ".$_POST['idPersona']);
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
  $datos['mensaje'] = "El Titular con cédula " .$_POST['cedulaPersona'] ." ha sido modificado";
  $this->vista("mensaje", $datos);//Mostrar el mensaje de Modificación
?>
