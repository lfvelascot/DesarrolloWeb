<?php
	include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$nombre = $_GET['perfil'];
$descrip = $_GET['descrip'];
$rolasos = $_GET['rol'];
$actividad= $_GET['actividad'];
if (isset($_GET['asignar'])){
	$sql = "INSERT INTO $bd.gestion_actividad VALUES ('$actividad','$nombre',1);";
	if (mysqli_query($con,$sql)){
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Actividad Asignada Ex','Se le asigno la actividad $actividad al perfil $nombre',1;";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: asignarActividades.php?perfil=$nombre&descrip=$descrip&rol=$rolasos&submit=");
	die();
} else {
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Actividad Fallida Fal','Se le trato asignar la actividad $actividad al perfil $nombre ',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: asignarActividades.php?perfil=$nombre&descrip=$descrip&rol=$rolasos&submit=");
	die();
}
} elseif (isset($_GET['desasignar'])){
	$sql = "DELETE FROM $bd.gestion_actividad WHERE actividad = '$actividad' AND perfil = '$nombre';";
	if (mysqli_query($con,$sql)){
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Actividad Desasignada Ex','Se le desasigno la actividad $actividad al perfil $nombre',1;";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: asignarActividades.php?perfil=$nombre&descrip=$descrip&rol=$rolasos&submit=");
	die();
} else {
	include_once("date.php");
	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Actividad Desasignada Fal','Se le trato desasignar la actividad $actividad al perfil $nombre ',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	header("Location: asignarActividades.php?perfil=$nombre&descrip=$descrip&rol=$rolasos&submit=");
	die();
}
}

	

?>