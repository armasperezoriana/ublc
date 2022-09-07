<?php
  $this->modelo("Conexion");
  $this->modelo("fpdf/fpdf");
  $pdf = new FPDF('P','cm',array(21.59,27.94)); //Creamos el objeto y le indicamos los parámetros
  $pdf->AddPage();
  $pdf->SetFillColor(255,255,255);
  $pdf->SetFont('Times', 'I', 12);
  $pdf->SetX(-1);//Colocar el cursor a la derecha
  $pdf->SetY(0.5); //Colocar el cursor en la parte superior al margen
  $pdf->SetTextColor(172,172,172);
  $pdf->Cell(0,1,"Unidad de Beneficios Legales y Contractuales - UPTAEB",0,1,'R');
  $pdf->Ln(); //Salto de línea
  $pdf->SetTextColor(0,0,0);
  $pdf->SetFont('Times', 'B', 16);
  $pdf->Cell(0,1,"Datos del Reembolso",0,1,'C'); //Título centrado
  $pdf->Ln(1.5); //Salto de línea

  $this->modelo("Trabajador");
  $trab = new Trabajador();
  $this->modelo("Relacional");
  $relacion = new Relacional();
  $trab->setCedula($_POST['cedula']);
  $trab->consultar();

  $idPat = $relacion->consultarTrab_Pat("WHERE id_trabajador = ".$trab->getId()); //Obtener Patologías
  if (count($idPat) > 0) {
    $i = 0;
    $condicion = "";
    $this->modelo("Patologia");
    $pat = new Patologia();
    while ($i < count($idPat)) {
      if ($i == 0) {
        $condicion = "WHERE id = ".$idPat[$i]['id_patologia'];
      }
      else {
        $condicion .= " OR id = ".$idPat[$i]['id_patologia'];
      }
      $i++;
    }
    $i = 0;
    $patologias = $pat->consultas($condicion);
    foreach ($patologias as $patologia) {
      if ($i == 0) {
        $patolos = $patologia['nombre'];
      }
      else {
        $patolos .= ", ".$patologia['nombre'];
      }
      $i++;
    }
  }
  else {
    $patolos = NULL;
  }

  $idMed = $relacion->consultarTrab_Med("WHERE id_trabajador = ".$trab->getId()); //Obtener Medicamentos
  if (count($idMed) > 0) {
    $i = 0;
    $condicion = "";
    $this->modelo("Medicamento");
    $med = new Medicamento();
    while ($i < count($idMed)) {
      if ($i == 0) {
        $condicion = "WHERE id = ".$idMed[$i]['id_medicamento'];
      }
      else {
        $condicion .= " OR id = ".$idPat[$i]['id_medicamento'];
      }
      $i++;
    }
    $i = 0;
    $medicamentos = $med->consultas($condicion);
    foreach ($medicamentos as $medicamento) {
      if ($i == 0) {
        $medica = $medicamento['nombre'];
      }
      else {
        $medica = ", ".$medicamento['nombre'];
      }
    }
  }
  else {
    $medica = NULL;
  }

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(12,0.75,utf8_decode("TITULAR: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(7,0.75,utf8_decode("CÉDULA: "),'TLR',1,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->SetFont('Times','',12);
  $pdf->Cell(12,0.75,utf8_decode($trab->getNombres()." ".$trab->getApellidos()),'BLR',0,'C');
  $pdf->Cell(7,0.75,utf8_decode($trab->getCedula()),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(19,0.75,utf8_decode("DIAGNÓSTICO: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(19,0.75,utf8_decode($_POST['diagnostico']),'BLR',1,'J');
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(19,0.75,utf8_decode("PATOLOGÍAS: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(19,0.75,utf8_decode($patolos),'BLR',1,'J');
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(19,0.75,utf8_decode("MEDICAMENTOS: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(19,0.75,utf8_decode($medica),'BLR',1,'J');
  
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(4,0.75,utf8_decode("MONTO TOTAL: "),'TBL',0,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(15,0.75,utf8_decode($_POST['monto']),'TBR',1,'J');
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(9.5,0.75,utf8_decode("FECHA DE OCURRENCIA: "),'TLR',0,'J');
  $pdf->Cell(9.5,0.75,utf8_decode("FECHA DE RECEPCIÓN: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(9.5,0.75,utf8_decode($_POST['fechaOcurrencia']),'BLR',0,'C');
  $pdf->Cell(9.5,0.75,utf8_decode($_POST['fechaRecepcion']),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(3,0.75,utf8_decode("TELÉFONOS: "),'TBL',0,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(16,0.75,utf8_decode($trab->getTelefonoCelular()."   ".$trab->getTelefonoFijo()),'TBR',1,'J');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(3,0.75,utf8_decode("E-MAIL: "),'TBL',0,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(16,0.75,utf8_decode($trab->getCorreo()),'TBR',1,'J');
  $pdf->Ln(3);//Salto de línea
  $pdf->SetX(8.29); //Movemos el cursor para centrar la línea
  $pdf->Cell(5,1,"",'B',1); //Celda que genera la línea
  $pdf->Cell(0,1,"FIRMA",0,1,'C');


  $pdf->Output();
?>
