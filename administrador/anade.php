<?php
include 'conexion.php'; // Incluimos la conexion
// Recibimos los parametros por método POST
$num = $_POST['numero'];
$pregunta = $_POST['pregunta'];
$rescor = $_POST['rc'];
$resin = $_POST['ri'];
$resin2 = $_POST['ri2'];
$resin3 = $_POST['ri3'];
$materia = $_POST['materias'];


  /*
    $seccion = "Seccion ".(string)$num;
    $last = $con->query("SELECT last FROM secciones WHERE seccion = '$seccion'");
    $user = $last->fetch_assoc();
    $id = $user['last'];
    $id += 1;
    echo $id;
    $id_materia = (string)$num."000";
  */
  $str_materias = (string)$materia; // Convertimos a string la variable $materia




  $q = $con->query("SELECT * FROM secciones WHERE seccion = '$num'"); // Seleccionamos la sección a la que pertence la pregunta
  $row = $q->fetch_assoc(); // Establecemos un arreglo asociativo para obtener los valores de las filas de la BD

  $id_materia = $row['last']; // Obtenemos el id de seccion
  $ultima  = (int)$row['ultima']; // Obtenemos el último id añadido
  $ultima += 1; // Se aumenta en uno el id de la pregunta

  $ult = (string)$ultima; // Convertimos a string el id


  // Reemplazamos los valores del id con los del id de la materia
  $ult[2] = $str_materias[0];
  $ult[3] = $str_materias[1];
  $id = (int)$ult; // Convertimos a entero el valor del id


  if (!isset($POST['archivo'])) { // En caso de existir una imagen se añadirá la pregunta y la imágen
    $directorio = '../alumno/examenfinal/images';
    $nombreArchivo = $_FILES['archivo']['name'];
    $nombreTmpArchivo = $_FILES['archivo']['tmp_name'];
    $nombreabase = 'images/'.$nombreArchivo;
    move_uploaded_file($nombreTmpArchivo, "$directorio/$nombreArchivo");
      if ($con->query("INSERT INTO materias (Id_pregunta, Id_materia, Materia, Pregunta, Respuesta_correcta, Respuesta_inc_1, Respuesta_inc_2, Respuesta_inc_3, imagen) VALUES ($id, '$id_materia', '$num', '$pregunta', '$rescor', '$resin', '$resin2', '$resin3', '$nombreabase')")) {
          header('location: alerta.php?mensaje=Pregunta insertada correctamente&p=anade&t=success');
      }else{
        echo "Error", mysqli_error($con);
      }
  }else{ // En caso contrario, únicamente se añadrirá la pregunta
    $insertar = $con->query("INSERT INTO materias (Id_pregunta, Id_materia, Materia, Pregunta, Respuesta_correcta, Respuesta_inc_1, Respuesta_inc_2, Respuesta_inc_3) VALUES ($id, '$id_materia', '$num', '$pregunta', '$rescor', '$resin', '$resin2', '$resin3')");
    header('location: alerta.php?mensaje=Pregunta insertada correctamente&p=anade&t=success');
  }
  $act = $con->query("UPDATE secciones SET ultima = $id WHERE seccion = '$num'"); // Finalmente se actualiza unicamente el id de la última pregunta añadida
?>
