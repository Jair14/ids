<?php
include 'conexion.php'; // Incluimos la conexion
if (!isset($_SESSION['user'])) { // Si no existe una sesión iniciada se redireccionará al inicio
	header('location: index.php');
}
?>
<?php
  $data = $con -> query("SELECT * FROM alumnos"); // Seleccionamos todo de la tabla de alumnos
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
		<!--Establecemos los estilos para que el sidenav genere un espacio-->
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

<!--Inicia el contenido principal de la la página-->
<main>
		<!--Inicia la barra de navegación-->
	  <nav class="#455a64 blue-grey darken-2">
	    <div class="nav-fixed">
	      <img src="images/logo.png" class="brand-logo right circle" width="80px" height="65px">
	      <a href="#" class="brand-logo center">INICIO</a>
	    </div>
	  </nav>
		<!--Termina la barra de navegación-->
	  	<div class="title">
	  		<center><h1><b>Resultados</b></h1></center>
	  	</div>

	  	<div class="container">
	  		<div class="row">
	  			<div class="col s12">
	  				<div class="card z-depth-5">
	  					<div class="card-content">
	  						<form action="generar.php" method="POST">
	  							<select class="default-browser" name="grupo">
							      <option value="" disabled selected>Grupo</option>
							      <optgroup label="Primeros Matutino">
                                    <option value="111">111</option>
                                    <option value="112">112</option>
                                    <option value="113">113</option>
                                </optgroup>
                                <optgroup label="Primeros Vespertino">
                                    <option value="121">121</option>
                                    <option value="122">122</option>
                                    <option value="123">123</option>
                                </optgroup>
                                <optgroup label="Segundos Matutino">
                                    <option value="211">211</option>
                                    <option value="212">212</option>
                                    <option value="213">213</option>
                                </optgroup>
                                <optgroup label="Segundos Vespertino">
                                    <option value="221">221</option>
                                    <option value="222">222</option>
                                    <option value="223">223</option>
                                </optgroup>
                                <optgroup label="Tercero Matutino">
                                    <option value="311">311</option>
                                    <option value="312">312</option>
                                    <option value="313">313</option>
                                </optgroup>
                                <optgroup label="Tercero Vespertino">
                                    <option value="321">321</option>
                                    <option value="322">322</option>
                                    <option value="323">323</option>
                                </optgroup>
                                <optgroup label="Cuartos Matutino">
                                    <option value="411">411</option>
                                    <option value="412">412</option>
                                    <option value="413">413</option>
                                </optgroup>
                                <optgroup label="Cuartos Vespertino">
                                    <option value="421">421</option>
                                    <option value="422">422</option>
                                    <option value="423">423</option>
                                </optgroup>
                                <optgroup label="Quintos Matutino">
                                    <option value="511">511</option>
                                    <option value="512">512</option>
                                    <option value="513">513</option>
                                </optgroup>
                                <optgroup label="Quintos Vespertino">
                                    <option value="521">521</option>
                                    <option value="522">522</option>
                                    <option value="523">523</option>
                                </optgroup>
                                <optgroup label="Sextos Matutino">
                                    <option value="611">611</option>
                                    <option value="612">612</option>
                                    <option value="613">613</option>
                                </optgroup>
                                <optgroup label="Sextos Vespertino">
                                    <option value="621">621</option>
                                    <option value="622">622</option>
                                    <option value="623">623</option>
                                </optgroup>
							    </select>
							    <div class="center">
							    	
							    <button type="submit" class="waves-effect waves-light btn center">Generar</button>
							    </div>
	  						</form>
	  					</div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>

			<!--Inicia el contenedor del buscador-->
	  	<div class="container">
		  	<div class="row">
		  		<div class="col s12">
					<div class="input-field">
            <i class="material-icons prefix">search</i>
              <input type="text" class = "buscar"  id="buscar">
              <label for="buscar">Ingresa aquí tú búsqueda</label>
            </div>
		  			<div class="card">
		  				<div class="card-content">
                <div id="datos"></div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		</div>
		<!--Inicia el sidenav para ingresar a las opciones del sistema-->
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
      $('.carousel').carousel({indicators: true}); // Inicializamos el carousel
    });

</script>
<script src="js/resultados.js"></script>
<script>
  $(document).ready(function() {
    $('select').material_select();
  });
</script>
</body>
</html>
