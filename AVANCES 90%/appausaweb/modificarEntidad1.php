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
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
if (isset($_GET['error'])){
	$m = $_GET['error'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
$id = $_GET['nit']; 
$_SESSION['cnit'] = $id;
$sql="SELECT * from entidad WHERE nit = $id AND e = 1;";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result) != 0){
	while($mostrar=mysqli_fetch_array($result)){
		include ("mcript.php");
		$nombre = $mostrar['nombre_entidad'];
		$tipo = $mostrar['tipo'];
		$dir = $mostrar['direccion'];;
		$correo = $mostrar['email'];
		$telefono = $mostrar['telefono'];
		$correo = $desencriptar($correo);
		$telefono = $teldesencriptar($telefono);
	}
}
?>
<div id="apDiv1">
<h1 align="center">Modificar Entidad</h1>

</div>

<div id="apDiv2">
<h2>Datos Entidad</h2>
<form  oninput="range_control_value.value = range_control.valueAsNumber"> 
  <table width="887" height="199" border="0">
      <tr>
      <td><p>NIT. Entidad:</p></td>
      <td><input type="number" name="cnit" value= "<?php if (isset($_GET['nit'])) { echo $_GET['nit'];} else { echo ""; }?>" readonly="readonly" pattern="^[0-9]{0,14}+-[{0-9}]$" autofocus required /></td>
    </tr>
    <tr>
      <td><p>Nombre de la entidad:</p></td>
      <td><input type="text" name="cnombre" value= "<?php if (isset($_GET['nit'])) { echo $nombre;} else { echo ""; }?>" autofocus="autofocus" required="required" /></td>
    </tr>
    <tr>
      <td><p>Tipo:</p></td>
      <td><select name="ctipo">
	<option value="0">Seleccionar</option>
    <option selected value="<?php echo $tipo?>"><?php echo $tipo ?></option>
    <option value="EPS">EPS</option>
    <option value="ARL">ARL</option>
    <option value="CAJA DE COMPENSACIÓN">CAJA DE COMPENSACIÓN</option>
    <option value="FONDO DE PENSIONES">FONDO DE PENSIONES</option>
</select></td>
    </tr>
    <tr>
      <td><p>Teléfono: </p></td>
      <td><input type="tel" name="ctel" value= "<?php if (isset($_GET['nit'])) { echo $telefono;} else { echo ""; }?>" pattern"^[0-9]\d{7,10}$" title="El numero de telefono debe ser de 7 o 10 digitos" required /></td>
    </tr>
    <tr>
      <td><p>Dirección:</p></td>
      <td><input type="text" name ="cdir" value= "<?php if (isset($_GET['nit'])) { echo $dir;} else { echo ""; }?>" autofocus  required /></td>
    </tr>
    <tr>
      <td><p>Correo Electrónico: </p></td>
      <td><input type="email" name="cemail" value= "<?php if (isset($_GET['nit'])) { echo $correo;} else { echo ""; }?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required /></td>
    </tr>
  </table>
<p align="center"><button type="submit" name="add">Modificar Entidad</button></p>
</form>
<?php
if (isset($_GET['add']) && $_GET['ctipo'] != "0"){
	$vnit = $_GET['cnit'];
	$vnombre = $_GET['cnombre'];
	$vtipo = $_GET['ctipo'];
	$vcorreo = $_GET['cemail'];
	$vdir = $_GET['cdir'];
	$vtelefono = $_GET['ctel'];
	if ((strpos($vcorreo, ".com") == false | strpos($vcorreo, ".co") == false)){
		$mensaje = "No se encontro un dominio verificable en el correo electronico ingresado $vcorreo";
		header("Location:modificarEntidad1.php?nit=$vnit&error=$mensaje");
		die();
	}
	$vtelef = strval($vtelefono);
	if (strlen($vtelef) != 7 && (strlen($vtelef) != 10 || $vtelef[0] != '3')){
		$mensaje = "El número telefonico debe contener 7 o 10 digitos, y si es un número celular, debe iniciar por 3 ($vtelef)";
		header("Location:modificarEntidad1.php?nit=$vnit&error=$mensaje");
		die();
	}
	include_once ("mcript.php");
	$vcorreo = $encriptar($vcorreo);
	$vtelefono = $telencriptar($vtelefono);
	$sql = "UPDATE entidad SET nit = '$vnit', nombre_entidad = '$vnombre', tipo = '$vtipo', telefono = '$vtelefono', direccion = '$vdir', email = '$vcorreo' WHERE nit = '$vnit';";
	if (mysqli_query($con,$sql)){
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Entidad Modificada Exitoso','Se modificaron los datos de la Entidad: $vnit',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarEntidad.php?nit=$vnit&buscar=");
		die();
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Entidad Modificada Fallido','Se trataron de modificar los datos de la entidad $vnombre',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		$mensaje = "Conflicto con los datos ingresados, por favor verifique los datos ingresados.";
		header("Location:modificarEntidad1.php?nit=$vnit&error=$mensaje");
	}
}
?>
</div>
</body>
</html>
