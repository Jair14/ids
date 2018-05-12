<?php
  include 'conexion.php';
 ?>
 <?php
  $seccion = $_GET['delete'];
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
      swal({
  title: '¿Estas seguro?',
  text: "No podras deshacer esta accion",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ok'
}).then((result) => {
  if (result) {
    window.location.href = "delete.php?delete=<?php echo $seccion?>";
  }
}, function(dismiss) {
  window.location.href = "materias.php";
})
    </script>
  </body>
</html>
