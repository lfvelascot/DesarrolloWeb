<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$id = $_GET['ccc'];
$update = "UPDATE $bd.perfil SET e = 0 WHERE nombre = '$id';";
if (mysqli_query($con,$update)){
	$update = "UPDATE $bd.gestion_actividad SET e = 0 WHERE perfil = '$id';";
	mysqli_query($con,$update);
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Perfil Eliminado Exitoso','Se ocultaron los datos del perfil: $id',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: eliminarPerfil.php");
	die();
} else {
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Perfil Eliminado Fallido','Se trato de ocultar los datos de la cuenta del usuario : $usuario',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: buscarPerfil.php?perfil=$id&add=");
	die();
}
?>