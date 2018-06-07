<?php
	include 'plantilla.php'; // Incluimos la plantilla
	require 'conexion.php'; // Incluimos la conexion

	$folio = $_POST['grupo']; // Obtenemos el folio
	$query = "SELECT * FROM alumnos WHERE grupo = $folio"; // Seleccionamos las respuestas del alumno
	$resultado = $con->query($query); // Ejecutamos el query
	$number = mysqli_num_rows($resultado); // Obtenemos el número de filas
	$pdf = new PDF(); // Instanciamos el pdf
	$pdf->AliasNbPages();
	$pdf->AddPage(); // Añadimos página

	$pdf->SetFillColor(232,232,232); // Obtenemos color
	$pdf->SetFont('Arial','B',12); // Obtenemos la fuente
	$pdf->SetY(40); // Mandamos una posicion en y
	$pdf->Cell(120,0, 'Grupo '.$folio,0,0,'C'); // Imprimimos el folio
	$pdf->Ln(10);
	$pdf->Cell(60,6,'Apellido Paterno',1,0,'C',1); // Imprimimos Folio
	$pdf->Cell(60,6,'Nombre',1,0,'C',1); // Imprimimos Respuesta
	$pdf->Cell(60,6,'Puntuacion',1,1,'C',1); // Imprimimos Respuesta


	$pdf->SetFont('Arial','',10);

	if ($number>0) {
		while($row = $resultado->fetch_assoc()) // Arreglo asociativo
		{
			$pdf->Cell(60,6,utf8_decode($row['Apellido_P']),1,0,'C'); // Imprimimos un folio
			// Limitamos la respuesta dada
			$pdf->Cell(60,6,utf8_decode($row['Nombre']),1,0,'C');
			$folio = $row['Folio'];
			$quer = $con->query("SELECT * FROM calificacion WHERE folio_alumno = $folio  AND puntuacion = 1");
			$nn = mysqli_num_rows($quer);
			$pdf->Cell(60,6,utf8_decode($nn),1,1,'C');
			$folio = 0;
			$quer = "";
			$nn = 0;
		}
		$pdf->Cell(0,10, '',0,1,'C' );
		$pdf->Cell(0,10, '_______________________________________________',0,1,'C' ); // Firma del alumno
		$pdf->Cell(0,10, 'Firma del Profesor',0,1,'C' );
		$pdf->Output();
	}else{
		$pdf->Cell(0,10, '',0,1,'C' );
		$pdf->Cell(0,10, 'La prueba no ha sido presentada',0,1,'C' );
		$pdf->Output();
	}


?>

?>