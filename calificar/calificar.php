<?php
    include '../conexion.php';
    $grupo = $_POST['grupo'];
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../images/logo.png">
	<title>Evaluación</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
    <?php
    /* Comprobamos la conexión*/
    if (mysqli_connect_errno()):?>
        <script type="text/javascript">
           <?php $error = mysqli_connect_error(); ?>
           window.alert("<?php echo $error; ?>, SE TE REDIRECCIONARÁ EN UN MOMENTO");
        </script>
    <?php endif; ?>
    <?php
        //Obtenemos primero todas las matrículas de los alumnos pertenecientes al grupo indicado
        //El array de alumnos contiene las matriculas por grupo
        $alumno = array();
        $consultaGrupos = "SELECT Folio FROM alumnos WHERE grupo = '$grupo'";
        if(mysqli_multi_query($link, $consultaGrupos)):?>
        <?php do {?>
            <?php if($resul = mysqli_use_result($link)): ?>
                <?php while($fila = mysqli_fetch_row($resul)):?>
                    <?php array_push($alumno, $fila[0]); ?>
                <?php endwhile; ?>
                <?php mysqli_free_result($resul); ?>
            <?php endif; ?>
            <?php if(mysqli_more_results($link)): ?>
                <script type="text/javascript">
                    window.alert("Algo salió mal por favor recarga la página");
                </script>
            <?php endif; ?>
        <?php }while(mysqli_next_result($link)); ?>
        <?php endif;?>
    <div class="container">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title">Proceso de calificado (Al finalizar, dar click en el boton "Aceptar")</span>
                <form class="" action="envio.php" method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Folio de alumno</th>
                            <th>Folio de pregunta calificada</th>
                            <th>Correcta / Incorrecta</th>
                            <th>Puntos</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php //Se genera un ciclo que recorra todos los alumnos y se vaya checando sus respuestas
        //Se checará por alumno sus respuestas y preguntas se consultará las respuestas a cada vuelta
        $respuestasCorrectas = array();
        $i = 0;
        for ($k=0; $k < sizeof($alumno) ; $k++) {
            $respuestasABuscar = "SELECT r.folio_pregunta, r.Respuesta_dada, m.Id_pregunta, m.Respuesta_correcta FROM respuestas_alumno r INNER JOIN materias as m on m.Id_pregunta = r.folio_pregunta WHERE folio_alumno = '$alumno[$k]'";
            if (mysqli_multi_query($link, $respuestasABuscar)) {
                do {
                    if ($resul = mysqli_use_result($link)) {
                        while ($fila = mysqli_fetch_row($resul)) {
                            //Si la resuesta es correcta
                            if($fila[1] == $fila[3]){
                                echo "<tr>
                                    <td>$alumno[$k]</td>
                                    <input type=\"text\" name=enviar_calificacion[$i][0] value=$alumno[$k] class=\"hide\" />
                                    <td>$fila[0]</td>
                                    <input type=\"text\" name=enviar_calificacion[$i][1] value=$fila[0] class=\"hide\" />
                                    <td>Correcta</td>
                                    <input type=\"text\" name=enviar_calificacion[$i][2] value=$fila[1] class=\"hide\" />
                                    <input type=\"text\" name=enviar_calificacion[$i][3] value=$fila[3] class=\"hide\" />
                                    <input type=\"text\" name=enviar_calificacion[$i][4] value=\"Correcta\" class=\"hide\" />
                                    <td>1</td>
                                    <input type=\"text\" name=enviar_calificacion[$i][5] value=\"1\" class=\"hide\" />
                                </tr>";
                            }else {
                                echo "<tr>
                                    <td>$alumno[$k]</td>
                                    <input type=\"text\" name=enviar_calificacion[$i][0] value=$alumno[$k] class=\"hide\" />
                                    <td>$fila[0]</td>
                                    <input type=\"text\" name=enviar_calificacion[$i][1] value=$fila[0] class=\"hide\" />
                                    <td>Incorrecta</td>
                                    <input type=\"text\" name=enviar_calificacion[$i][2] value=$fila[1] class=\"hide\" />
                                    <input type=\"text\" name=enviar_calificacion[$i][3] value=$fila[3] class=\"hide\" />
                                    <input type=\"text\" name=enviar_calificacion[$i][4] value=\"Incorrecta\" class=\"hide\" />
                                    <td>0</td>
                                    <input type=\"text\" name=enviar_calificacion[$i][5] value=\"0\" class=\"hide\" />
                                </tr>";
                            }
                            $i += 1;
                        }
                    }
                } while (mysqli_next_result($link));
            }
        }
        mysqli_close($link); ?>
                    </tbody>
                    </table>
                    <div class="card-action">
                        <div class="input-field">
                            <center>
                                <a href="../index.html">
                                    <button class="btn waves-effect waves-light blue">
                                        Aceptar<i class="material-icons right">send</i>
                                    </button>
                                </a>
                            </center>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
