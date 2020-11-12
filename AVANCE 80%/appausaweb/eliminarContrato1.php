<?php 
session_start();
if (!isset($_SESSION['user'])) {
 	header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
include_once("conexion.php");
$contrato = $_GET['num'];
$empresa = $_GET['empresa'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
$sql = "UPDATE contrato set e = 0 where num_contrato = $contrato AND empresa = '$empresa'";
if ($result=mysqli_query($con,$sql)){
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Eliminado Exitoso','Se Eliminaron los datos del Contrato identificado con el Numero: $contrato de la empresa: $empresa ');";
		mysqli_query($con,$inserta);
		$sql = "SELECT num_empleados from empresa where nit = $empresa AND e = 1;";
		$result=mysqli_query($con,$sql);
	  	if(mysqli_num_rows($result) != 0){
         	while($mostrar=mysqli_fetch_array($result)){
			  	$empleados = $mostrar['num_empleados'];
			}
		}
		$empleados = $empleados - 1;
		$sql = "UPDATE empresa set num_empleados = $empleados WHERE nit = $empresa AND e = 1;";
		mysqli_query($con,$sql);
		mysqli_close($con);
		header("Location: verContratos.php");
} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Eliminado Fallido','Se Trataron de eliminar los datos de Contrato identificado con el Numero: $contrato de la empresa: $empresa ');";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarContrato.php?ccontrato=$contrato$cempresa?$empresa&buscar=");
}
?>