<?php
include 'conexion.php';
$salida = "";
$folio = $_POST['folio'];
$query = "SELECT * FROM calificacion WHERE folio_alumno = '$folio'";
if (isset($_POST['consulta'])) {
  $q = $con ->real_escape_string($_POST['consulta']);
  $query = "SELECT * FROM calificacion WHERE folio_alumno = '$folio' AND (id_pregunta LIKE '%".$q."%' OR respuesta_dada LIKE '%".$q."%' OR respuesta_correcta LIKE '%".$q."%')";
}
$resultado = $con->query($query);
if ($resultado->num_rows > 0) {
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
  $salida.= "No se encontraron resultados ):";
}
echo $salida;
$con -> close();
 ?>