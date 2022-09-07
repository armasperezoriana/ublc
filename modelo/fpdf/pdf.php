<?php
  class PDF extends FPDF
  {
    private  $contenido;
    //Cabecera de página
    function Header()
    {
      // Logo
      // $this->Image('../img/logoSISMEU2.png',10,8,33);
      $this->SetX(-1);//Colocar el cursor a la derecha
      $this->SetY(0.5); //Colocar el cursor en la parte superior al margen
      $this->SetTextColor(172,172,172);//Color de letra gris
      $this->SetFont('Times', 'I', 12); //Times Italic 12
      //Texto en el encabezado
      $this->Cell(0,1,"Unidad de Beneficios Legales y Contractuales - UPTAEB",0,1,'R');
      // Salto de línea
      // $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
      // Posición: a 1,5 cm del final
      $this->SetY(-1.5);
      // Arial italic 8
      $this->SetFont('Times','I',10);
      // Número de página
      $this->Cell(0,1,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
    }

    public function setContenido($value)
    {
      $this->contenido = $value;
    }
    public function getContenido()
    {
      return $this->contenido;
    }
  }
?>
