<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="image/png" href="multi/icon.png" />
<title>Ingreso - APPAUSA WEB</title>
<style type="text/css">
#Main {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1366px;
	height: 635px;
	z-index: 1;
	
}
#apDiv2 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1919px;
	height: 112px;
	z-index: 2;
	background: #74B1F5;
	visibility: visible;
}
#apDiv1 #apDiv2 {
	font-family: Arial, Helvetica, sans-serif;
}
#apDiv3 {
	position: absolute;
	left: 809px;
	top: 122px;
	width: 434px;
	height: 409px;
	z-index: 2;
	background: url(multi/bgInicio.png)
}
#apDiv4 {
	position: absolute;
	left: 80px;
	top: 18px;
	width: 73px;
	height: 74px;
	z-index: 3;
}
#apDiv5 {
	position: absolute;
	left: 180px;
	top: 31px;
	width: 853px;
	height: 53px;
	z-index: 4;
}
#apDiv6 {
	position: absolute;
	left: 345px;
	top: 640px;
	width: 1284px;
	height: 53px;
	z-index: 3;
	background-color: #FFFFFF;
}
#apDiv7 {
	position: absolute;
	left: 49px;
	top: 31px;
	width: 345px;
	height: 47px;
	z-index: 4;
}
#apDiv8 {
	position: absolute;
	left: 500px;
	top: 216px;
	width: 348px;
	height: 321px;
	z-index: 5;
}
#apDiv9 {
	position: absolute;
	left: 49px;
	top: 91px;
	width: 346px;
	height: 272px;
	z-index: 5;
}
#apDiv10 {
	position: absolute;
	left: 863px;
	top: 464px;
	width: 344px;
	height: 45px;
	z-index: 6;
}
#apDiv11 {
	position: absolute;
	left: 0px;
	top: 117px;
	width: 1919px;
	height: 871px;
	z-index: 1;
	color: #D6D6D6;
	background:url(multi/background1.jpg)
}
#apDiv1 #apDiv11 #apDiv3 #apDiv7 h1 {
	color: #000000;
}
#Main #apDiv11 #apDiv3 #apDiv7 h1 {
	color: #000000;
}
</style>
<link href="multi/animaciones.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
<?php
if (isset($_GET['failed'])) {
	$m = $_GET['failed'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
?>
<div id="Main">
  <div id="apDiv2">
    <div id="apDiv4"><a title="Pagina Principal" href="index.html"><img src="multi/icono.png" width="72" height="73"></a></div>
	<div id="apDiv5">
  	<img src="multi/textopagina.png">
	</div>
  </div>
  <div align="center"></div>
<div id="apDiv11">
  <div id="apDiv3" >
    <div align="center"></div>
    <div id="apDiv7" align="center"><h1>INGRESO</h1></div>
<div id="apDiv9" align="center">
<form method="get" oninput="range_control_value.value = range_control.valueAsNumber">
<p align="center">Correo Electronico: <input type="text" name="ccorreo" value = "<?php if (isset($_GET['correo'])) {include ("mcript.php"); $c =  $_GET['correo']; echo $c;}?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" autofocus required /></p>
<p align="center">Contraseña:<input type="password" name="ccontrasena" autofocus required /></p>
<button type="submit" name="login">Ingresar</button>
</form>
<?php
include_once("conexion.php");
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
if (isset($_GET['login'])) {
	include ("mcript.php");
	$dato_encriptado1 = $encriptar($_GET['ccorreo']);
	$dato_encriptado2 = $encriptar($_GET['ccontrasena']);
	$consulta = "select * from cuenta where correo_electronico = '$dato_encriptado1';";
	$resultado = mysqli_query($con, $consulta);
	if (mysqli_num_rows($resultado) != 0){
		$fila = mysqli_fetch_row($resultado);
		$contrasena = $fila[1];
		$estado = $fila[2];
		$perfil = $fila[3];
		$usuario = $fila[4];
		$fallidos = $fila[6];
		if ($estado == "ACTIVA"){
			if ($contrasena == $dato_encriptado2){
				if ($fallido != 0){
					$consulta = "UPDATE cuenta SET intentos_fallidos = 0 WHERE correo_electronico = '$dato_encriptado1';";
					mysqli_query($con,$consulta);
				}
				$consulta = "SELECT rol_asociado from perfil WHERE nombre = '$perfil';";
				$resultado = mysqli_query($con, $consulta);
				$fila = mysqli_fetch_row($resultado);
				session_start();
				$_SESSION['user'] = $dato_encriptado1;
				$_SESSION['perfil'] = $perfil;
				$_SESSION['rol'] = $fila[0];
				$_SESSION['cc'] = $usuario;
				if ($_SESSION['rol']  == 'TALENTO HUMANO'){
					$consulta="SELECT empresa FROM contrato WHERE empleado = $usuario AND e = 1;";
					$resultado = mysqli_query($con, $consulta);
					if (mysqli_num_rows($resultado) != 0){
						$fil = mysqli_fetch_row($resultado);
						$_SESSION['empresa'] = $fil[0];
						$nit = $fil[0];
						$consulta="SELECT inicio_actividad,fin_actividad FROM empresa where nit = $nit AND e = 1;";
						$resultado = mysqli_query($con, $consulta);
						if (mysqli_num_rows($resultado) != 0){
							$fila = mysqli_fetch_row($resultado);
							include_once("date.php");	
							$inicio = intval($fila[0]);
							$fin = intval($fila[1]);
							$hact = intval($h);
							if ($hact >= $inicio && $hact <= $fin){
								include_once("date.php");		
								$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso a la Aplicación','Sin problemas en el acceso ($nit)',1);";
								mysqli_query($con,$sql);
								header("Location: indexUsuarios.php");
								mysqli_close($con);
								exit;
							} else {
								include_once("date.php");		
								$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso Fallido','Accedio sin problemas',1);";
								mysqli_query($con,$sql);
								session_destroy();
								$m = "No tiene permitido el acceso a la aplicación en este horario (Horario de ingreso para su empresas: $inicio:00 - $fin:00)";
								header("Location: ./?failed=$m");
								mysqli_close($con);
								exit;
							}
						}else {
							include_once("date.php");		
							$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso Fallido','Accedio sin problemas',1);";
							mysqli_query($con,$sql);
							session_destroy();
							$m = "Usted aun no cuenta con un contrato asociado a la empresa ninguna empresa";
							header("Location: ./?failed=$m");
							mysqli_close($con);
							exit;
						}
					} else {

					}
				} elseif ($_SESSION['rol']  == 'ADMINISTRADOR'){
					include ("horario_admons.php");
					include ("date.php");
					$hora = intval($h);
					if ($hora >= $inicio && $hora <= $fin){
						include_once("date.php");		
						$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso a la Aplicación','Sin problemas en el acceso',1);";
						mysqli_query($con,$sql);
						header("Location: indexUsuarios.php");
						mysqli_close($con);
						exit;
					}else {
						include_once("date.php");		
						$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso Fallido','Accedio sin problemas',1);";
						mysqli_query($con,$sql);
						session_destroy();
						$m = "No tiene permitido el acceso a la aplicación en este horario";
						header("Location: ./?failed=$m");	
						mysqli_close($con);
						exit;
					}
				}
				$_SESSION['cc'] = $usuario;
				include_once("date.php");	
				$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso a la Aplicación','Sin problemas en el acceso',1);";
				mysqli_query($con,$sql);
				$consulta = "UPDATE cuenta SET intentos_fallidos = 0 WHERE correo_electronico = '$dato_encriptado1';";
				mysqli_query($con,$consulta);
				mysqli_close($con);
				header("Location: indexUsuarios.php");
				exit;	
			} else {
				if ($fallidos == 3){
					$consulta = "UPDATE cuenta SET estado = 'BLOQUEDA' WHERE correo_electronico = '$dato_encriptado1';";
					mysqli_query($con,$consulta);
					$consulta = "UPDATE cuenta SET intentos_fallidos = 0 WHERE correo_electronico = '$dato_encriptado1';";
					mysqli_query($con,$consulta);
					$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso Fallido','La cuenta Fue Bloqueda por Exceso de Ingresos Fallidos',1);";
					mysqli_query($con,$sql);
					mysqli_close($con);
					session_destroy();
					$mensaje = "La Cuenta fue bloqueda por exceso de intentos fallidos en el ingreso. Comuniquese al siguiente Correo para arreglar el problema ()";
					header("Location: ./?failed=$mensaje");	
					exit;
				} else {
					$fallidos = $fallidos+1;
					$consulta = "UPDATE cuenta SET intentos_fallidos = $fallidos WHERE correo_electronico = '$dato_encriptado1';";
					mysqli_query($con,$consulta);
					$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso Fallido','Ingreso Fallido a APPAUSA',1);";
					mysqli_query($con,$sql);
					mysqli_close($con);
					session_destroy();
					$mensaje = "Ingreso Fallido - Intente de nuevo (a los tres intentos la cuenta sera bloqueda por seguridad)";
					$correo = $_GET['ccorreo'];
					header("Location: ./?correo=$dato_encriptado1&failed=$mensaje");
					exit;
				}
			}
		} else {
			include_once("date.php");
			$sql="INSERT INTO log VALUES ('$dato_encriptado1','$f','Ingreso Fallido','La cuenta de este usuario se encuentra BLOQUEADA, pero trato de ingresar',1);";
			mysqli_query($con,$sql);
			mysqli_close($con);
			session_destroy();
			$mensaje = "La cuenta esta Bloqueda, no puede ingresar a APPAUSA Gestor de Empleados";
			header("Location: ./?failed=$mensaje");	
			exit;
		}
	} else {
		mysqli_close($con);
		$mensaje = "Correo No Registrado";
		header("Location: ./?failed=$mensaje");	
		exit;
	}
}
?>
</div>
</div>
<div id="apDiv6" ><p>Descripción</div>
<div id="apDiv10"><p style="text-align:center;"><a href="contrasenaOlvidada.html"> Olvide mi contraseña</a></p></div>
</div>
</div> 
</div>
</body>
</html>
