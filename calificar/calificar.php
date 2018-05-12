<?php
    include '../conexion.php';
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
    <?php
    header("refresh: 5.0; url=../index.html");
    endif; ?>
    <?php
    $respuestas = array();
    $respuestas_c = array();
    $consulta_BD = "SELECT * FROM Respuestas_alumno;";
    $consulta_BD .= "SELECT Id_pregunta, Respuesta_correcta FROM Materias";
    $respuestas_alunmo0_correcta1 = 0;
    if(mysqli_multi_query($link, $consulta_BD)):?>
        <?php do{ ?>
            <?php if($resul = mysqli_use_result($link)): ?>
                <?php while($fila = mysqli_fetch_row($resul)):?>
                    <?php if($respuestas_alunmo0_correcta1 == 0): ?>
                        <?php array_push($respuestas, array("$fila[0]", "$fila[1]", "$fila[3]", "$fila[2]")); ?>
                    <?php else: ?>
                        <?php array_push($respuestas_c, array("$fila[0]", "$fila[1]")); ?>
                    <?php endif; ?>
                <?php endwhile; ?>
                <?php mysqli_free_result($resul); ?>
            <?php endif; ?>
            <?php if(mysqli_more_results($link)): ?>
                <?php $respuestas_alunmo0_correcta1 += 1; ?>
            <?php endif; ?>
        <?php }while(mysqli_next_result($link)); ?>
    <?php else: ?>
        <?php $error = mysqli_error($link); ?>
        <script type="text/javascript">
            window.alert("<?php echo $error; ?>, SE TE REDIRECCIONARÁ EN UN MOMENTO");
        </script>
        <?php header("refresh: 6.0; url=../index.html"); ?>
    <?php endif; ?>
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
                        <?php for ($i=0; $i < sizeof($respuestas); $i++):?>
                            <tr>
                                <?php for ($k=0; $k < 4; $k++):?>
                                    <?php if ($k == 2): ?>
                                        <?php for ($j=0; $j < sizeof($respuestas_c); $j++):?>
                                            <?php if ($respuestas[$i][1] == $respuestas_c[$j][0]): ?>
                                                <?php if ($respuestas[$i][2] == $respuestas_c[$j][1]): ?>
                                                    <td>Correcta</td>
                                                    <?php $puntaje = 1;
                                                    $tipo = "Correcta";?>
                                                    <input type="text" name="enviar_calificacion[<?php echo $i; ?>][<?php echo $k; ?>]" value="<?php echo $respuestas[$i][2]; ?>" class="hide">
                                                    <input type="text" name="enviar_calificacion[<?php echo $i; ?>][<?php echo $k+1; ?>]" value="<?php echo $respuestas_c[$j][1]; ?>" class="hide">
                                                <?php else: ?>
                                                    <td>Incorrecta</td>
                                                    <?php $puntaje = 0;
                                                    $tipo = "Incorrecta";?>
                                                    <input type="text" name="enviar_calificacion[<?php echo $i; ?>][<?php echo $k; ?>]" value="<?php echo $respuestas[$i][2]; ?>" class="hide">
                                                    <input type="text" name="enviar_calificacion[<?php echo $i; ?>][<?php echo $k+1; ?>]" value="<?php echo $respuestas_c[$j][1]; ?>" class="hide">
                                                <?php endif; ?>
                                                <input type="text" name="enviar_calificacion[<?php echo $i; ?>][<?php echo $k+2; ?>]" value="<?php echo $tipo; ?>" class="hide">
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    <?php elseif ($k == 3): ?>
                                        <td><?php echo $puntaje; ?></td>
                                        <input type="text" name="enviar_calificacion[<?php echo $i; ?>][<?php echo $k+2; ?>]" value="<?php echo $puntaje; ?>" class="hide">
                                    <?php else: ?>
                                        <td><?php echo $respuestas[$i][$k]; ?></td>
                                        <input type="text" name="enviar_calificacion[<?php echo $i; ?>][<?php echo $k; ?>]" value="<?php echo $respuestas[$i][$k]; ?>" class="hide">
                                    <?php endif; ?>
                                <?php endfor; ?>
                            </tr>
                        <?php endfor; ?>
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
    <?php mysqli_close($link);?>
</body>
</html>
