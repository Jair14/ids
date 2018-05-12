<?php
include 'conexion.php';
$seccion = $_GET['delete'];
echo $seccion;
//$sec = "Seccion ".(string)$seccion;
//$nnum = $con->query("SELECT * FROM secciones");
//$row = mysqli_num_rows($nnum);
//if ($seccion > $row) {
  //header('location: alerta.php?mensaje=Ingrese una seccion existente&p=adseccion&t=error');
//}else{
  $de = $con->query("DELETE FROM secciones WHERE seccion = '$seccion'");
  $delete = $con->query("DELETE FROM materias WHERE Materia = '$seccion'");
  if ($de && $delete) {
    header('location: alerta.php?mensaje=Se ha eliminado correctamente &p=adseccion&t=success');
  }else{
    header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=error');
  }
//}
?>
