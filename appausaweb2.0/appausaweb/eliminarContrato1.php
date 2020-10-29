<?php 
session_start();
if (!isset($_SESSION['user'])) {
 	header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
include_once("conexion.php");
$contrato = $_GET['num'];
$empresa = $_GET['empresa'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$sql = "delete from contrato where num_contrato = $contrato AND empresa = '$empresa'";
if ($result=mysqli_query($con,$sql)){
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Eliminado Exitoso','Se Eliminaron los datos del Contrato identificado con el Numero: $contrato de la empresa: $empresa ');";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: verContratos.php");
} else {
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Eliminado Fallido','Se Trataron de eliminar los datos de Contrato identificado con el Numero: $contrato de la empresa: $empresa ');";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarContrato.php?ccontrato=$contrato$cempresa?$empresa&buscar=");
}
?>