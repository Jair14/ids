<?php
include 'conexion.php'; //Incluimnos la conexión
$pregunta = $_GET['pregunta']; // Recibimos la pregunta por método GET

$d = $con->query("SELECT * FROM materias WHERE Pregunta = '$pregunta'");
$data = $d->fetch_assoc();
$seccion = $data['Materia'];
$id_preg = (int)$data['Id_pregunta'];


$numact = $con->query("SELECT * FROM secciones WHERE seccion = '$seccion'");
$dat = $numact->fetch_assoc();
$ultima = (int)$dat['ultima'];

$sel = $con->query("SELECT * FROM materias WHERE Id_pregunta > $id_preg AND Id_pregunta <= $ultima");
$ultima = $ultima-1;
$act = $con->query("UPDATE secciones SET ultima = $ultima WHERE seccion = '$seccion'");

while ($try = $sel->fetch_assoc()) {
	$ids = (int)$try['Id_pregunta'];
	$id = (int)$try['Id_pregunta'];
	echo $id;
	$id = $id-1;
	$nuevo = $con->query("UPDATE materias SET Id_pregunta = $id WHERE Id_pregunta = $ids");

}

$q = $con->query("DELETE FROM materias WHERE Pregunta = '$pregunta'"); // Eliminamos la pregunta que corresponda al parametro recibido

if ($q) {
  header('location: alerta.php?mensaje=Se ha eliminado correctamente&p=adseccion&t=success'); // Mensaje de éxito
}else{
  header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=error'); // Mensaje de error
}
?>
