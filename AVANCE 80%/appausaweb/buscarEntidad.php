<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: -1px;
	top: -5px;
      width: 1606px;
      height: 1008px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 357px;
	top: 104px;
	width: 859px;
	height: 42px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 176px;
	top: 209px;
	width: 1280px;
	height: 415px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 11px;
	top: 4px;
	width: 1584px;
	height: 48px;
	z-index: 4;
}
</style>
<link href="multi/formularios2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: enblanco.html");
}
$user_ses = $_SESSION['user'];
?>
<div id="apDiv1">
<div id="apDiv2">
<form> <p>&nbsp; </p>
  <p>Ingrese el nombre de la Entidad a buscar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="45" name="nit"> <button type="submit" name="buscar" value>Buscar</button>
  </p>
</form>
</div>
<div id="apDiv3">
<table width="1280" height="162" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr bgcolor="#B1F0FE">
  	<td height="70"><b>nit</b></td>
    <td><b>Nombre</b></td>
    <td><b>Tipo</b></td>
    <td><b>Telefono</b></td>
    <td><b>Direccion</b></td>
    <td><b>Correo Electronico</b></td>
	<td><b></b></td>
    <td><b></b></td>
  </tr>
  <tr>
  <?php 
  if (isset($_GET['buscar']) & !empty($_GET['nit'])) {
		include_once("administrador/conexion.php");
	  	$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
		mysqli_set_charset($con,"utf8");
		$id = $_GET['nit']; 
		$sql="SELECT * from entidad WHERE nit = $id AND e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
				include ("mcript.php");
				$correo = $mostrar['email'];
				$telefono = $mostrar['telefono'];
				$correo = $desencriptar($correo);
				$telefono = $teldesencriptar($telefono);
     ?>
  	<td height="92"><?php echo $mostrar['nit'];?></td>
    <td><?php echo $mostrar['nombre_entidad'];?></td>
    <td><?php echo $mostrar['tipo'];?></td>
    <td><?php echo $telefono;?></td>
    <td><?php echo $mostrar['direccion']?></td>
    <td><?php echo $correo?></td>
    <td><a href="eliminarEntidad1.php?nit=<?php echo $mostrar['nit']?>">Eliminar</a></td>
	<td><a href="modificarEntidad1.php?nit=<?php echo $mostrar['nit']?>">Modificar</a></td>
  </tr>
  <?php }}
  	include_once("date.php");
	$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Empresa Buscada','Se Buscaron los datos de la empresa:$id',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
  }?>
</table>

</div>
<div id="apDiv4">
  <h1 align="center">Buscar Entidad</h1></div>
</div>

</body>
</html>
