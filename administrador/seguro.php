<?php
  include 'conexion.php'; // Incluimos la conexion
 ?>
 <?php
  $seccion = $_GET['delete']; // Recibimos el parametro de la sección a eliminar
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Proyecto</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.css">
  </head>
  <body>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.3.2/sweetalert2.js"></script>
    <script>
      swal({ // Mandamos a pantalla un mensaje de confirmación para eliminar la sección
  title: '¿Estas seguro?',
  text: "No podras deshacer esta accion",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ok'
}).then((result) => {
  if (result) { // En caso de aceptar, se procederá a eliminar la sección
    window.location.href = "eliminarbase.php?delete=<?php echo $seccion?>";
  }
}, function(dismiss) { // De lo contrario, se regresará a visualizar las secciones
  window.location.href = "base.php";
})
    </script>
  </body>
</html>
