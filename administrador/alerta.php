<?php
  include 'conexion.php'; // Incluimos la conexion
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Proyecto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
  </head>
  <body>
    <?php
      // Recibimos los valores por método POST
      $mensaje = htmlentities($_GET['mensaje']);
      $p= htmlentities($_GET['p']);
      $t= htmlentities($_GET['t']);

      // Establecemos un switch para determinar hacia que archivo debe de dirigirse según la variable p
      switch ($p) {
        case 'administrador':
          $pagina = 'admon.php';
          break;
        case 'alumno':
          $pagina = 'alumno.php';
          break;
        case 'index':
          $pagina = 'index.php';
          break;
        case 'anade':
          $pagina = 'preguntas.php';
          break;
        case 'seccion':
          $pagina = 'preguntas.php';
          break;
        case 'adseccion':
          $pagina = 'materias.php';
          break;
      }

      if ($t == "error") { //Según la variable t, mandamos un mensaje de error o de éxito
        $titulo = "Oppss..";
      }else {
        $titulo = "Buen trabajo!";
      }

     ?>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity = "sha2556-hWnYaiADRTO2PzUGmuLJr88LUSjGIZsDYGnIJLv2b8" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
    <script>
      swal({ // Mandamos una alerta a pantalla con los valores que obtuvimos desde PHP
        title: '<?php echo $titulo ?>',
        text: "<?php echo $mensaje ?>",
        type: '<?php echo $t ?>',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Ok!'
      }).then(function () {  // Le decimos hacia donde se tiene que dirigir
          location.href = '<?php echo $pagina ?>';
        });
        $(document).click(function(){
          location.href = '<?php echo $pagina ?>';
        });
        $(document).keyup(function(e){ // Escapamos la tecla esc para que de todas maneras se rediriga hacia donde debe
          if (e.which == 27) {
            location.href = '<?php echo $pagina ?>';
          }
        });
    </script>
  </body>
</html>
