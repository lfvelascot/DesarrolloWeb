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
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
if (isset($_GET['error'])){
	$m = $_GET['error'];
	$vnombre = $_GET['enombre'];
	$vdescrip = $_GET['edescrip'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
?>
<body>
<div id="apDiv1">
<h1 align="center">Añadir Nuevo Perfil</h1>
<div id="apDiv2">
<h2>Datos del Usuario</h2>
<form>
<table width="1114" height="274" border="0">
  <tr>
    <td><p>Nombre Perfil: </p></td>
    <td><input type="text" name="cnombre" value="<?php if (isset($_GET['error'])) {echo $vnombre;} else {echo "";}?>" autofocus required /></td>
  </tr>
  <tr>
    <td><p>De Una breve descripción del perfil: </p></td>
    <td><input type="text" name="cdescrip" value="<?php if (isset($_GET['error'])) {echo $vdescrip;} else {echo "";}?>" autofocus required /></td>
  </tr>
    <td><p>Rol asociado:</p></td>
    <td><select name="crol">
	<option selected value="0">Seleccionar</option>
    <?php 
		$sql="SELECT * from $bd.rol WHERE nombre != 'SUPER' AND nombre != 'EMPLEADO';";
		$result=mysqli_query($con,$sql);
		while($mostrar=mysqli_fetch_array($result)){
		 ?>
	<option value="<?php echo $mostrar['nombre'] ?>"><?php echo $mostrar['nombre'] ?></option>
	<?php } ?>
</select></td>
  </tr>
</table>
<p align="center"><button type="submit" name="add">Crear Perfil</button>
</form>
<?php
if (isset($_GET['add'])) {
	$nombre = $_GET['cnombre'];
	$descrip = $_GET['cdescrip'];
	$vrol = $_GET['crol'];
	$inserta = "INSERT INTO $bd.perfil VALUES('$nombre','$descrip','$vrol',1);";
	if (mysqli_query($con,$inserta)){
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Perfil Añadido Exitoso','Inserto los datos del Perfil:$nombre',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: asignarActividades.php?perfil=$nombre&descrip=$descrip&rol=$vrol&submit=");
		die();
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Perfil Añadido Fallido','Se trato de añadir los datos del perfil: $nombre',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		$mensaje = "Conflicto con los datos ingresados";
		header("Location: anadirPerfil.php?enombre=$vnombre&edescrip=$descrip&error=$mensaje");
		die();
}
}

?>
</div>
</div>
</body>
</html>
