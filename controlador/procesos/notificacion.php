<?php
	$this->modelo("Conexion");
	$this->modelo("Trabajador");

	$trab = new Trabajador();
	$dayA = date('d');
	$monthA = date('m');
	$yearA = date('Y');
	$dateA = $yearA ."-" .$monthA ."-".$dayA;
	$yearEdadMasc = $yearA-60;
	$yearEdadMascI = $yearEdadMasc."-01-01";
	$yearEdadMascF = $yearEdadMasc."-12-31";
  $yearEdadMascRelativa = $yearEdadMasc."-".$monthA."-".$dayA;
	$yearEdadFeme = $yearA-55;
	$yearEdadFemeI = $yearEdadFeme."-01-01";
	$yearEdadFemeF = $yearEdadFeme."-12-31";
  $yearEdadFemeRelativa = $yearEdadFeme."-".$monthA."-".$dayA;


  $sqlCump = "where esttrabajo != 'Jubilado' and status = 1 and nacimiento > '".$yearEdadMascI."' and nacimiento < '".$yearEdadMascRelativa."'
    and sexo = 'Masculino'
    or esttrabajo != 'Jubilado' and status = 1 and nacimiento > '".$yearEdadFemeI."' and nacimiento < '".$yearEdadFemeRelativa."'
    and sexo = 'Femenino'";
	$workerCump = $trab->consultas($sqlCump);

  $sqlProx = "where esttrabajo != 'Jubilado' and status = 1  and nacimiento > '".$yearEdadMascRelativa."' and nacimiento < '".$yearEdadMascF."'
    and sexo = 'Masculino'
    or esttrabajo != 'Jubilado' and status = 1  and nacimiento > '".$yearEdadFemeRelativa."' and nacimiento < '".$yearEdadFemeF."'
    and sexo = 'Femenino'";
	$workerProx = $trab->consultas($sqlProx);

  $sqlHoy = "where esttrabajo != 'Jubilado' and status = 1  and sexo = 'Masculino' and nacimiento = '".$yearEdadMascRelativa."' or
    esttrabajo != 'Jubilado' and status = 1  and sexo = 'Femenino' and nacimiento = '".$yearEdadFemeRelativa."'";
  $workerHoy = $trab->consultas($sqlHoy);

  if (count($workerHoy) > 0)
  {
    echo "<div class='notificacion'>
          <h2 class='subtitulo_notificacion' name='subtitulo_notificacion'>Trabajadores que están cumpliendo hoy la edad para la jubilación</h2>";
    echo "<div class='contenido_notificacion' name='contenido_notificacion'>";
      echo "<h2 class='subtitulo'>Cédula</h2>
            <h2 class='subtitulo'>Nombres y Apellidos</h2>
            <h2 class='subtitulo'>Sexo</h2>
            <h2 class='subtitulo'>Nacimiento</h2>";
    foreach ($workerHoy as $trabajador)
    {
      echo "<h2 class='subtitulo_dato'>".$trabajador['cedula']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['nombres']." ".$trabajador['apellidos']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['sexo']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['nacimiento']."</h2>";
    }
    echo "</div>";
    echo "</div>";
  }

  if (count($workerCump) > 0)
  {
    echo "<div class='notificacion'>
          <h2 class='subtitulo_notificacion' name='subtitulo_notificacion'>Trabajadores que cumplieron este año la edad para la jubilación</h2>";
    echo "<div class='contenido_notificacion' name='contenido_notificacion'>";
      echo "<h2 class='subtitulo'>Cédula</h2>
            <h2 class='subtitulo'>Nombres y Apellidos</h2>
            <h2 class='subtitulo'>Sexo</h2>
            <h2 class='subtitulo'>Nacimiento</h2>";
    foreach ($workerCump as $trabajador)
    {
      echo "<h2 class='subtitulo_dato'>".$trabajador['cedula']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['nombres']." ".$trabajador['apellidos']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['sexo']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['nacimiento']."</h2>";
    }
    echo "</div>";
    echo "</div>";
  }

  if (count($workerProx) > 0)
  {
    echo "<div class='notificacion'>
          <h2 class='subtitulo_notificacion' name='subtitulo_notificacion'>Trabajadores que cumplirán este año la edad para la jubilación</h2>";
    echo "<div class='contenido_notificacion' name='contenido_notificacion'>";
      echo "<h2 class='subtitulo'>Cédula</h2>
            <h2 class='subtitulo'>Nombres y Apellidos</h2>
            <h2 class='subtitulo'>Sexo</h2>
            <h2 class='subtitulo'>Nacimiento</h2>";
    foreach ($workerProx as $trabajador)
    {
      echo "<h2 class='subtitulo_dato'>".$trabajador['cedula']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['nombres']." ".$trabajador['apellidos']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['sexo']."</h2>";
      echo "<h2 class='subtitulo_dato'>".$trabajador['nacimiento']."</h2>";
    }
    echo "</div>";
    echo "</div>";
  }

  if (count($workerHoy) == 0 && count($workerCump) == 0 && count($workerProx) == 0)
  {
    echo "<div class='notificacion'>
          <h2 class='subtitulo_notificacion' name='subtitulo_notificacion'>No hay ninguna notificación</h2>";
    echo "</div>";
  }

?>
