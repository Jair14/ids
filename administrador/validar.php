<?php
include 'conexion.php'; // Incluimos la conexion
  $usuario = $_POST['usuario']; // Recibimos al usuario
  $pass = $_POST['contra']; // Recibimos el Password
  $consulta = $con->query("SELECT * FROM administracion WHERE Usuario = '$usuario' and Password = '$pass'"); // Seleccionamos todo de la tabla de administracion cuando los campos coincidan a los parametros recibidos
  $num = mysqli_num_rows($consulta); // Obtenemos el número de filas de la consulta
  if ($num == 1) {
    if ($var = $consulta->fetch_assoc()) {
      $user = $var['Usuario']; // Extraemos el usuario
      $pasw = $var['Password']; // Extraemos el Password
      $data = $var['session_active']; // Extraemos la sesión
    }
    if ($user == $usuario && $pasw == $pass) {
      if ($data == 0) {
        $_SESSION['user'] = $user; // Creamos la variable de sesión para el usuario
        $_SESSION['pasw'] = $pasw; // Creamos la variable de sesión para el usuario
        $active = $con->query("UPDATE administracion SET session_active = 1 WHERE Usuario = '$user' AND  Password = '$pasw'"); // Actualizamos la tabla de administración
        header('location: alerta.php?mensaje=Bienvenido&p=administrador&t=success'); // Mnesaje de éxito
      }else {
        header('location: alerta.php?mensaje=Ya hay una sesion activa con estos datos&p=index&t=error'); // Mensaje de error
      }
    }
  }else {
    header('location: alerta.php?mensaje=Nombre de usuario o contraseña incorrectos&p=index&t=error'); // Mensaje de error
  }
 ?>
