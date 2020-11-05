<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Añadir Usuario - APPAUSA Web</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1606px;
	height: 720px;
	z-index: 1;
}
</style>
<link href="multi/formularios.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv2 {
	position: absolute;
	left: 242px;
	top: 80px;
	width: 1117px;
	height: 546px;
	z-index: 2;
}
</style>
</head>
<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
if (isset($_GET['error'])){
	$m = $_GET['error'];
	$vcc = $_GET['ecc'];
	$vnombre1 = $_GET['enombre1'];
	if (!empty($_GET['enombre2'])){
		$vnombre2 = $_GET['enombre2'];
	} else {
		$vnombre2 = "";
	}
	$vapellido1= $_GET['eapellido1'];
	$vapellido2= $_GET['eapellido2'];
	$vfechanam = $_GET['efechanam'];
	$vedad = $_GET['eedad'];
	$vcorreo = $_GET['ecorreo'];
	$vtelefono = $_GET['etelefono'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
?>
<body>
<div id="apDiv1">
<h1 align="center">Añadir Nuevo Usuario</h1>
<div id="apDiv2">
<h2>Datos del Usuario</h2>
<form>
<table width="1114" height="274" border="0">
  <tr>
    <td width="243"><p>Número de identificación: </p></td>
    <td width="325"><input type="text" name="cnumdoc" value ="<?php if (isset($_GET['error'])) {echo $vcc;} else {echo "";}?>" title="Aqui se indica el formato"	pattern="^((\d{8})|(\d{10})|(\d{11})|(\d{6}-\d{5}))?$" required="required"/></td>
        <td width="286"><p>Tipo de Documento: </p></td>
    <td width="242"><select name="ctipodoc">
	<option selected value="0">Seleccionar</option>
    <option value="Cedula Ciudadania">Cedula Ciudadania</option>
    <option value="Cedula Extranjeria">Cedula Extranjeria</option>
    <option value="Pasaporte">Pasaporte</option>
</select></td>
  </tr>
  <tr>
    <td><p>Primer Nombre: </p></td>
    <td><input type="text" name="cpnombre" value="<?php if (isset($_GET['error'])) {echo $vnombre1;} else {echo "";}?>" autofocus required /></td>
    <td width="286"><p>Segundo Nombre: </p></td>
    <td width="242"><input type="text"  value="<?php if (isset($_GET['error'])) {echo $vnombre2;} else {echo "";}?> " name="csnombre" autofocus /></td>
  </tr>
  <tr>
    <td><p>Primer Apellido: </p></td>
    <td><input type="text" name="cpapellido" value="<?php if (isset($_GET['error'])) {echo $vapellido1;} else {echo "";}?>" autofocus required /></td>
    <td><p>Segundo Apellido: </p></td>
    <td><input type="text" name="csapellido" value="<?php if (isset($_GET['error'])) {echo $vapellido2;} else {echo "";}?>" autofocus required /></td>
  </tr>
  <tr>
    <td><p>Fecha de nacimiento:</p></td>
    <td><input type="date" name="cfechanam" value="<?php if (isset($_GET['error'])) {echo $vfechanam;} else {echo "";}?>" autofocus required /></td>
    <td><p>Edad:</p></td>
    <td><input type="number" name="cedad" value="<?php if (isset($_GET['error'])) {echo $vedad;} else {echo "";}?>" autofocus required /></td>
  </tr>
  <tr>
    <td><p>Correo Electrónico:</p></td>
    <td><input type="email" name="ccorreo" value="<?php if (isset($_GET['error'])) {echo $vcorreo;} else {echo "";}?>" title="Aqui se indica el formato" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required /></td>
  </tr>
  <tr>
    <td><p>Teléfono:</p></td>
    <td><input type="number" value="<?php if (isset($_GET['error'])) {echo $vtelefono;} else {echo "";}?>" name="ctelefono"  title="Aqui se indica el formato" pattern"^[1-9]\d{9}$"/></td>
  </tr>
  <tr>
    <td><p>Rol:</p></td>
    <td><select name="crol">
	<option selected value="0">Seleccionar</option>
    <?php 
		$sql="SELECT * from rol;";
		$result=mysqli_query($con,$sql);
		while($mostrar=mysqli_fetch_array($result)){
		 ?>
	<option value="<?php echo $mostrar['nombre'] ?>"><?php echo $mostrar['nombre'] ?></option>
	<?php } ?>
</select></td>
  </tr>
</table>
<p align="center"><button type="submit" name="add">Registrar Usuario</button>
</form>
<?php
if (isset($_GET['add']) && $_GET['crol'] != "0" && $_GET['ctipodoc'] != "0") {
	$vcc = $_GET['cnumdoc'];
	$vtipodoc = $_GET['ctipodoc'];
	$vnombre1 = $_GET['cpnombre'];
	$vapellido1= $_GET['cpapellido'];
	$vapellido2= $_GET['csapellido'];
	$vfechanam = $_GET['cfechanam'];
	$vedad = $_GET['cedad'];
	$vcorreo = $_GET['ccorreo'];
	$vtelefono = $_GET['ctelefono'];
	$vrol = $_GET['crol'];
	include_once ("mcript.php");
	$vcorreo = $encriptar($vcorreo);
	if (!empty($_GET['csnombre'])){
		$vnombre2 = $_GET['csnombre'];
		$inserta = "INSERT INTO usuario (`cc`, `tipo_doc`, `pnombre`,`snombre`, `papellido`,`sapellido`, `fecha_nam`, `edad`, `correo_electronico`, `telefono`, `rol`,`e`) VALUES ('$vcc','$vtipodoc','$vnombre1', '$vnombre2','$vapellido1' ,'$vapellido2','$vfechanam',$vedad,'$vcorreo','$vtelefono','$vrol',1);";
	} else {
		$vnombre2 = "";
		$inserta = "INSERT INTO usuario (`cc`, `tipo_doc`, `pnombre`,`snombre`, `papellido`,`sapellido`, `fecha_nam`, `edad`, `correo_electronico`, `telefono`, `rol`,`e`) VALUES ('$vcc','$vtipodoc','$vnombre1', NULL,'$vapellido1' ,'$vapellido2','$vfechanam',$vedad,'$vcorreo','$vtelefono','$vrol',1);";
	}
	$vtelef = strval($vtelefono);
	if (strlen($vtelef) != 7 & strlen($vtelef) != 10){
		$num = strlen($vtelef);
		$mensaje = "El número telefonico debe contener 7 o 10 digitos ($vtelef)";
		$vcorreo = $desencriptar($vcorreo);
		header("Location: anadirUsuario.php?ecc=$vcc&enombre1=$vnombre1&enombre2=$vnombre2&eapellido1=$vapellido1&eapellido2=$vapellido2&efechanam=$vfechanam&eedad=$vedad&ecorreo=$vcorreo&etelefono=$vtelefono&error=$mensaje");
		die();
	}
	$vtelefono = $telencriptar($vtelefono);
	if (mysqli_query($con,$inserta)){
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Usuario Añadido Exitoso','Inserto los datos del Usuario:$vcc',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarUsuario.php?ccc=$vcc&buscar=");
		die();
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Usuario Añadido Fallido','($vcc,$vtipodoc,$vnombre,$vapellido,$vfechanam,$vedad,$vcorreo,$vtelefono,$vrol,1)',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		$mensaje = "Conflicto con los datos ingresados, por favor verifique que no este ingresando letras en los campos numericos o de fecha, que no se este ingresando un documento o correo electronico existente en el sistema";
		$vcorreo = $desencriptar($vcorreo);
		header("Location: anadirUsuario.php?ecc=$vcc&enombre1=$vnombre1&enombre2=$vnombre2&eapellido1=$vapellido1&eapellido2=$vapellido2&efechanam=$vfechanam&eedad=$vedad&ecorreo=$vcorreo&etelefono=$vtelefono&error=$mensaje");
		die();
}
}
?>
</div>
</div>
</body>
</html>
