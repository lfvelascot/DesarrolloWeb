<?php
include_once("conexion.php");
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
if (isset($_GET['login'])) {
	$correo = $_GET['ccorreo'];
	include ("mcript.php");
	$dato_encriptado1 = $encriptar($correo);
	$contr = $_GET['ccontrasena'];
	$dato_encriptado2 = $encriptar($contr);
	$consulta="SELECT usuario, perfil FROM $bd.cuenta where correo_electronico = '$dato_encriptado1' AND contrasena = '$dato_encriptado2' AND estado = 'ACTIVA' AND e = 1;";
	$resultado = mysqli_query($con, $consulta);
	if (mysqli_num_rows($resultado) != 0){
		$fila = mysqli_fetch_row($resultado);
		$cc = $fila[0];
		$perfil = $fila[1];
		$consulta="SELECT rol FROM $bd.usuario where cc = $cc;";
		$resultado = mysqli_query($con, $consulta);
		if(mysqli_num_rows($resultado) != 0){
			$fila = mysqli_fetch_row($resultado);
			session_start();
			$_SESSION['user'] = $dato_encriptado1;
			$_SESSION['perfil'] = $perfil;
			if ($fila[0] == 'ADMINISTRADOR'){
				$_SESSION['rol'] = $fila[0];
				include ("horario_admons.php");
				include ("date.php");
				$hora = intval($h);
				if ($hora >= $inicio && $hora <= $fin){
					include_once("date.php");		
					$sql="INSERT INTO $bd.log VALUES ('$correo','$f','Ingreso a la Aplicación','Sin problemas en el acceso',1);";
					mysqli_query($con,$sql);
					header("Location: indexUsuarios.php");
					mysqli_close($con);
					exit;
				}else {
					include_once("date.php");		
					$sql="INSERT INTO $bd.log VALUES ('$correo','$f','Ingreso Fallido','Accedio sin problemas',1);";
					mysqli_query($con,$sql);
					session_destroy();
					header("Location: ./");	
					mysqli_close($con);
					exit;
				}
			}elseif ($fila[0] == 'TALENTO HUMANO'){
				$_SESSION['rol'] = $fila[0];
				$consulta="SELECT empresa FROM $bd.contrato where empleado = $cc AND e = 1;";
				$resultado = mysqli_query($con, $consulta);
				if (mysqli_num_rows($resultado) != 0){
					$fil = mysqli_fetch_row($resultado);
					$_SESSION['empresa'] = $fil[0];
					$nit = $fil[0];
					$consulta="SELECT inicio_actividad,fin_actividad FROM $bd.empresa where nit = $nit AND e = 1;";
					$resultado = mysqli_query($con, $consulta);
					if (mysqli_num_rows($resultado) != 0){
						$fila = mysqli_fetch_row($resultado);
						include_once("date.php");	
						$inicio = intval($fila[0]);
						$fin = intval($fila[1]);
						$hact = intval($h);
						if ($h >= $fila[0] && $h <= $fila[1]){
							include_once("date.php");		
							$sql="INSERT INTO $bd.log VALUES ('$correo','$f','Ingreso a la Aplicación','Sin problemas en el acceso',1);";
							mysqli_query($con,$sql);
							header("Location: indexUsuarios.php");
							mysqli_close($con);
							exit;
						} else {
							include_once("date.php");		
							$sql="INSERT INTO $bd.log VALUES ('$correo','$f','Ingreso Fallido','Accedio sin problemas',1);";
							mysqli_query($con,$sql);
							session_destroy();
							header("Location: ./");	
							mysqli_close($con);
							exit;
						}
					}else {
						include_once("date.php");		
						$sql="INSERT INTO $bd.log VALUES ('$correo','$f','Ingreso Fallido','Accedio sin problemas',1);";
						mysqli_query($con,$sql);
						session_destroy();
						header("Location: ./");	
						mysqli_close($con);
						exit;
					}
			}else {
				include_once("date.php");		
				$sql="INSERT INTO $bd.log VALUES ('$correo','$f','Ingreso Fallido','Accedio sin problemas',1);";
				mysqli_query($con,$sql);
				session_destroy();
				header("Location: ./");	
				mysqli_close($con);
				exit;
			}
		} else {
			include_once("date.php");		
			$sql="INSERT INTO $bd.log VALUES ('$correo','$f','Ingreso Fallido','Accedio sin problemas',1);";
			mysqli_query($con,$sql);
			session_destroy();
			header("Location: ./");	
			mysqli_close($con);
			exit;
		}
	} else {
		header("Location: ./");	
		mysqli_close($con);
		exit;
	}
	} else {
		header("Location: ./");	
		mysqli_close($con);
		exit;
	}
	mysqli_close($con);
}
?>