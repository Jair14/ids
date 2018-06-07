<?php
  include 'conexion.php'; // Incluimos la conexion
  $query = $con->query("SELECT * FROM secciones"); // Seleccionamos todo de la tabla de secciones
  $array = array(); // EStablecemos un array
  while ($row = $query->fetch_assoc()) {
    array_push($array, $row['seccion']); // Llenamos el array con las secciones
  }
  echo json_encode($array); // Imprimimos el array con codificación de JSON
?>
