<?php
	include 'plantilla.php'; // Incluimos la plantilla
	require 'conexion.php';  // Incluimos la conexion

	$query = "SELECT * FROM materias"; // Seleccionamos todas las preguntas
	$resultado = $con->query($query); // Ejecutamos el query
	$pdf = new PDF(); // Instanciamos el pdf
	$pdf->AliasNbPages();
	$pdf->AddPage(); // Añadimos página

	$pdf->SetFillColor(232,232,232); // Obtenemos color
	$pdf->SetFont('Arial','B',12); // Obtenemos la fuente

  $pdf->SetX(40); // Mandamos una posicion en y
	$pdf->Cell(120,0, 'Preguntas',0,0,'C');  // Imprimimos preguntas
	$pdf->Ln(10);
	$pdf->Cell(40,6,'Seccion',1,0,'C',1); // Imprimimos seccion
	$pdf->Cell(75,6,'Pregunta',1,0,'C',1); // Imprimimos pregunta
	$pdf->Cell(75,6,'Respuesta correcta',1,1,'C',1); // Imprimimos Respuesta_correcta

	$pdf->SetFont('Arial','',7);

	while($row = $resultado->fetch_assoc()) // Arreglo asociativo
	{
		$pdf->Cell(40,6,utf8_decode($row['Materia']),1,0,'C'); // Imprimimos la materia
		// Limitamos la respuesta dada
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
