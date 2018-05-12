<?php
include 'conexion.php';
$seccion = $_POST['nseccion'];
$npreguntas = $_POST['nuevo'];
$nsec = "Seccion_".(string)$seccion;
$q = $con->query("SELECT * FROM secciones");
$number = mysqli_num_rows($q);
if ($seccion > $number) {
  header('location: alerta.php?mensaje=Ingresa una seccion valida&p=adseccion&t=error');
}else{
  $consulta = $con->query("UPDATE secciones SET no_preguntas = $npreguntas WHERE seccion = '$nsec'");
  if ($consulta) {
    header('location: alerta.php?mensaje=Se ha actualizado correctamente&p=adseccion&t=success');
  }else{
    header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=error');
  }
}
?>
