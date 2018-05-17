<?php
	include 'plantilla.php'; // Incluimos la plantilla
	require 'conexion.php'; // Incluimos la conexion

	$folio = $_GET['folio']; // Obtenemos el folio
	$query = "SELECT * FROM respuestas_alumno WHERE folio_alumno = $folio"; // Seleccionamos las respuestas del alumno
	$resultado = $con->query($query); // Ejecutamos el query
	$number = mysqli_num_rows($resultado); // Obtenemos el número de filas
	$pdf = new PDF(); // Instanciamos el pdf
	$pdf->AliasNbPages();
	$pdf->AddPage(); // Añadimos página

	$pdf->SetFillColor(232,232,232); // Obtenemos color
	$pdf->SetFont('Arial','B',12); // Obtenemos la fuente
	$pdf->SetY(40); // Mandamos una posicion en y
	$pdf->Cell(120,0, 'Folio alumno: '.$folio,0,0,'C'); // Imprimimos el folio
	$pdf->Ln(10);
	$pdf->Cell(40,6,'Folio de pregunta',1,0,'C',1); // Imprimimos Folio
	$pdf->Cell(150,6,'Respuesta dada',1,1,'C',1); // Imprimimos Respuesta


	$pdf->SetFont('Arial','',10);

	if ($number>0) {
		while($row = $resultado->fetch_assoc()) // Arreglo asociativo
		{
			$pdf->Cell(40,6,utf8_decode($row['folio_pregunta']),1,0,'C'); // Imprimimos un folio
			// Limitamos la respuesta dada
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
		$pdf->Cell(0,10, '_______________________________________________',0,1,'C' ); // Firma del alumno
		$pdf->Cell(0,10, 'Firma del Alumno',0,1,'C' );
		$pdf->Output();
	}else{
		$pdf->Cell(0,10, '',0,1,'C' );
		$pdf->Cell(0,10, 'La prueba no ha sido presentada',0,1,'C' );
		$pdf->Output();
	}


?>
