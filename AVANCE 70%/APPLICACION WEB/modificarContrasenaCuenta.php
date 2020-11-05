<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 5px;
	top: -20px;
	width: 1606px;
	height: 720px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 364px;
	top: 93px;
	width: 915px;
	height: 210px;
	z-index: 2;
}
</style>
<link href="multi/formularios.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
  $correo =  $_GET['correo'];
  $user =  $_GET['user'];
  $_SESSION['cmod'] = $correo;
  $_SESSION['umod'] = $user;
	if (isset($_GET['react'])){  
		$m = $_GET['react'];
		echo "<script type='text/javascript'>alert('$m');</script>";
 	}
  ?>
<div id="apDiv1">
<h1 align="center">Cambiar Contraseña Cuenta(<?php echo "$correo - $user"?>)</h1>
</div>
<div id="apDiv2">
<h2>Datos de Cuenta</h2>
<form>
<table width="915" height="206" border="0">
  <tr>
    <td><p>CC. Usuario:</p></td>
    <td><input type="text" value ="<?php echo $user?>" name="cusuario" readonly="readonly" required /></td>
  </tr>
    <tr>
    <td><p>Correo Electronico:</p></td>
    <td><input type="text" value ="<?php echo $correo?>" name="ccorreo"  pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required="required" readonly="readonly"/></td>
  </tr>	
  <tr>
    <td><p>Contraseña:</p></td>
    <td><input type="password" name="ccontrasena" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required /></td>
  </tr>
  <tr>
    <td><p>Confirmar Contraseña:</p></td>
    <td><input type="password" name="ccontrasenac" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" required /></td>
  </tr>
</table>
<p align="center">
  <button type="submit" name="add">Cambiar Contraseña</button></p>
</form>
<?php
if (isset($_GET['add'])) {
	$vuser = $_GET['cusuario'];
	include_once("mcript.php");
	$vcorreo = $_GET['ccorreo'];
	$vcorreo = $encriptar($vcorreo);
	$vcontr1 = $_GET['ccontrasena'];
	$vcontr2 = $_GET['ccontrasenac'];
	$matches = null;
	if ($vcontr1 == $vcontr2){
				$contre = $encriptar($vcontr1);
				$user_ses = $_SESSION['user'];
				$sql = "UPDATE cuenta SET contrasena = '$contre' WHERE usuario = '$vuser';"; 
				if (mysqli_query($con,$sql)){
					include_once("date.php");
					$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Modificado Exitoso','Modifico la contraseña de la cuenta:$vcorreo   ---  $vuser',1);";
					mysqli_query($con,$inserta);
					mysqli_close($con);
					header("Location: buscarCuenta.php?ccc=$vuser&add");
					die();
				} else {
					include_once("date.php");
					$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Modificado Fallido','Conflico con los datos de la Cuenta($sql)',1);";
					mysqli_query($con,$inserta);
					mysqli_close($con);
					$vcorreo = $desencriptar($vcorreo);
					$m = "Las contraseñas no coinciden, o no cumplen con los requisitos (Mas de 8 caracteres, entre letras (mayusculas y minusculas) y numeros)";
					header("Location: modificarContrasenaCuenta.php?correo=$vcorreo&user=$vuser&react=$m");
					die();
				}
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Modificado Fallido','Las contraseñas no considieron o no cumplen con las condiciones (mayor a 8 caracteres, con valores de letras(Mayusculas-minusculas)) y numeros',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		$vcorreo = $desencriptar($vcorreo);
		$m = "Las contraseñas no coinciden, o no cumplen con los requisitos (Mas de 8 caracteres, entre letras (mayusculas y minusculas) y numeros)";
		header("Location: modificarContrasenaCuenta.php?correo=$vcorreo&user=$vuser&react=$m");
		die();
	}
}
?>

</div>
</body>
</html>
