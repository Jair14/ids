<?php
  // Parametros para la generación del archivo de excel
  header('Content-type: application/vnd.ms-excel; name="excel"');
  header('Content-Disposition: filename=Reporte.xls');
  header('Pragma: no-cache');
  header('Expires: 0');
  echo $_POST['data'];
 ?>
