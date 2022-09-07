<?php
  $this->modelo("Conexion");
  $this->modelo("Relacional");
  $relacion = new Relacional();
  if (isset($_POST['patologias'])) {
    for ($i=0; $i < count($_POST['patologias']); $i++) {
      $relacion->SETtrab_pat($_POST['idPersona'], $_POST['patologias'][$i]);
      $relacion->registrarTrab_Pat();
    }
  }

  if (isset($_POST['medicamentos'])) {
    for ($i=0; $i < count($_POST['medicamentos']); $i++) {
      $relacion->SETtrab_med($_POST['idPersona'], $_POST['medicamentos'][$i]);
      $relacion->registrarTrab_Med();
    }
  }
  $datos['mensaje'] = "La Cédula " .$_POST['cedulaPersona'] ." ha sido registrada como Titular correctamente";
  $this->vista("mensaje", $datos);//Mostrar el mensaje de registro
?>
