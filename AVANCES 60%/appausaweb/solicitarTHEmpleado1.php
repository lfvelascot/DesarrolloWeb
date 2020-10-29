<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1313px;
	height: 670px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 49px;
	top: 5px;
	width: 1151px;
	height: 650px;
	z-index: 2;
}
</style>
</head>

<body>
<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
$empresa_ses = $_SESSION['empresa'];
$id=$_GET['id'];
?>
<div id="apDiv1">
<div id="apDiv2"> <h1 align="center">Solicitar Cuenta Para Talento Humano</h1></div>
<form>
<table width="1114" height="274" border="0">
  <tr>
    <td width="243"><p>Documento Empleado: </p></td>
    <td width="325"><input type="text" name="cnumdoc" value="<?php echo $id?>" pattern="^((\d{8})|(\d{10})|(\d{11})|(\d{6}-\d{5}))?$" required="required" /></td>
  </tr>
  <tr>
    <td><p>Describa las funciones para poder asignarle un perfil al empleado: </p></td>
      <td><textarea name="cfunciones" rows="5" cols="100" required="required"></textarea></td>
  </tr>
</table>
<p align="center">
  <button type="submit" name="add">Enviar Solicitud</button></p>
</form>
<?php
include_once("conexion.php");
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
if (isset($_GET['add'])){
	  $vnumdoc = $_GET['cnumdoc'];
      $funciones = $_GET['cfunciones'];
	  include_once("date.php");
	  $inserta = "INSERT INTO $bd.solicitud_th VALUES('$vnumdoc','$funciones','$d');";
	if (mysqli_query($con,$inserta)){
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Empleado Añadido Exitoso','Inserto los datos del Empleado:$vcc');";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: solicitarTHEmpleado.php");
		die();
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Empleado Añadido Fallido','Conflico con los datos del Empleado($vcc, $vtipodoc, $vnombre, $vapellido, $vfechanam, $vedad, $vcorreo, $vtelefono, $vrol)');";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: solicitarTHEmpleado.php?id=$vnumdoc");
		die();
}
}
?>
</div>

</body>
</html>
