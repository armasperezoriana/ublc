<?php
  $this->modelo("Conexion");
  $this->modelo("Usuario");

  $usu = new Usuario(); //Creo el Objeto de Clase Usuario
  if (isset($_POST['nombreUsu']))
  {
    $usu->setNombreUsu($_POST['nombreUsu']); // Evaluo si el nombre de Usuario se envio por Post
  }
  else
  {
    $usu->setNombreUsu($_SESSION['login']); // Asignó el nombre de Usuario de la sesión al objeto de la clase
  }

  $datos = $usu->consultar();
  $this->vista("administrar_usuarios/admin", $datos);
?>
