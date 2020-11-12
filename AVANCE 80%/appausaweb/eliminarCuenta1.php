<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
$id = $_GET['ccc'];
$update = "UPDATE cuenta SET e = 0 WHERE usuario = $id;";
if (mysqli_query($con,$update)){
	include_once("date.php");
	$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Eliminado Exitoso','Se oculto los datos de la cuenta del usuario : $id',1;";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: eliminarCuenta.php");
	die();
} else {
	include_once("date.php");
	$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Eliminado Fallido','Se trato de ocultar los datos de la cuenta del usuario : $usuario',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: buscarCuenta.php?ccc=$id&add=");
	die();
}
?>