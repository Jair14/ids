<?php
include 'conexion.php'; // Incluimos la conexion
$seccion = $_GET['delete']; // Recibimos la sección por método GET
echo $seccion;
//$sec = "Seccion ".(string)$seccion;
//$nnum = $con->query("SELECT * FROM secciones");
//$row = mysqli_num_rows($nnum);
//if ($seccion > $row) {
  //header('location: alerta.php?mensaje=Ingrese una seccion existente&p=adseccion&t=error');
//}else{
  $de = $con->query("DELETE FROM secciones WHERE seccion = '$seccion'"); // Eliminamos la seccion de la BD que corresponda a la sección recibida
  $delete = $con->query("DELETE FROM materias WHERE Materia = '$seccion'"); // Eliminamos las preguntas que correspondan a la seccion recibida
  if ($de && $delete) {
    header('location: alerta.php?mensaje=Se ha eliminado correctamente &p=adseccion&t=success'); // Mensaje de éxito
  }else{
    header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=error'); // Mensaje de error
  }
//}
?>
