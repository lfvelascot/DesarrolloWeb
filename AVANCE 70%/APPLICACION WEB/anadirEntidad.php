<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1569px;
	height: 671px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 366px;
	top: 70px;
	width: 888px;
	height: 274px;
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
if (isset($_GET['error'])){
	$m = $_GET['error'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
?>
<div id="apDiv1">
<h1 align="center">Añadir nueva Entidad</h1>

</div>

<div id="apDiv2">
<h2>Datos Entidad</h2>
<form  oninput="range_control_value.value = range_control.valueAsNumber"> 
  <table width="887" height="199" border="0">
      <tr>
      <td><p>NIT. Entidad:</p></td>
      <td><input type="number" name="cnit" value= "<?php if (isset($_GET['error'])) { echo $_GET['enit'];} else { echo ""; }?>" pattern="^[0-9]{0,14}+-[{0-9}]$" autofocus required /></td>
    </tr>
    <tr>
      <td><p>Nombre de la entidad:</p></td>
      <td><input type="text" name="cnombre" value= "<?php if (isset($_GET['error'])) { echo $_GET['enombre'];} else { echo ""; }?>" autofocus="autofocus" required="required" /></td>
    </tr>
    <tr>
      <td><p>Tipo:</p></td>
      <td><select name="ctipo">
	<option selected value="0">Seleccionar</option>
    <option value="EPS">EPS</option>
    <option value="ARL">ARL</option>
    <option value="CAJA DE COMPENSACIÓN">CAJA DE COMPENSACIÓN</option>
    <option value="FONDO DE PENSIONES">FONDO DE PENSIONES</option>
</select></td>
    </tr>
    <tr>
      <td><p>Teléfono: </p></td>
      <td><input type="tel" name="ctel" value= "<?php if (isset($_GET['error'])) { $vtel = $_GET['etelefono']; $vtel =  $teldesencriptar($vtel); echo $vtel;} else { echo ""; }?>" pattern"^[1-9]\d{9}$" required /></td>
    </tr>
    <tr>
      <td><p>Dirección:</p></td>
      <td><input type="text" name ="cdir" value= "<?php if (isset($_GET['error'])) { echo $_GET['edir'];} else { echo ""; }?>" autofocus  required /></td>
    </tr>
    <tr>
      <td><p>Correo Electrónico: </p></td>
      <td><input type="email" name="cemail" value= "<?php if (isset($_GET['error'])) { $vcorreo = $_GET['ecorreo'];$vcorreo = $desencriptar($vcorreo); echo $vcorreo;} else { echo ""; }?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required /></td>
    </tr>
  </table>
<p align="center"><button type="submit" name="add">Registrar Entidad</button></p>
</form>
<?php
if (isset($_GET['add']) && $_GET['ctipo'] != "0"){
	$vnit = $_GET['cnit'];
	$vnombre = $_GET['cnombre'];
	$vtipo = $_GET['ctipo'];
	$vcorreo = $_GET['cemail'];
	$vdir = $_GET['cdir'];
	$vtelefono = $_GET['ctel'];
	include_once ("mcript.php");
	$vcorreo = $encriptar($vcorreo);
	$vtelefono = $telencriptar($vtelefono);
	$sql = "INSERT INTO entidad VALUES ('$vnit','$vnombre','$vtipo','$vtelefono','$vdir','$vcorreo',1)";
	if (mysqli_query($con,$sql)){
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Entidad Añadida Exitoso','Se ingresaron los datos de la Entidad: $vnit',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarEntidad.php?nit=$vnit&buscar=");
		die();
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Entidad Añadida Fallido','Se trataron de ingresar los datos de la entidad $vnombre',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		$mensaje = "Conflicto con los datos ingresados, por favor verifique que no este tratando de crear una entidad con el NIT ingresado que ya se encuentra registrada.";
		// $vcorreo = $desencriptar($vcorreo);
		header("Location: anadirEntidad.php?enit=$vnit&enombre=$vnombre&ecorreo=$vcorreo&etelefono=$vtelefono&edir=$vdir&error=$mensaje");
	}
}
?>
</div>
</body>
</html>
