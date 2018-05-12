<?php
include 'conexion.php';
if (!isset($_SESSION['user'])) {
	header('location: index.php');
}
?>
<?php
  $data = $con -> query("SELECT * FROM Alumnos");
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
	  		<center><h1><b>Resultados</b></h1></center>
	  	</div>

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
<script src="js/resultados.js"></script>
</body>
</html>
