<?php
  $this->modelo("Conexion");
  $this->modelo("Trabajador");
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

  $this->modelo("Beneficiario");
  $bene = new Beneficiario();
  $bene->setCedula($_POST['cedula']);
  $bene->consultar();
  $trab = new Trabajador();
  $this->modelo("Relacional");
  $relacion = new Relacional();
  $id = $relacion->consultarTrab_Bene("WHERE id_beneficiario = ".$bene->getId());

  $trab->setId($id[0]['id_trabajador']);
  $trab->consultar();
  $pdf->Cell(0,1,"Datos del Beneficiario",0,1,'C'); //Título centrado
  $pdf->Ln(); //Salto de línea
  $pdf->SetFont('Times','B',12);
  $pdf->Cell(12,0.75,utf8_decode("NOMBRES Y APELLIDOS: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(7,0.75,utf8_decode("CÉDULA: "),'TLR',1,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->SetFont('Times','',12);
  $pdf->Cell(12,0.75,utf8_decode($bene->getNombres()." ".$bene->getApellidos()),'BLR',0,'C');
  $pdf->Cell(7,0.75,utf8_decode($bene->getCedula()),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(9.5,0.75,utf8_decode("NOMBRES Y APELLIDOS DEL TITULAR: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(5.5,0.75,utf8_decode("CÉDULA DEL TITULAR: "),'TLR',0,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->Cell(4,0.75,utf8_decode("PARENTESCO: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(9.5,0.75,utf8_decode($trab->getNombres()." ".$trab->getApellidos()),'BLR',0,'C');
  $pdf->Cell(5.5,0.75,utf8_decode($trab->getCedula()),'BLR',0,'C');
  $pdf->Cell(4,0.75,utf8_decode($bene->getParentesco()),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(6.333,0.75,utf8_decode("FECHA DE NACIMIENTO: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(6.333,0.75,utf8_decode("SEXO: "),'TLR',0,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->Cell(6.333,0.75,utf8_decode("ESTADO CIVIL: "),'TLR',1,'J');
  $pdf->SetFont('Times','',12);
  $pdf->Cell(6.333,0.75,utf8_decode($bene->getNacimiento()),'BLR',0,'C');
  $pdf->Cell(6.333,0.75,utf8_decode($bene->getSexo()),'BLR',0,'C');
  $pdf->Cell(6.333,0.75,utf8_decode($bene->getEstCivil()),'BLR',1,'C');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(3,0.75,utf8_decode("DIRECCIÓN: "),'TBL',0,'J');
  $pdf->SetFont('Times','',12);
  $pdf->MultiCell(16,0.75,utf8_decode($bene->getDireccion()),'TBR',1,'J');

  $pdf->SetFont('Times','B',12);
  $pdf->Cell(9.5,0.75,utf8_decode("TELÉFONOS: "),'TLR',0,'J');//Escribimos el título de la columna sin bordes abajo
  $pdf->Cell(9.5,0.75,utf8_decode("E-MAIL: "),'TLR',1,'J');//Escribimos la celda sin bordes abajo para escribir el campo junto a el título
  $pdf->SetFont('Times','',12);
  $pdf->Cell(9.5,0.75,utf8_decode($bene->getTelefonoCelular()."   ".$bene->getTelefonoFijo()),'BLR',0,'C');
  $pdf->Cell(9.5,0.75,utf8_decode($bene->getCorreo()),'BLR',1,'C');

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


  $pdf->Output();
?>
