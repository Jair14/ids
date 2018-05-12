<?php
include 'conexion.php';
$user =   $_SESSION['user'];
$password = $_SESSION['pasw'] ;
echo $user;
echo $password;
$ses= $con->query("UPDATE Administracion SET session_active = 0 WHERE  Usuario = '$user' AND Password = '$password'");
$_SESSION = array();
session_destroy();
header("location: index.php");
 ?>
