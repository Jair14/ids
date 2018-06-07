<?php
  include 'conexion.php'; // Incluimos la conexion
  //Obtenermos los valores enviados por método POST
  $tipo = $_POST['seleccion']; // Matutino, vespertino o que pez
  $periodo = $_POST['periodo']; // Perioddo a aplicar el examen
  $grado = $_POST['materias']; // Materias de grado
  $numero = $_POST['npreguntas']; // Número de preguntas por seccion
  $nombre = $_POST['nombre']; // Nombre de la sección

  $divgrade = "";
  if ($grado == 0) {
    $ngrado = (string)$grado."0";    # code...
  }else{
    $ngrado = (string)$grado;
   // Convertimos a string la variable grado y le concatenamos el valor 0
  }
  $divgrade = $ngrado[0];

  $new = $con->query("SELECT * FROM secciones WHERE grado = $grado"); // Consulta a la BD para obtener el valor del grado de la sección
  $number = mysqli_num_rows($new); // Obtenermos el número de registros que coinciden con el query

  $seccion = $number+1; // Aumentamos en uno la seleccion encontrada

  $folio = (string)$tipo.(string)$periodo.(string)$ngrado.(string)$seccion."00"; // Construimos el ID de la sección


  $q = $con->query("SELECT * FROM secciones"); // Seleccionamos todo de la tabla de secciones
  $num = mysqli_num_rows($q); // Obtenemos el número de registros del query
  $num += 1; // Aumentamos el valor de num en 1
  $seccion = "Seccion_".(string)$num; // Creamos un string con el número de sección
  //$last = $num*1000;
  $insertar = $con->query("INSERT INTO secciones VALUES ('$seccion', $numero, $folio, $divgrade, $folio, '$nombre', 0)"); // Insertamos a la BD los valores obtenidos
  if ($insertar) {
    header('location: alerta.php?mensaje=Se ha ingresado correctamente&p=adseccion&t=success'); // Redirección en caso de funcionar
  }else{
    header('location: alerta.php?mensaje=Ha ocurrido un error&p=adseccion&t=error'); // Redirección en caso de fracasar
  }
?>
