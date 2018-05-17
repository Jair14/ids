<?php
include 'conexion.php'; // Incluimos la conexión
$salida = ""; // Inicializamos la variable de salida
$folio = $_POST['folio']; // Obtenemos el folio por método POST
$query = "SELECT * FROM calificacion WHERE folio_alumno = '$folio'"; // Seleccionamos todo de la calificacion del alumno que hayamos recibido
if (isset($_POST['consulta'])) { 
  $q = $con ->real_escape_string($_POST['consulta']); // Escapamos los caracteres especiales
  $query = "SELECT * FROM calificacion WHERE folio_alumno = '$folio' AND (id_pregunta LIKE '%".$q."%' OR respuesta_dada LIKE '%".$q."%' OR respuesta_correcta LIKE '%".$q."%')";
}
$resultado = $con->query($query);  // Ejecutamos el query
if ($resultado->num_rows > 0) { // Si el numero de filas es mayor a 0 se construirá una tabla en la variable de salida que contenga los datos que se han obtenido de ejecutar el query
  $salida.= "  <table class='excel' border='1'>
                    <thead>
                      <th>ID pregunta</th>
                      <th>Respuesta dada</th>
                      <th>Respuesta correcta</th>
                      <th>Correcta/incorrecta</th>
                      <th>Puntuación</th>
                    </thead>
                    <tbody>";
                    while ($user = $resultado->fetch_assoc()) {
                       $salida.= "<tr>
                          <td>".$user['id_pregunta']."</td>
                          <td>".$user['respuesta_dada']."</td>
                          <td>".$user['respuesta_correcta']."</td>
                          <td>".$user['correcta/incorrecta']."</td>
                          <td>".$user['puntuacion']."</td>
                        </tr>";
                    }
                    $salida.= "</tbody></table>";
}else{
  $salida.= "No se encontraron resultados ):";  // En caso contrario imprimiremos que no hay resultados en la BD
}
echo $salida; // Imprimimos la variable de salida
$con -> close(); // Cerramos la conexion a la BD
 ?>
