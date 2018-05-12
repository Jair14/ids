<?php
include 'conexion.php';
$salida = "";

$query = "SELECT * FROM alumnos";
if (isset($_POST['consulta'])) {
  $q = $con ->real_escape_string($_POST['consulta']);
  $query = "SELECT * FROM alumnos WHERE Folio LIKE '%".$q."%' OR Nombre LIKE '%".$q."%' OR Apellido_P LIKE '%".$q."%' OR Apellido_M LIKE '%".$q."%'";
}
$resultado = $con->query($query);
if ($resultado->num_rows > 0) {
  $salida.= "  <table class='excel' border='1'>
                    <thead>
                      <th>Folio</th>
                      <th>Nombre</th>
                      <th>Apellido Paterno</th>
                      <th>Apellido Materno</th>
                    </thead>
                    <tbody>";
                    while ($user = $resultado->fetch_assoc()) {
                       $salida.= "<tr>
                          <td>".$user['Folio']."</td>
                          <td>".$user['Nombre']."</td>
                          <td>".$user['Apellido_P']."</td>
                          <td>".$user['Apellido_M']."</td>
                          <td><a href='pdf.php?folio=".$user['Folio']."'target='_blank'>Respuestas</a></td>
                        </tr>";
                    }
                    $salida.= "</tbody></table>";
}else{
  $salida.= "No se encontraron resultados ):";
}
echo $salida;
$con -> close();
 ?>
