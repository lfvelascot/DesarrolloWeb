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
$sql="SELECT * from cuenta where usuario = $id;";
$result=mysqli_query($con,$sql);
$estado = "";
if(mysqli_num_rows($result) != 0){
	while($mostrar=mysqli_fetch_array($result)){
		$estado = $mostrar["estado"];
	}
}
if ($estado == "ACTIVA" ){
	$update = "UPDATE $bd.cuenta SET estado = 'BLOQUEADA' WHERE usuario = $id;";
} elseif ($estado == "BLOQUEADA") {
	$update = "UPDATE $bd.cuenta SET estado = 'ACTIVA' WHERE usuario = $id;";
}
if (mysqli_query($con,$update)){
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Cuenta Modificado Exitoso','Se cambio el estado de la cuenta del usuario : $vusario a $estado',1;";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: buscarCuenta.php?ccc=$id&add=");
	die();
} else {
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Cuenta Modificado Fallido','Conflicto con la actualizacion del estado de la cuenta del usuario : $usuario',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: buscarCuenta.php?ccc=$id&add=");
	die();
}
?>