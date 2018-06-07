<?php
include 'conexion.php'; // Incluimos la conexión
$seccion = $_POST['seccion']; // Recibimos la sección por método POST
 // Seleccionamos todas las secciones que correspondan a la seccion
// Establecemos un arreglo asociativo para acceder a los valores de la BD // Extraemos el grado de la BD

$nquery = $con->query("SELECT * FROM matg WHERE grado = $seccion"); // Seleccionamos todas las materias que correspondan al grado
$array = array(); // DEclaramos un nuevo array
while ($r = $nquery->fetch_assoc()) {
  array_push($array, $r['materia'], $r['id']); // Llenamos el array con los ids y materias que correspondan al grado
}

echo json_encode($array); // Imprimimos el array en formato JSON 
?>
