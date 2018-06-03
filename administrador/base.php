<?php
include 'conexion.php'; // Incluimos la conexion
if (!isset($_SESSION['user'])) { // Si no existe una sesión iniciada se redireccionará al inicio
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
	      <a href="#" class="brand-logo center">Base de Datos</a>
	    </div>
	  </nav>

    <br><br>
			<!--Inicia el contenedor del instructivo-->
	  <div class="container">
      <div class="row">
        <div class="col s12">
          <div class="card z-depth-5">
            <div class="card-content">
                <div class="center">
                  <span class="card-title">Insertar base de datos de alumnos</span>
                  <form action='importar.php' method='post' enctype="multipart/form-data">
                     Importar Archivo : <input type='file' name='sel_file' size='20'><br><br>
                     <input type='submit' class="btn waves-effect waves-light" name='submit' value='Enviar'>
                    </form>
                </div>
            </div>
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
		      <a><span class="white-text name">Usuario: <?php echo $_SESSION['user'] //Imprimimos el valor de la variable de sesión?></span></a>
		      <a><span class="white-text email">Tipo de cuenta: Administrador</span></a>
		    </div></li>

		    <li><a href="index.php"><i class="material-icons">home</i>Inicio</a></li>
		    <li><a href="materias.php"><i class="material-icons">create</i>Secciones</a></li>
		    <li><a href="preguntas.php"><i class="material-icons">assignment</i>Preguntas</a></li>
		    <li><a href="aspirantes.php"><i class="material-icons">assignment_ind</i>Aspirantes</a></li>
		    <li><a href="../calificar/calif.html"><i class="material-icons">assessment</i>Calificar</a></li>
				<!--Solamente si ya han sido publicados los resultados, se podrá acceder a la opción de resultados del sistema-->
				<?php
					$consulta = $con->query("SELECT * FROM calificacion");
					$resultados = mysqli_num_rows($consulta);
					if ($resultados < 1) {
				 ?>
				 	<li><a disabled><i class="material-icons">assignment_ind</i>Resultados</a></li>
			 <?php }else{?>
				 	<li><a href="resultados.php"><i class="material-icons">assignment_ind</i>Resultados</a></li>
			 <?php } ?>
			 <li><a href="base.php"><i class="material-icons">apps</i>Base de datos</a></li>
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
      $('.carousel').carousel({indicators: true}); // Inicialzación del sidenav
    });
</script>
</body>
</html>
