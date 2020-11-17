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
$sql="SELECT estado FROM cuenta WHERE usuario = '$id';";
$result=mysqli_query($con,$sql);
$estado = "";
if(mysqli_num_rows($result) != 0){
	while($mostrar=mysqli_fetch_array($result)){
		$estado = $mostrar["estado"];
	}
}
if ($estado == "ACTIVA" ){
	$update = "UPDATE cuenta SET estado = 'BLOQUEADA' WHERE usuario = $id;";
} elseif ($estado == "BLOQUEADA") {
	$update = "UPDATE cuenta SET estado = 'ACTIVA', intentos_fallidos = '0' WHERE usuario = $id;";
}
if (mysqli_query($con,$update)){
	include_once("date.php");
	$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Modificado Exitoso','Se cambio el estado de la cuenta del usuario : $vusario a $estado',1;";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: buscarCuenta.php?ccc=$id&add=");
	die();
} else {
	include_once("date.php");
	// Conflicto con la actualizacion del estado de la cuenta del usuario : $id
	$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Modificado Fallido','$update',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: buscarCuenta.php?ccc=$id&add=");
	die();
}
?>