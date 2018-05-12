<?php
include 'conexion.php';
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
  $str_materias = (string)$materia;




  $q = $con->query("SELECT * FROM secciones WHERE seccion = '$num'");
  $row = $q->fetch_assoc();

  $id_materia = $row['last'];
  $ultima  = (int)$row['ultima'];
  $ultima += 1;

  $ult = (string)$ultima;

  $ult[2] = $str_materias[0];
  $ult[3] = $str_materias[1];
  $id = (int)$ult;


  if (!isset($POST['archivo'])) {
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

  }else{
    $insertar = $con->query("INSERT INTO materias (Id_pregunta, Id_materia, Materia, Pregunta, Respuesta_correcta, Respuesta_inc_1, Respuesta_inc_2, Respuesta_inc_3) VALUES ($id, '$id_materia', '$num', '$pregunta', '$rescor', '$resin', '$resin2', '$resin3')");
    header('location: alerta.php?mensaje=Pregunta insertada correctamente&p=anade&t=success');
  }
  $act = $con->query("UPDATE secciones SET ultima = $id WHERE seccion = '$num'");

?>
