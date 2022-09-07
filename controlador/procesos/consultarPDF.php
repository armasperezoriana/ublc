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

  $this->modelo("Trabajador");
  $trab = new Trabajador();
  $this->modelo("Beneficiario");
  $bene = new Beneficiario();
  $trab->setCedula($_POST['cedula']);
  $trab->consultar();
  $pdf->Cell(0,1,"Datos del Titular",0,1,'C'); //Título centrado
  $pdf->Ln(); //Salto de línea
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(12,0.75,utf8_decode("NOMBRES Y APELLIDOS: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(7,0.75,utf8_decode("CÉDULA: "),'TLR',1,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->SetFont('Times','',12);
  $pdf->Cell(12,0.75,utf8_decode($trab->getNombres()." ".$trab->getApellidos()),'BLR',0,'C');
  $pdf->Cell(7,0.75,utf8_decode($trab->getCedula()),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(6.333,0.75,utf8_decode("FECHA DE NACIMIENTO: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(6.333,0.75,utf8_decode("SEXO: "),'TLR',0,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->Cell(6.333,0.75,utf8_decode("ESTADO CIVIL: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(6.333,0.75,utf8_decode($trab->getNacimiento()),'BLR',0,'C');
  $pdf->Cell(6.333,0.75,utf8_decode($trab->getSexo()),'BLR',0,'C');
  $pdf->Cell(6.333,0.75,utf8_decode($trab->getEstCivil()),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(3,0.75,utf8_decode("DIRECCIÓN: "),'TBL',0,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(16,0.75,utf8_decode($trab->getDireccion()),'TBR',1,'J');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(9.5,0.75,utf8_decode("TELÉFONOS: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(9.5,0.75,utf8_decode("E-MAIL: "),'TLR',1,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->SetFont('Times','',12);
  $pdf->Cell(9.5,0.75,utf8_decode($trab->getTelefonoCelular()."   ".$trab->getTelefonoFijo()),'BLR',0,'C');
  $pdf->Cell(9.5,0.75,utf8_decode($trab->getCorreo()),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(6.333,0.75,utf8_decode("TIPO DE TRABAJO: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(6.333,0.75,utf8_decode("ESTADO DE TRABAJO: "),'TLR',0,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->Cell(6.333,0.75,utf8_decode("FECHA DE INGRESO: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(6.333,0.75,utf8_decode($trab->getTipoTrabajador()),'BLR',0,'C');
  $pdf->Cell(6.333,0.75,utf8_decode($trab->getEstTrabajo()),'BLR',0,'C');
  $pdf->Cell(6.333,0.75,utf8_decode($trab->getFechaIngreso()),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(19,0.75,utf8_decode("PATOLOGÍAS: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(19,0.75,utf8_decode($_POST['patologias']),'BLR',1,'J');
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(19,0.75,utf8_decode("MEDICAMENTOS: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(19,0.75,utf8_decode($_POST['medicamentos']),'BLR',1,'J');
  $pdf->SetFont('Times','B',12);
  $pdf->Ln();
  $this->modelo("Relacional");
  $relacion = new Relacional();
  $id = $relacion->consultarTrab_Bene("WHERE id_trabajador = ".$trab->getId());
  if (count($id) > 0) { //Buscando los Beneficiarios
    $i = 0;
    $condicion = "";
    while ($i < count($id)) {
      if ($i == 0) {
        $condicion = "WHERE id = ".$id[$i]['id_beneficiario'];
      }
      else {
        $condicion .= " OR id = ".$id[$i]['id_beneficiario'];
      }
      $i++;
    }
    $beneficiarios = $bene->consultas($condicion);
    if (count($beneficiarios) > 0) {
      $pdf->SetFont('Times', 'B', 16);
      $pdf->Cell(0,1,"BENEFICIARIOS",0,1,'C'); //Título centrado
      $pdf->Ln(0.5); //Salto de línea
      $pdf->SetFont('Times','B',12);
      $pdf->Cell(10,0.75,utf8_decode("NOMBRES Y APELLIDOS"),1,0,'C');
      $pdf->Cell(4.5,0.75,utf8_decode("CÉDULA"),1,0,'C');
      $pdf->Cell(4.5,0.75,utf8_decode("PARENTESCO"),1,1,'C');
      $pdf->SetFont('Times','',12);
      foreach ($beneficiarios as $persona) {
        $pdf->Cell(10,0.75,utf8_decode($persona['nombres']." ".$persona['apellidos']),1,0,'C');
        $pdf->Cell(4.5,0.75,utf8_decode($persona['cedula']),1,0,'C');
        $pdf->Cell(4.5,0.75,utf8_decode($persona['parentesco']),1,1,'C');
      }
    }
  }




  $pdf->Output();
?>
