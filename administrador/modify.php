<?php
include 'conexion.php'; // Incluimos la conexión
$seccion = $_POST['nseccion']; // Recibimos la seccion
$npreguntas = $_POST['nuevo']; // Obtenemos el numero de preguntas
$nsec = "Seccion_".(string)$seccion; // Creamos un string para la seccion
$q = $con->query("SELECT * FROM secciones"); // Seleccionamos todo de la tabla de secciones
$number = mysqli_num_rows($q); // Obtenemos el número de columnas de la ejecucion del query
if ($seccion > $number) { // Validamos la seccion
  header('location: alerta.php?mensaje=Ingresa una seccion valida&p=adseccion&t=error');
}else{
  $consulta = $con->query("UPDATE secciones SET no_preguntas = $npreguntas WHERE seccion = '$nsec'"); // Actualizamos el número de preguntas de la seccion
  if ($consulta) {
    header('location: alerta.php?mensaje=Se ha actualizado correctamente&p=adseccion&t=success'); // Mensaje de éxito
  }else{
    header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=error'); // Mensaje de error
  }
}
?>
