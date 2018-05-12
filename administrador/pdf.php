<?php
	include 'plantilla.php';
	require 'conexion.php';

	$folio = $_GET['folio'];
	$query = "SELECT * FROM respuestas_alumno WHERE folio_alumno = $folio";
	$resultado = $con->query($query);
	$number = mysqli_num_rows($resultado);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetY(40);
	$pdf->Cell(120,0, 'Folio alumno: '.$folio,0,0,'C');
	$pdf->Ln(10);
	$pdf->Cell(40,6,'Folio de pregunta',1,0,'C',1);
	$pdf->Cell(150,6,'Respuesta dada',1,1,'C',1);


	$pdf->SetFont('Arial','',10);

	if ($number>0) {
		while($row = $resultado->fetch_assoc())
		{
			$pdf->Cell(40,6,utf8_decode($row['folio_pregunta']),1,0,'C');
			if(strlen($row['Respuesta_dada'])>100){
				$resp = "";
				for($i = 0; $i <= 60; $i++ ){
					$resp .= $row['Respuesta_dada'][$i];
				}
				$resp .= "...";
				$pdf->Cell(150,6,utf8_decode($resp),1,1,'C');
			}else{
				$pdf->Cell(150,6,utf8_decode($row['Respuesta_dada']),1,1,'C');
			}
		}
		$pdf->Cell(0,10, '',0,1,'C' );
		$pdf->Cell(0,10, '_______________________________________________',0,1,'C' );
		$pdf->Cell(0,10, 'Firma del Alumno',0,1,'C' );
		$pdf->Output();
	}else{
		$pdf->Cell(0,10, '',0,1,'C' );
		$pdf->Cell(0,10, 'La prueba no ha sido presentada',0,1,'C' );
		$pdf->Output();
	}


?>
