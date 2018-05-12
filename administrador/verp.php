<?php
$seccion = $_GET['seccion'];
?>
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
	      <a href="#" class="brand-logo center">Secciones</a>
	    </div>
	  </nav>

		<br>

	  	<div class="">
		  	<div class="row">
		  		<div class="col s12">
		  			<div class="card">
		  				<div class="card-content">
                <span class="card-title center">Preguntas de la sección</span>
                <?php
                    $q = $con->query("SELECT * FROM materias WHERE Materia = '$seccion'");
                  ?>
                <table class="striped">
                  <thead>
                    <tr>
                        <th>Pregunta</th>
                        <th>Respuesta Correcta</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php while ($user = mysqli_fetch_array($q)) {?>
                      <tr>
                        <td><?php echo $user['Pregunta']; ?></td>
                        <td><?php echo $user['Respuesta_correcta']; ?></td>
                        <td><a href="deletep.php?pregunta=<?php echo $user['Pregunta']; ?>">Eliminar</a></td>
                      </tr>
                    <?php } ?>
                  </tbody>
               </table>
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
			 <li><a href="materias.php"><i class="material-icons">create</i>Materias</a></li>
			 <li><a href="preguntas.php"><i class="material-icons">assignment</i>Preguntas</a></li>
			 <li><a href="aspirantes.php"><i class="material-icons">assignment_ind</i>Aspirantes</a></li>
			 <li><a disabled><i class="material-icons">assessment</i>Calificar</a></li>
			 <li><a href="logout.php"><i class="material-icons">exit_to_app</i>Salir del sistema</a></li>

		    <li><div class="divider"></div></li>
		    <center><br><br><p><i class="material-icons">settings</i></p><p>ADMINISTRADOR</p></center>
 		</ul>
  		<a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>
 </div>
</main>

</body>
</html>
