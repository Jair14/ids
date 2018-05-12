<?php
include '../conexion.php';

/* comprobar la conexión */
if (mysqli_connect_errno()) {
   printf("Falló la conexión: %s <br>", mysqli_connect_error());
   exit();
}
  $folio = $_REQUEST['folio_usado'];
  $prueba = "SELECT * FROM alumnos where Folio = '$folio'";
  if(mysqli_multi_query($link, $prueba)){
    do {
      if ($resul = mysqli_use_result($link)) {
        while ($fila = mysqli_fetch_row($resul)) {
          echo json_encode(array('folio' => "$fila[0]",'nombre' => "$fila[1]", 'apellido_p' => "$fila[2]", 'apellido_m' => "$fila[3]", 'grupo' => "$fila[4]"));
        }
        mysqli_free_result($resul);
      }
      if(mysqli_more_results($link)){
        printf("----------------\n");
      }
    } while (mysqli_next_result($link));
  }
  else{
  printf("Errormessage: %s\n", mysqli_error($link));
  }

mysqli_close($link);
 ?>
