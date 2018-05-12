<?php
	include 'plantilla.php';
	require 'conexion.php';

	$query = "SELECT * FROM materias";
	$resultado = $con->query($query);
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);

  $pdf->SetX(40);
	$pdf->Cell(120,0, 'Preguntas',0,0,'C');
	$pdf->Ln(10);
	$pdf->Cell(40,6,'Seccion',1,0,'C',1);
	$pdf->Cell(75,6,'Pregunta',1,0,'C',1);
	$pdf->Cell(75,6,'Respuesta correcta',1,1,'C',1);

	$pdf->SetFont('Arial','',7);

	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(40,6,utf8_decode($row['Materia']),1,0,'C');
		if(strlen($row['Pregunta'])>60){
			$resp = "";
			for($i = 0; $i <= 60; $i++ ){
				$resp .= $row['Pregunta'][$i];
			}
			$resp .= "...";
			$pdf->Cell(75,6,utf8_decode($resp),1,0,'C');
		}else{
			$pdf->Cell(75,6,utf8_decode($row['Pregunta']),1,0,'C');
    }
    if(strlen($row['Respuesta_correcta'])>60){
			$resp = "";
			for($i = 0; $i <= 60; $i++ ){
				$resp .= $row['Respuesta_correcta'][$i];
			}
			$resp .= "...";
			$pdf->Cell(75,6,utf8_decode($resp),1,1,'C');
		}else{
			$pdf->Cell(75,6,utf8_decode($row['Respuesta_correcta']),1,1,'C');
		}
	}

	$pdf->Output();
?>
