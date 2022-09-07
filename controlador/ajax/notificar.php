<?php
	require_once '../../modelo/classConexion.php';
	require_once '../../modelo/classTrabajador.php';
	$trab = new Trabajador();
	$dayA = date('d');
	$monthA = date('m');
	$yearA = date('Y');
	$dateA = $yearA ."-" .$monthA ."-".$dayA;
	$yearEdadMasc = $yearA-60;
	$yearEdadMascI = $yearEdadMasc."-01-01";
	$yearEdadMascF = $yearEdadMasc."-12-31";
	$yearEdadFeme = $yearA-55;
	$yearEdadFemeI = $yearEdadFeme."-01-01";
	$yearEdadFemeF = $yearEdadFeme."-12-31";

	// Buscar los próximos y recien cumplidores de los años necesarios para la jubilación por edad
	$sqlEdad = "where esttrabajo != 'Jubilado' and status = 1  and nacimiento > '".$yearEdadMascI."' and
		nacimiento < '".$yearEdadMascF."' and sexo = 'Masculino' or esttrabajo != 'Jubilado' and status = 1  and
		nacimiento > '".$yearEdadFemeI."' and nacimiento < '".$yearEdadFemeF."' and sexo = 'Femenino'";
	$trabajadores = $trab->consultas($sqlEdad);
	$proximosEdad = 0;
	$cumplidosEdad = 0;
	$cumpleEdad = 0;

	foreach ($trabajadores as $trabajador)
	{
		$yearE = "";
		for ($i=0; $i < 4; $i++)
		{
			$yearE.= $trabajador['nacimiento'][$i];
		}
		$dateComp = $yearE."-".$monthA."-".$dayA;

		if ($trabajador['nacimiento'] < $dateComp)
		{
			$cumplidosEdad++;
			$edad = $yearA-$yearE;
		}
		if($trabajador['nacimiento'] > $dateComp)
		{
			$proximosEdad++;
			$edad = $yearA-$yearE-1;
		}
	 	if ($dateComp == $trabajador['nacimiento'])
		{
			$cumpleEdad++;
			$edad = $yearA-$yearE;
		}

	}

	$mensaje = "";
	if ($cumpleEdad==1)
	{
		$mensaje .= "<p>".$cumpleEdad." trabajador está cumpliendo hoy la edad necesaria la jubilación por edad</p>";
	}
	if ($cumpleEdad > 1)
	{
		$mensaje .= "<p>".$cumpleEdad." trabajadores están cumpliendo hoy la edad necesaria la jubilación por edad</p>";
	}
	if ($cumplidosEdad==1)
	{
		$mensaje .= "<p>".$cumplidosEdad." trabajador ha cumplido este año la edad necesaria para la jubilación por edad</p>";
	}
	if ($cumplidosEdad > 1)
	{
		$mensaje .= "<p>".$cumplidosEdad." trabajadores han cumplido este año la edad necesaria para la jubilación por edad</p>";
	}
	if ($proximosEdad == 1)
	{
		$mensaje .= "<p>".$proximosEdad." trabajador cumplirá este año la edad necesaria para la jubilación por edad</p>";
	}
	if ($proximosEdad > 1)
	{
		$mensaje .= "<p>".$proximosEdad." trabajadores cumplirán este año la edad necesaria para la jubilación por edad</p>";
	}

	if ($mensaje != "")
	{
		$mensaje = "<h2 class='subtitulo_notificacion'>Notificación</h2>" .$mensaje;
		echo $mensaje;
	}

?>
