<?php
  $this->modelo("Conexion");
  $this->modelo("Usuario");
  $usu = new Usuario();
  $usu->setNombreUsu($_POST['usuario']);
  $usu->setClave($_POST['clave']);

  switch ($usu->login())
  {
    case '1': header('Location: ' .'sismeu/');
      break;
    case '2': $mensaje = "Contraseña incorrecta";
      break;
    case '3': $mensaje = "El usuario ingresado no está registrado";
      break;
    default:
      $mensaje = "";
      break;
  }
  $datos = ['mensaje' => $mensaje];
  $this->vista("inicio_sesion", $datos);
?>
