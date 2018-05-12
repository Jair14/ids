<?php
include 'conexion.php';
$pregunta = $_GET['pregunta'];
$q = $con->query("DELETE FROM materias WHERE Pregunta = '$pregunta'");
if ($q) {
  header('location: alerta.php?mensaje=Se ha eliminado correctamente&p=adseccion&t=success');
}else{
  header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=erro');
}
?>
