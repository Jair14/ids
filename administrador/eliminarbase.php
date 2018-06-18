<?php
include 'conexion.php';
$d = $_GET['delete'];
if ($d = 0) {
	$q = "DELETE FROM calificacion;";
	$a="DELETE FROM direccion;";
	$b="DELETE FROM examenes;";
	$c= "DELETE FROM materias;";
	$d=" DELETE FROM respuestas_alumno;";
	$e=" DELETE FROM secciones;";
	$f=" DELETE FROM tutor;";
	$n = $con->query($q);
	$m = $con->query($a);
	$o = $con->query($b);
	$p = $con->query($c);
	$q = $con->query($d);
	$r = $con->query($e);
	$s = $con->query($f);
}else{
	$q = "DELETE FROM alumnos";
	$n = $con->query($q);
}

header('location: alerta.php?mensaje=Operacion exitosa&p=index&t=success');
?>