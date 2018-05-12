<?php
include 'conexion.php';
if (!isset($_SESSION['user'])) {
	header('location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<title>Administrador</title>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <style media="screen">
     html {
    font-family: GillSans, Calibri, Trebuchet, sans-serif;
  }
    .button-collapse{
    	display: none;
    }
    	header, main, footer {
      padding-left: 300px;
    }

    @media only screen and (max-width : 992px) {
      header, main, footer {
        padding-left: 0;
      }
      .button-collapse{
    	display: inherit;
    }
    }
    </style>
</head>
<body>


<main>

	  <nav class="#455a64 blue-grey darken-2">
	    <div class="nav-fixed">
	      <img src="images/logo.png" class="brand-logo right circle" width="80px" height="65px">
	      <a href="#" class="brand-logo center">INICIO</a>
	    </div>
	  </nav>

	  	<div class="title">
	  		<center><h1><b>Bienvenido al sistema</b></h1></center>
	  	</div>

	  	<div class="container">
		  	<div class="row">
		  		<div class="col s12">
		  			<div class="card">
		  				<div class="card-content">
									<span class="card-title center"><b>Instructivo</b></span>
									<div class="flow-text">
										Dentro de esta parte te daremos una breve explicación de lo que puedes hacer en cada uno de los apartados del sistema.<br>
										<b>Secciones: </b>Aquí podrás crear, ver, actualizar y eliminar las secciones que contendrán el examen. También podrás consultar las preguntas registradas para cada sección.<br>
										<b>Preguntas: </b>Dentro de éste apartado podrás registrar las preguntas que aparecerán en cada sección, así como tambien podrás descargar reportes PDF de las preguntas y respuestas correctas.<br>
										<b>Aspirantes: </b>Podrás visualizar y buscar en tiempo real a los aspirantes. También puedes descargar reportes en Excel y ver las respuestas de los alumnos en formato PDF.<br>
										<b>Calificar: </b>Una vez realizados los examenes, podrás calificarlos de manera automatizada.<br>
										<b>Resultados: </b>Podrás verificar los resultados y puntajes de cada alumno, así como una calificación desglosada por cada aspirante. (Esta pestaña estará desactivada hasta que sean calificados los examenes)
									</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		</div>
		<div class="carousel">
		    <a class="carousel-item" href="#one!"><img src="http://www.ricardosalinas.com/blog/images/Tiempo_de_educar.jpg" height="200px"></a>
		    <a class="carousel-item" href="#two!"><img src="http://www.ricardosalinas.com/blog/images/De-Plantel-Azteca-para-el-mundo.jpg" height="200px"></a>
		    <a class="carousel-item" href="#three!"><img src="http://www.gruposalinas.com/imagen.ashx?idgb=430&idimg=19" height="200px"></a>
		    <a class="carousel-item" href="#four!"><img src="http://www.ricardosalinas.com/blog/images/Ricardo_Salinas_Pliego_Graduacion_PlantelAzteca.jpg" height="200px"></a>
		  </div>


		<ul id="slide-out" class="side-nav fixed">
		    <li><div class="user-view">
		      <div class="background">
		        <img src="images/fondo.jpg">
		      </div>
		      <a><img  src="images/avatar.png" width="100px" height="100px"></a>
		      <a><span class="white-text name">Usuario: <?php echo $_SESSION['user'] ?></span></a>
		      <a><span class="white-text email">Tipo de cuenta: Administrador</span></a>
		    </div></li>

		    <li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
		    <li><a href="materias.php"><i class="material-icons">create</i>Secciones</a></li>
		    <li><a href="preguntas.php"><i class="material-icons">assignment</i>Preguntas</a></li>
		    <li><a href="aspirantes.php"><i class="material-icons">assignment_ind</i>Aspirantes</a></li>
		    <li><a href="../calificar/calif.html"><i class="material-icons">assessment</i>Calificar</a></li>
				<?php
					$consulta = $con->query("SELECT * FROM calificacion");
					$resultados = mysqli_num_rows($consulta);
					if ($resultados < 1) {
				 ?>
				 	<li><a disabled><i class="material-icons">assignment_ind</i>Resultados</a></li>
			 <?php }else{?>
				 	<li><a href="resultados.php"><i class="material-icons">assignment_ind</i>Resultados</a></li>
			 <?php } ?>
				<li><a href="logout.php"><i class="material-icons">exit_to_app</i>Salir del sistema</a></li>

		    <li><div class="divider"></div></li>
		    <center><p><i class="material-icons">settings</i></p><p>ADMINISTRADOR</p></center>
 		</ul>
  		<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
 </div>
</main>
	<script>
	 $(".button-collapse").sideNav({menuWidth: 337});
	   $(document).ready(function(){
      $('.carousel').carousel({indicators: true});
    });

</script>
</body>
</html>
