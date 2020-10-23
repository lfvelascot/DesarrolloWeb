<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$correo = $_GET['correo'];
$usuario = $_GET['user'];
$perfil = $_GET['perfil'];
$sql = "UPDATE $bd.cuenta SET perfil = '$perfil' WHERE usuario = '$usuario';";
if (mysqli_query($con,$sql)){
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Cuenta Modificado Exitoso','Se cambio el perfil de la cuenta del usuario : $usuario',1;";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: buscarCuenta.php?ccc=$usuario&add=");
	die();
} else {
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Cuenta Modificado Fallido','Conflicto con la actualizacion de los datos de la cuenta del usuario : $usuario',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location:  modificarPerfilCuenta.php?correo=$correo&user=$usuario");
	die();
}

?>