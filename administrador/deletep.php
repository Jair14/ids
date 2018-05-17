<?php
include 'conexion.php'; //Incluimnos la conexión
$pregunta = $_GET['pregunta']; // Recibimos la pregunta por método GET
$q = $con->query("DELETE FROM materias WHERE Pregunta = '$pregunta'"); // Eliminamos la pregunta que corresponda al parametro recibido
if ($q) {
  header('location: alerta.php?mensaje=Se ha eliminado correctamente&p=adseccion&t=success'); // Mensaje de éxito
}else{
  header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=erro'); // Mensaje de error
}
?>
