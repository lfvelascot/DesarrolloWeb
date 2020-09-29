<?php
include_once("conexion.php");
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$correo = $_GET['ccorreo'];
$contr = $_GET['ccontrasena'];
$consulta="SELECT usuario FROM $bd.cuenta_app_web where correo_electronico='$correo' AND contrasena ='$contr' AND estado = 'ACTIVO';";
$resultado = mysqli_query($con, $consulta);
if (mysqli_num_rows($resultado) != 0){
	$fila = mysqli_fetch_row($resultado);
	$cc = $fila[0];
	$consulta="SELECT rol FROM $bd.usuario where cc=$cc;";
	$resultado = mysqli_query($con, $consulta);
	if(mysqli_num_rows($resultado) != 0){
		$fila = mysqli_fetch_row($resultado);
		if ($fila[0] == 'ADMINISTRADOR'){
			session_start();
			$_SESSION['user'] = $correo;
			header("Location: administrador/paginaAdmons.php");
			mysqli_close($con);
			exit;
		}elseif ($fila[0] == 'TALENTO HUMANO'){
			session_start();
			$_SESSION['user'] = $correo;
			header("Location: empresas/paginaEmpresas.php");
			mysqli_close($con);
			exit;
		}else{
			header("Location: ./");	
			mysqli_close($con);
			exit;
		}
	} else {
		header("Location: ./");	
		mysqli_close($con);
		exit;
	}
}else{
	header("Location: ./");	
	mysqli_close($con);
	exit;
}
mysqli_close($con);
?>