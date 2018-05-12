<?php
  include 'conexion.php';
  $query = $con->query("SELECT * FROM secciones");
  $array = array();
  while ($row = $query->fetch_assoc()) {
    array_push($array, $row['seccion']);
  }
  echo json_encode($array);
?>
