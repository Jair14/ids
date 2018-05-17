<?php

	require 'fpdf/fpdf.php'; // Incluimos la biblioteca

	class PDF extends FPDF // Definimos la clase PDF que hereda de FPDF
	{
		function Header() // Establecemos la cabecera
		{
			$this->Image('images/logo.png', 5, 5, 30 ); // Insertamos el logo
			$this->SetFont('Arial','B',15);
			$this->Cell(30);
			$this->Cell(120,10, 'Aspirantes',0,0,'C');
			$this->Ln(20);
		}

		function Footer() // Footer
		{
			$this->SetY(-20);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' ); // EScribimos el número de página
		}
	}
?>
