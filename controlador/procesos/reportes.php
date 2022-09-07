<?php

  $this->modelo("Conexion");
  $this->modelo("Trabajador");
  $this->modelo("Beneficiario");
  $this->modelo("Relacional");
  $this->modelo("Patologia");
  $this->modelo("Medicamento");
  $this->modelo("fpdf/fpdf");
  $this->modelo("fpdf/pdf");
  $relaciona = new Relacional();
  $pdf = new PDF('P','cm',array(21.59,27.94));
  $pdf->AliasNbPages();
  //Reportes de Trabajadores
  if ($_POST['tipoPersona'] == "trabajador" || $_POST['tipoPersona'] == "Todos") {

    $trab = new Trabajador();
    if ($_POST['tipoReporte']=="General") { //Todos los trabajadores

      $personas = $trab->consultas("WHERE status=1");
      if (count($personas) > 0) {
        $pdf->AddPage(); //Agregamos la página del PDF
        $pdf->SetFont('Times','B',16); //Escogemos la letra
        $pdf->Cell(0,1,utf8_decode("Reporte de Trabajadores"),0,0,'C'); //Escribimos el título
        $pdf->Ln(1.5); //Salto de línea
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(2,0.75, utf8_decode("Cédula"),1,0,'C'); //Creamos los títulos de la columna
        $pdf->Cell(7.5,0.75, utf8_decode("Nombres y Apellidos"),1,0,'C');
        $pdf->Cell(2.5,0.75, utf8_decode("Sexo"),1,0,'C');
        $pdf->Cell(3.8,0.75, utf8_decode("Tipo de Trabajo"),1,0,'C');
        $pdf->Cell(3.5,0.75, utf8_decode("Estado de Trabajo"),1,1,'C');
        $pdf->SetFont('Times','',11);
        foreach ($personas as $persona)
        { //Escribimos los datos extraídos de la BD
          $pdf->Cell(2,0.5, utf8_decode($persona['cedula']),1,0,'C');
          $pdf->Cell(7.5,0.5, utf8_decode($persona['nombres']." ".$persona['apellidos']),1,0,'C');
          $pdf->Cell(2.5,0.5, utf8_decode($persona['sexo']),1,0,'C');
          $pdf->Cell(3.8,0.5, utf8_decode($persona['tipotrabajador']),1,0,'C');
          $pdf->Cell(3.5,0.5, utf8_decode($persona['esttrabajo']),1,1,'C');
        }
        $pdf->setContenido(true);
      }

    }
    // Reportes de patologías y medicamentos para Trabajadores
    if ($_POST['tipoReporte']!="General") {
      if ($_POST['tipoReporte']=="patologia") {
        $titulo = "Reporte de Trabajadores que padecen Patologías";
      }
      if ($_POST['tipoReporte']=="medicamento") {
        $titulo = "Reporte de Trabajadores que usan Medicamentos";
      }
      $id=[];
      $j = 0;
      if ($_POST['selectDinamico']=="Todo") {
        if ($_POST['tipoReporte'] == "patologia") {
          $resultados = $relaciona->consultarTrab_Pat();
          if (count($resultados) > 0) {
            foreach ($resultados as $relac) { //Obtener id de relaciones sin repetirlos
          		$existe = false;
          		for ($i=0; $i < count($id); $i++) {
          			if ($id[$i] == $relac['id_trabajador']) {
          				$existe = true;
          			}
          		}
          		if (!$existe) {
          			$id[$j] = $relac['id_trabajador'];
          			$j++;
          		}
          	}
          }
        }
        if ($_POST['tipoReporte'] == "medicamento") {
          $resultados = $relaciona->consultarTrab_Med();
          if (count($resultados) > 0) {
            foreach ($resultados as $relac) { //Obtener id de relaciones sin repetirlos
          		$existe = false;
          		for ($i=0; $i < count($id); $i++) {
          			if ($id[$i] == $relac['id_trabajador']) {
          				$existe = true;
          			}
          		}
          		if (!$existe) {
          			$id[$j] = $relac['id_trabajador'];
          			$j++;
          		}
          	}
          }
        }
      }
      else {
        $id=[];
        $j = 0;
        if ($_POST['tipoReporte'] == "patologia") {
          $pat = new Patologia();
          $pat->setNombre($_POST['selectDinamico']);
          $pat->consultar();
          $idRela = $relaciona->consultarTrab_Pat("WHERE id_patologia = ".$pat->getId());
          foreach ($idRela as $relac) { //Obtener id de relaciones sin repetirlos
            $existe = false;
            for ($i=0; $i < count($id); $i++) {
              if ($id[$i] == $relac['id_trabajador']) {
                $existe = true;
              }
            }
            if (!$existe) {
              $id[$j] = $relac['id_trabajador'];
              $j++;
            }
          }
        }
        if ($_POST['tipoReporte'] == "medicamento") {
          $med = new Medicamento();
          $med->setNombre($_POST['selectDinamico']);
          $med->consultar();
          $idRela = $relaciona->consultarTrab_Med("WHERE id_medicamento = ".$med->getId());
          foreach ($idRela as $relac) { //Obtener id de relaciones sin repetirlos
            $existe = false;
            for ($i=0; $i < count($id); $i++) {
              if ($id[$i] == $relac['id_trabajador']) {
                $existe = true;
              }
            }
            if (!$existe) {
              $id[$j] = $relac['id_trabajador'];
              $j++;
            }
          }
        }
        if ($_POST['tipoReporte']=="patologia") {
          $titulo = "Reporte de Trabajadores que padecen ".$_POST['selectDinamico'];
        }
        if ($_POST['tipoReporte']=="medicamento") {
          $titulo = "Reporte de Trabajadores que usan ".$_POST['selectDinamico'];
        }
      }
      if (count($id)>0) { // Si se encontraron personas para la busquéda se agregan al PDF
        $pdf->AddPage(); //Agregamos la página del PDF
        $pdf->SetFont('Times','B',16); //Escogemos la letra
        $pdf->Cell(0,1,utf8_decode($titulo),0,0,'C'); //Escribimos el título
        $pdf->Ln(1.5); //Salto de línea
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(2,0.75, utf8_decode("Cédula"),1,0,'C'); //Creamos los títulos de la columna
        $pdf->Cell(7.5,0.75, utf8_decode("Nombres y Apellidos"),1,0,'C');
        $pdf->Cell(2.5,0.75, utf8_decode("Sexo"),1,0,'C');
        $pdf->Cell(3.65,0.75, utf8_decode("Teléfono Celular"),1,0,'C');
        $pdf->Cell(3.65,0.75, utf8_decode("Teléfono Fijo"),1,1,'C');
        $pdf->SetFont('Times','',11);
        for ($i=0; $i < $j; $i++) {
          $personas = $trab->consultas("WHERE id = ".$id[$i]);
          foreach ($personas as $persona) { //Escribimos los datos extraídos de la BD
            $pdf->Cell(2,0.5, utf8_decode($persona['cedula']),1,0,'C');
            $pdf->Cell(7.5,0.5, utf8_decode($persona['nombres']." ".$persona['apellidos']),1,0,'C');
            $pdf->Cell(2.5,0.5, utf8_decode($persona['sexo']),1,0,'C');
            $pdf->Cell(3.65,0.5, utf8_decode($persona['telefonocelular']),1,0,'C');
            $pdf->Cell(3.65,0.5, utf8_decode($persona['telefonofijo']),1,1,'C');
          }
        }
        $pdf->setContenido(true);
      }
    }
  }
  //Reportes de Beneficiarios
  if ($_POST['tipoPersona'] == "beneficiario" || $_POST['tipoPersona'] == "Todos") {
    $bene = new Beneficiario();
    if ($_POST['tipoReporte']=="General") {//Todos los beneficiarios
      $personas = $bene->consultas("WHERE status=1");
      if (count($personas) > 0) {
        $pdf->AddPage();//Agregamos una página al PDF
        $pdf->SetFont('Times','B',16);//Escogemos la letra
        $pdf->Cell(0,1,utf8_decode("Reporte de Beneficiarios"),0,0,'C');//Escribimos el título
        $pdf->Ln(1.5);//Salto de línea
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(2,0.75, utf8_decode("Cédula"),1,0,'C');//Creamos los títulos de la columna
        $pdf->Cell(7.5,0.75, utf8_decode("Nombres y Apellidos"),1,0,'C');
        $pdf->Cell(2.5,0.75, utf8_decode("Sexo"),1,0,'C');
        $pdf->Cell(3.8,0.75, utf8_decode("Parentesco"),1,0,'C');
        $pdf->Cell(3.5,0.75, utf8_decode("Cédula del Titular"),1,1,'C');
        $pdf->SetFont('Times','',11);
        foreach ($personas as $persona)
        {//Escribimos los datos extraídos de la BD
          $pdf->Cell(2,0.5, utf8_decode($persona['cedula']),1,0,'C');
          $pdf->Cell(7.5,0.5, utf8_decode($persona['nombres']." ".$persona['apellidos']),1,0,'C');
          $pdf->Cell(2.5,0.5, utf8_decode($persona['sexo']),1,0,'C');
          $pdf->Cell(3.8,0.5, utf8_decode($persona['parentesco']),1,0,'C');
          $pdf->Cell(3.5,0.5, utf8_decode($persona['cedulatitular']),1,1,'C');
        }
        $pdf->setContenido(true);
      }

    }
    // Reportes de patologías y medicamentos para Beneficiarios
    if ($_POST['tipoReporte']!="General") {
      if ($_POST['tipoReporte']=="patologia") {
        $titulo = "Reporte de Beneficiarios que padecen Patologías";
      }
      if ($_POST['tipoReporte']=="medicamento") {
        $titulo = "Reporte de Beneficiarios que usan Medicamentos";
      }
      $id=[];
      $j = 0;
      if ($_POST['selectDinamico']=="Todo") {
        if ($_POST['tipoReporte'] == "patologia") {
          $resultados = $relaciona->consultarBene_Pat();
          if (count($resultados) > 0) {
            foreach ($resultados as $relac) { //Obtener id de relaciones sin repetirlos
              $existe = false;
              for ($i=0; $i < count($id); $i++) {
                if ($id[$i] == $relac['id_beneficiario']) {
                  $existe = true;
                }
              }
              if (!$existe) {
                $id[$j] = $relac['id_beneficiario'];
                $j++;
              }
            }
          }
        }
        if ($_POST['tipoReporte'] == "medicamento") {
          $resultados = $relaciona->consultarBene_Med();
          if (count($resultados) > 0) {
            foreach ($resultados as $relac) { //Obtener id de relaciones sin repetirlos
              $existe = false;
              for ($i=0; $i < count($id); $i++) {
                if ($id[$i] == $relac['id_beneficiario']) {
                  $existe = true;
                }
              }
              if (!$existe) {
                $id[$j] = $relac['id_beneficiario'];
                $j++;
              }
            }
          }
        }
      }
      else {
        $id=[];
        $j = 0;
        if ($_POST['tipoReporte'] == "patologia") {
          $pat = new Patologia();
          $pat->setNombre($_POST['selectDinamico']);
          $pat->consultar();
          $idRela = $relaciona->consultarBene_Pat("WHERE id_patologia = ".$pat->getId());
          foreach ($idRela as $relac) { //Obtener id de relaciones sin repetirlos
            $existe = false;
            for ($i=0; $i < count($id); $i++) {
              if ($id[$i] == $relac['id_beneficiario']) {
                $existe = true;
              }
            }
            if (!$existe) {
              $id[$j] = $relac['id_beneficiario'];
              $j++;
            }
          }
        }
        if ($_POST['tipoReporte'] == "medicamento") {
          $med = new Medicamento();
          $med->setNombre($_POST['selectDinamico']);
          $med->consultar();
          $idRela = $relaciona->consultarBene_Med("WHERE id_medicamento = ".$med->getId());
          foreach ($idRela as $relac) { //Obtener id de relaciones sin repetirlos
            $existe = false;
            for ($i=0; $i < count($id); $i++) {
              if ($id[$i] == $relac['id_beneficiario']) {
                $existe = true;
              }
            }
            if (!$existe) {
              $id[$j] = $relac['id_beneficiario'];
              $j++;
            }
          }
        }
        if ($_POST['tipoReporte']=="patologia") {
          $titulo = "Reporte de Beneficiarios que padecen ".$_POST['selectDinamico'];
        }
        if ($_POST['tipoReporte']=="medicamento") {
          $titulo = "Reporte de Beneficiarios que usan ".$_POST['selectDinamico'];
        }
      }
      if (count($id)>0) { // Si se encontraron personas para la busquéda se agregan al PDF
        $pdf->AddPage(); //Agregamos la página del PDF
        $pdf->SetFont('Times','B',16); //Escogemos la letra
        $pdf->Cell(0,1,utf8_decode($titulo),0,0,'C'); //Escribimos el título
        $pdf->Ln(1.5); //Salto de línea
        $pdf->SetFont('Times','B',12);
        $pdf->Cell(2,0.75, utf8_decode("Cédula"),1,0,'C'); //Creamos los títulos de la columna
        $pdf->Cell(7.5,0.75, utf8_decode("Nombres y Apellidos"),1,0,'C');
        $pdf->Cell(2.5,0.75, utf8_decode("Sexo"),1,0,'C');
        $pdf->Cell(3.65,0.75, utf8_decode("Teléfono Celular"),1,0,'C');
        $pdf->Cell(3.65,0.75, utf8_decode("Teléfono Fijo"),1,1,'C');
        $pdf->SetFont('Times','',11);
        for ($i=0; $i < $j; $i++) {
          $personas = $bene->consultas("WHERE id = ".$id[$i]);
          foreach ($personas as $persona) { //Escribimos los datos extraídos de la BD
            $pdf->Cell(2,0.5, utf8_decode($persona['cedula']),1,0,'C');
            $pdf->Cell(7.5,0.5, utf8_decode($persona['nombres']." ".$persona['apellidos']),1,0,'C');
            $pdf->Cell(2.5,0.5, utf8_decode($persona['sexo']),1,0,'C');
            $pdf->Cell(3.65,0.5, utf8_decode($persona['telefonocelular']),1,0,'C');
            $pdf->Cell(3.65,0.5, utf8_decode($persona['telefonofijo']),1,1,'C');
          }
        }
        $pdf->setContenido(true);
      }
    }
  }
  if ($pdf->getContenido() == NULL) {
    $pdf->AddPage(); //Agregamos la página del PDF
    $pdf->Ln();
    $pdf->SetFont('Times','B',16); //Escogemos la letra
    $pdf->Cell(0,1,utf8_decode("No existe Información Disponible para los parámetros indicados"),0,1,'C'); //Escribimos una notificación
  }
  $pdf->Output();
?>
