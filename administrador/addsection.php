<?php
  include 'conexion.php';
  $tipo = $_POST['seleccion'];
  $periodo = $_POST['periodo'];
  $grado = $_POST['seleccions'];
  $numero = $_POST['npreguntas'];

  $ngrado = (string)$grado."0";

  $new = $con->query("SELECT * FROM secciones WHERE grado = $grado");
  $number = mysqli_num_rows($new);

  $seccion = $number+1;

  $folio = (string)$tipo.(string)$periodo.(string)$ngrado.(string)$seccion."00";


  $q = $con->query("SELECT * FROM secciones");
  $num = mysqli_num_rows($q);
  $num += 1;
  $seccion = "Seccion_".(string)$num;
  //$last = $num*1000;
  $insertar = $con->query("INSERT INTO secciones VALUES ('$seccion', $numero, $folio, $grado, $folio)");
  if ($insertar) {
    header('location: alerta.php?mensaje=Se ha ingresado correctamente&p=adseccion&t=success');
  }else{
    header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=error');
  }
?>
