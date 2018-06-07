<?php
include 'conexion.php';
$active = $_GET['active'];
$seccion = $_GET['seccion'];
if ($active == 1) {
	$query = $con->query("UPDATE secciones SET active = 1 WHERE seccion = '$seccion'");
}else{
	$query = $con->query("UPDATE secciones SET active = 0 WHERE seccion = '$seccion'");
}
if ($query) {
	header('location: alerta.php?mensaje=Operacion exitosa&p=adseccion&t=success'); 
}else{
	header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=error'); 
}
?>