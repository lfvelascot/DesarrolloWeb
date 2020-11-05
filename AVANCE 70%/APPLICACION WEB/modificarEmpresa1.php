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
      width: 1606px;
      height: 1008px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 5px;
	top: 77px;
	width: 3px;
	height: 0px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 288px;
	top: 52px;
	width: 1042px;
	height: 366px;
	z-index: 3;
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
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
if (isset($_GET['error'])){
	$m = $_GET['error'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
include_once ("mcript.php");
if(isset($_GET['cempresa'])){
	$emp = $_GET['cempresa'];
	$_SESSION['nitempresa'] = $emp;
	$sql="SELECT * from empresa where nit = $emp AND e = 1;";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
			$nomb = $mostrar['nombre_empresa'];
			$dir = $mostrar['direccion'];
			$em = $mostrar['email'];
			$tel = $mostrar['telefono'];
			$des = $mostrar['descripción_empresa'];
			$tip = $mostrar['tipo_empresa'];
			$ini = $mostrar['inicio_actividad'];
			$fin = $mostrar['fin_actividad'];
			
		}
	}
}
?>
<div id="apDiv1">
<h1 align="center">Modificar Datos Empresa</h1>
<div id="apDiv3">
<h2>Datos Empresa:</h2>
<form>
<table width="1043" height="265" border="0">
  <tr>
    <td><p> NIT:</p></td>
    <td width="525"><input type="text" name="cnit" value= "<?php if (isset($_GET['cempresa'])) { echo $emp;} else { echo ""; }?>" pattern="^[0-9]{0,14}+-[{0-9}]$" autofocus required /></td>
  </tr>
  <tr>
    <td><p>Nombre Empresa:</p></td>
    <td><input type="text" name="cnombre"  value= "<?php if (isset($_GET['cempresa'])) { echo $nomb;} else { echo ""; }?>" autofocus="autofocus" required="required" /></td>
  </tr>
  <tr>
    <td><p>Tipo de empresa:</p></td>
    <td><select name="ctipo">
	<option  value="0">Seleccionar</option>
    <option selected value="<?php if (isset($_GET['cempresa'])) { echo $tip;} else { echo ""; }?>"><?php if (isset($_GET['cempresa'])) { echo $tip;} else { echo ""; }?></option>
    <?php 
		$sql="SELECT * from $bd.tipo_empresa;";
		$result=mysqli_query($con,$sql);
		while($mostrar=mysqli_fetch_array($result)){
		 ?>
	<option value="<?php echo $mostrar['nombre_tipo'] ?>"><?php echo $mostrar['nombre_tipo'] ?></option>
	<?php } ?>
</select></td>
  </tr>
  <tr>
    <td><p>Dirección:</p></td>
    <td><input type="text" name ="cdir" value= "<?php if (isset($_GET['cempresa'])) { echo $dir;} else { echo ""; }?>" autofocus required /></td>
  </tr>
  <tr>
    <td><p>Correo Electrónico:</p></td>
    <td><input type="email" name="cemail" value= "<?php if (isset($_GET['cempresa'])) { $vcorreo = $em;$vcorreo = $desencriptar($vcorreo); echo $vcorreo;} else { echo ""; }?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required /></td>
  </tr>
  <tr>
    <td><p>Teléfono:</p></td>
    <td><input type="tel" name="ctel" value= "<?php if (isset($_GET['cempresa'])) { $vtel = $tel; $vtel =  $teldesencriptar($vtel); echo $vtel;} else { echo ""; }?>" pattern"^[1-9]\d{9}$" required/></td>
  </tr>
  <tr>
    <td><p>Descripción:</p></td>
    <td><textarea name="cdescrip" rows="10" cols="90"><?php if (isset($_GET['cempresa'])) { echo $des;} else { echo "Descripcion de la empresa"; }?></textarea></td>
  </tr>
</table>
<table width="1042" height="137" border="0">
  <tr>
    <td width="118"><p>Inicio de jornada laboral:</p></td>
    <td width="226"><input type="number" value= "<?php if (isset($_GET['cempresa'])) { echo $ini;} else { echo ""; }?>" name="cinicio" required="required"/></td>
    <td width="150"><p> Fin de jornada laboral:</p></td>
    <td width="273"><input type="number" value= "<?php if (isset($_GET['cempresa'])) { echo $fin;} else { echo ""; }?>" name="cfin" required="required"/></td>
  </tr>
  <tr>
</table>
<p align="center"><button type="submit" name="add">Modificar Datos Empresa</button></p>
</form>
<?php
if (isset($_GET['add']) && $_GET['ctipo'] != "0"){
	$vnit = $_GET['cnit'];
	$vnombre = $_GET['cnombre'];
	$vtipo = $_GET['ctipo'];
	$vcorreo = $_GET['cemail'];
	$vdir = $_GET['cdir'];
	$vtelefono = $_GET['ctel'];
	$vdescrip= $_GET['cdescrip'];
	$vinicio= $_GET['cinicio'];
	$vfin= $_GET['cfin'];
	include_once ("mcript.php");
	$vcorreo = $encriptar($vcorreo);
	$vtelefono = $telencriptar($vtelefono);
	$nitemp = $_SESSION['nitempresa'];
	$sql = "UPDATE empresa SET nit = $vnit, nombre_empresa = '$vnombre', direccion = '$vdir',email = '$vcorreo',telefono = '$vtelefono', descripción_empresa = '$vdescrip',tipo_empresa = '$vtipo',inicio_actividad = $vinicio, fin_actividad = $vfin WHERE nit = $nitemp;";
	if (mysqli_query($con,$sql)){
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Empresa Modificada Exitoso','Se modificaron los datos de la empresa: $nitemp',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarEmpresa.php?nit=$nitemp&buscar=");
		die();
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Empresa Modificada Fallido','Se trataron de modificar los datos de la empresa: $nitemp',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		// $mensaje = "Conflicto con los datos ingresados, por favor verifique que no este tratando de crear una empresa con el NIT ingresado que ya se encuentra registrada.";
		$mensaje = $sql;
		header("Location: modificarEmpresa1.php?cempresa=$nitemp&error=$mensaje");
	}
}
?>
</div>
</div>
</body>
</html>
