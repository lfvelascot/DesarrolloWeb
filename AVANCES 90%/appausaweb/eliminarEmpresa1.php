<?php 
session_start();
if (!isset($_SESSION['user'])) {
 	header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
include_once("conexion.php");
$empresa = $_GET['cempresa'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
$sql = "UPDATE empresa set e = 0 where nit = '$empresa';";
if ($result=mysqli_query($con,$sql)){
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Empresa Eliminada Exitoso','Se Eliminaron los datos de la Empresa identifcada con el NIT: $empresa ',1);";
		mysqli_query($con,$inserta);
		$sql = "UPDATE contrato set e = 0 where empresa = '$empresa';";
		mysqli_query($con,$sql);
		$sql = "UPDATE entidades_contratadas set e = 0 where nit_empresa = '$empresa';";
		mysqli_query($con,$sql);
		$sql = "SELECT empleado from contrato where empresa = '$empresa';";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
				$user = $mostrar['empleado'];
				$sql = "UPDATE usuario set e = 0 where cc = '$user';";
				mysqli_query($con,$sql);
				$sql = "UPDATE cuenta set e = 0 where usuario = '$user';";
				mysqli_query($con,$sql);
			}
		}
		mysqli_close($con);
		$m = "Se eliminaron todos los datos de la empresa: $empresa, los contratos de sus empleados, los contratos con entidades, los empleados registrados y las cuentas de acceso al sistema";
		header("Location: verEmpresas.php?m=$m");
} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Empresa Eliminada Fallido','Se trataron de eliminar los datos de la empresa $empresa',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarEmpresa.php?nit=$empresa&buscar=");
}
?>