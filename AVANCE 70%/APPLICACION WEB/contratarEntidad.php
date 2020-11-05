<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: -22px;
	top: 1px;
	width: 1513px;
	height: 1062px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 203px;
	top: 75px;
	width: 1068px;
	height: 620px;
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
$nit_empresa = $_GET['emnit'];
$nit_entidad = $_GET['ennit'];
$sql = "SELECT * FROM entidades_contratadas WHERE nit_empresa = $nit_empresa AND nit_entidad = $nit_entidad AND e = 1;";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result) != 0){
	include_once("date.php");
	$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Entidad Fallido','Ya trato de crear un contrato ya existente entre la entidad $nit_entidad y la empresa $nit_empresa',1);";
	mysqli_query($con,$inserta);
	mysqli_close($con);
	$m = "Ya existe un contrato entre la Entidad $nit_entidad y la empresa $nit_empresa";
	header("Location: seguridadSocEmpresa.php?nit=$nit_empresa&nombre=$nemp&m=$m");
	die();
}
if (isset($_GET['error'])){
	$m = $_GET['error'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
?>
<div id="apDiv1">
<h1 align="center">Nuevo Contrato (Empresa: <?php  echo $nit_empresa?> - Entidad: <?php echo $nit_entidad?>)</h1>

</div>
<div id="apDiv2">
<h2>Datos Empresa</h2>
<?php
$sql = " select * from empresa WHERE nit = $nit_empresa AND e = 1;";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result) != 0){
	while($mostrar=mysqli_fetch_array($result)){
?>
  <table width="850" height="221" border="0">
    <tr>
      <td width="230"><b>NIT. Empresa Contratante</b></td>
      <td width="604"><?php echo $mostrar['nit']?></td>
    </tr>
    <tr>
      <td><b>Nombre Empresa:</b></td>
      <td><?php $nemp = $mostrar['nombre_empresa'];  echo $mostrar['nombre_empresa'];?></td>
    </tr>
    <tr>
      <td><b>Descripción:</b></td>
      <td><?php echo $mostrar['descripción_empresa']?></td>
    </tr>
    <tr>
      <td><b>Tipo Empresa:</b></td>
      <td><?php echo $mostrar['tipo_empresa']?></td>
    </tr>
    <tr>
      <td>Num. Empleados:</td>
      <td><?php echo $mostrar['num_empleados']?></td>
    </tr>
  </table>
<h2>Datos Entidad</h2>
<?php
	}
}
$sql = " select * from entidad WHERE nit = $nit_entidad AND e = 1;";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result) != 0){
	while($mostrar=mysqli_fetch_array($result)){
?>
  <table width="851" height="136" border="0">
    <tr>
      <td width="227"><b>Nit. Entidad</b></td>
      <td width="607"><?php echo $mostrar['nit']?></td>
    </tr>
    <tr>
      <td><b>Nombre Entidad:</b></td>
      <td><?php $nent = $mostrar['nombre_entidad']; echo $mostrar['nombre_entidad']?></td>
    </tr>
    <tr>
      <td><b>Tipo Entidad:</b></td>
      <td><?php echo $mostrar['tipo']?></td>
    </tr>
  </table>
  <?php
	}
}
  ?>
  <form>
    <table width="850" height="65" border="0">
    <tr>
        <td><b>NIT. Empresa Contratante:</b></td>
        <td><input type="number" name="cnitempresa" value="<?php echo $nit_empresa?>" readonly="readonly" autofocus required /></td>
      </tr>
     <tr>
     <tr>
        <td><b>Nombre Empresa Contratante:</b></td>
        <td><input type="text" name="cnempresa" value="<?php echo $nemp?>" readonly="readonly" autofocus required /></td>
      </tr>
     <tr>
        <td><b>NIT. Entidad:</b></td>
        <td><input type="number" name="cnitentidad" value="<?php echo $nit_entidad?>" readonly="readonly" autofocus required /></td>
      </tr>
      <tr>
      <tr>
        <td><b>Nombre Empresa Contratante:</b></td>
        <td><input type="text" name="cnempresa" value="<?php echo $nent?>" readonly="readonly" autofocus required /></td>
      </tr>
     <tr>
        <td><b>Fecha Inicio:</b></td>
        <td><input type="date" name="cfechainin" autofocus required /></td>
      </tr>
      <tr>
        <td><b>Fecha Fin:</b></td>
        <td><input type="date" name="cfechafin" autofocus required /></td>
      </tr>
    </table>
 <p align="center"><button type="submit" name="add">Registrar Contrato</button></p>
 <?php
 if (isset($_GET['add'])){
	 $nit_empresa = $_GET['cnitempresa'];
	 $nit_entidad = $_GET['cnitentidad'];
	 $nemp = $_GET['cnempresa'];
	 $vfechaini = $_GET['cfechainin'];
	 $vfechafin = $_GET['cfechafin'];
	 $d1 = new DateTime($vfechaini);
	 $d2 = new DateTime($vfechafin);
	 if ($d1 < $d2){
		 $sql = "INSERT INTO entidades_contratadas VALUES ($nit_empresa,$nit_entidad,'$vfechaini','$vfechaini',1);";
		 if (mysqli_query($con,$sql)){
			include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Entidad Exitoso','Se creo un contrato entre la entidad $nit_entidad y la empresa $nit_empresa de forma exitosa',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
			header("Location: seguridadSocEmpresa.php?nit=$nit_empresa&nombre=$nemp");
			die();
		} 
	 } else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Entidad Fallido','Se trato de crear un contrato entre la entidad $nit_entidad y la empresa $nit_empresa',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		$mensaje = "Las fechas ingresadas no concuerdad: la fecha de inicio debe ser menor a la fecha de fin del contrato";
		header("Location: contratarEntidad.php?emnit=$nit_empresa&ennit=$nit_entidad&error=$mensaje");
		die();
	 }
 }
 ?>
  </form>
</div>
</body>
</html>