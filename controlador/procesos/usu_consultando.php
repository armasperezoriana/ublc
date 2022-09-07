<?php
  $this->modelo("Conexion");
  $this->modelo("Usuario");
  $usu = new Usuario();
  $sqlN = "WHERE tipousu = 'Normal'";
  $normal = $usu->consultas($sqlN);


  $sqlA = "WHERE tipousu = 'Administrador'";
  $administrador = $usu->consultas($sqlA);

  if (isset($normal) && count($normal) > 0) {
    echo
    "<div class='usuarios'>
      <h2 class='subtitulo_informacion'>Usuarios Normales</h2>
      <div class='contenidoUsuarios'>
          <div class='subtitulo'>
            <h2>Nombre de Usuario</h2>
          </div>
          <div class='subtitulo'>
            <h2>Cédula</h2>
          </div>
          <div class='subtitulo'>
            <h2>Nombres y Apellidos</h2>
          </div>
          <div class='subtitulo'>
            <h2>E-mail</h2>
          </div>
        ";
        foreach ($normal as $normales) {
          echo "<h2 class='subtitulo_dato nombreUsuario' name='nombreUsuario'>".$normales['nombreusu']."</h2>
          <h2 class='subtitulo_dato'>".$normales['cedula']."</h2>
          <h2 class='subtitulo_dato'>".$normales['nombres']." ".$normales['apellidos']."</h2>
          <h2 class='subtitulo_dato'>".$normales['correo']."</h2>";
        }
      echo"</div>
       </div>";
  }

  if (isset($administrador) && count($administrador) > 0) {
    echo
    "<div class='usuarios'>
      <h2 class='subtitulo_informacion'>Usuarios Administradores</h2>
      <div class='contenidoUsuarios'>
          <div class='subtitulo'>
            <h2>Nombre de Usuario</h2>
          </div>
          <div class='subtitulo'>
            <h2>Cédula</h2>
          </div>
          <div class='subtitulo'>
            <h2>Nombres y Apellidos</h2>
          </div>
          <div class='subtitulo'>
            <h2>E-mail</h2>
          </div>
        ";
        foreach ($administrador as $administradores) {
          echo "<h2 class='subtitulo_dato'>".$administradores['nombreusu']."</h2>
          <h2 class='subtitulo_dato'>".$administradores['cedula']."</h2>
          <h2 class='subtitulo_dato'>".$administradores['nombres']." ".$administradores['apellidos']."</h2>
          <h2 class='subtitulo_dato'>".$administradores['correo']."</h2>";
        }
      echo"</div>
       </div>";
  }

?>
