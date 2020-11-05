<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
  include_once("mcript.php");
  $con=mysqli_connect($desencriptar($host),$desencriptar($usuario),$desencriptar($clave),$desencriptar($bd)) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$nit_empresa = $_GET['emnit'];
$nit_entidad = $_GET['ennit'];
$sql = "UPDATE entidades_contratadas SET e = 0 WHERE nit_empresa = $nit_empresa AND nit_entidad = $nit_entidad;";
if (mysqli_query($con,$sql)){
	include_once("date.php");
	$inserta = "INSERT INTO log VALUES ('$user_ses','$f','CEntEmp Eliminado Exitoso','Se Elimino el contrato entre la Entidad  $nit_entidad y la empresa $nit_empresa',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	$m = "Contrato entre la entidad $nit_entidad y la empresa $nit_empresa eliminado exitosamente";
	header("Location: seguridadSocEmpresa.php?nit=$nit_empresa&nombre=$nemp&m=$m");
	die();
} else {
	include_once("date.php");
	$inserta = "INSERT INTO log VALUES ('$user_ses','$f','CEntEmp Eliminado Fallido','Ya trato de crear un contrato ya existente entre la entidad $nit_entidad y la empresa $nit_empresa',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	$m = "Ya existe un contrato entre la Entidad $nit_entidad y la empresa $nit_empresa";
	header("Location: seguridadSocEmpresa.php?nit=$nit_empresa&nombre=$nemp&m=$m");
	die();
}
?>