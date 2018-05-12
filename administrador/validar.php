<?php
include 'conexion.php';
  $usuario = $_POST['usuario'];
  $pass = $_POST['contra'];
  $consulta = $con->query("SELECT * FROM administracion WHERE Usuario = '$usuario' and Password = '$pass'");
  $num = mysqli_num_rows($consulta);
  if ($num == 1) {
    if ($var = $consulta->fetch_assoc()) {
      $user = $var['Usuario'];
      $pasw = $var['Password'];
      $data = $var['session_active'];
    }
    if ($user == $usuario && $pasw == $pass) {
      if ($data == 0) {
        $_SESSION['user'] = $user;
        $_SESSION['pasw'] = $pasw;
        $active = $con->query("UPDATE Administracion SET session_active = 1 WHERE Usuario = '$user' AND  Password = '$pasw'");
        header('location: alerta.php?mensaje=Bienvenido&p=administrador&t=success');
      }else {
        header('location: alerta.php?mensaje=Ya hay una sesion activa con estos datos&p=index&t=error');
      }
    }
  }else {
    header('location: alerta.php?mensaje=Nombre de usuario o contraseña incorrectos&p=index&t=error');
  }
 ?>
