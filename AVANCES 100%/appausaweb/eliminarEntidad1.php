<?php 
session_start();
if (!isset($_SESSION['user'])) {
 	header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
include_once("conexion.php");
$empresa = $_GET['nit'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
$sql = "UPDATE entidad set e = 0 where nit = '$empresa';";
if ($result=mysqli_query($con,$sql)){
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Entidad Eliminada Exitoso','Se Eliminaron los datos de la Entidad identifcada con el NIT: $empresa ',1);";
		mysqli_query($con,$inserta);
		$sql = "UPDATE entidades_contratadas set e = 0 where nit_entidad = '$empresa';";
		mysqli_query($con,$sql);
		mysqli_close($con);
		$m = "Se eliminaron los datos de la entidad: $empresa y los contratos asociados a esta.";
		header("Location: verEntidades.php?m=$m");
} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Empresa Eliminada Fallido','Se Trataron de eliminar los datos de Contrato identificado con el Numero: $contrato de la empresa: $empresa ',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarEntidad.php?nit=$empresa&buscar=");
}
?>