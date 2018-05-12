<?php
include 'conexion.php';
$seccion = $_POST['seccion'];
$query = $con->query("SELECT * FROM secciones WHERE seccion = '$seccion'");



$row = $query->fetch_assoc();
$grado = $row['grado'];

$nquery = $con->query("SELECT * FROM matg WHERE grado = $grado");
$array = array();
while ($r = $nquery->fetch_assoc()) {
  array_push($array, $r['materia'], $r['id']);
}

echo json_encode($array);
?>
