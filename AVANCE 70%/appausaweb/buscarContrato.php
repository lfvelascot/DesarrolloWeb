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
	width: 1564px;
	height: 701px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 3px;
	top: 52px;
	width: 859px;
	height: 42px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 174px;
	top: 99px;
	width: 1252px;
	height: 543px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 109px;
	top: 22px;
	width: 1360px;
	height: 48px;
	z-index: 4;
}
</style>
<link href="multi/formularios2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv5 {
	position: absolute;
	left: 220px;
	top: 113px;
	width: 1158px;
	height: 141px;
	z-index: 5;
}
#apDiv6 {
	position: absolute;
	left: 219px;
	top: 297px;
	width: 1164px;
	height: 279px;
	z-index: 6;
}
</style>
</head>

<body>
<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: enblanco.html");
}
$rol_ses = $_SESSION['rol']; 
if ($rol_ses == 'TALENTO HUMANO'){
	$empresa_ses = $_SESSION['empresa'];
} 
$user_ses = $_SESSION['user'];
?>
<div id="apDiv1">
<div id="apDiv3">

  
</div>
</div>
<div id="apDiv4">
<h1 align="center">Buscar Contrato</h1></div>
<div id="apDiv5">
<form>
	<table width="1160" border=0 >
    <tr>
    <td width="549">Ingrese el Número de Contrato a Buscar: </td>
    <td width="799"><input type="number" name="ccontrato" /> </td>
    </tr>
    <?php if ($rol_ses == "ADMINISTRADOR") { ?>
    <tr >
    <td width="549" bgcolor="#FFFFFF">Ingrese el NIT de la Empresa: </td>
    <td width="799" bgcolor="#FFFFFF"><input type="number" name="cempresa" /> </td>
    </tr>
    <?php }?>
    </table>
    <p align="center"><button type="submit" name="buscar">Buscar Contrato</button> </p>
</form>
</div>
<div id="apDiv6">
<table width="1158" height="210" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr bgcolor="#B1F0FE">
    <td height="84"><b>Num. Contrato</b></td>
    <td><b>Empleado</b></td>
    <td><b>Empresa</b></td>
    <td><b>Tipo Contrato</b></td>
    <td><b>Cargo</b></td>
    <td><b>Fecha Inicio</b></td>
    <td><b>Fecha Fin</b></td>
    <td><b>Sueldo ($)</b></td>
    <td width="100" align="justify" ><b>Funciones</b></p></td>
    <td><b>EPS</b></td>
    <td><b>ARL</b></td>
    <td><b>Caja Compensación</b></td>
    <td><b>Fondo de Pensiones</b></td>
    <?php if ($rol_ses == "ADMINISTRADOR") { ?>
    <td><b>Opcion</b></td>
    <td><b>Opcion</b></td>
    <?php }?>
  </tr>
  <tr>
  <?php
	if (!isset($_SESSION['user'])) {
 		header("Location: enblanco.html");
	}
	$rol_ses = $_SESSION['rol']; 
	if ($rol_ses == 'TALENTO HUMANO'){
		$empresa_ses = $_SESSION['empresa'];
	} 
	$user_ses = $_SESSION['user'];
	if (isset($_GET['buscar'])) {
		include_once("conexion.php");
 		$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
		mysqli_set_charset($con,"utf8");
		$contrato = $_GET['ccontrato']; 
		if ($rol_ses == "ADMINISTRADOR") {
			$empresa = $_GET['cempresa']; 
		} else {
			$empresa = $empresa_ses; 
		}
		$sql="SELECT * from contrato where num_contrato = $contrato AND empresa = '$empresa' AND e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
			if (is_null($mostrar['fecha_fin'])){
				$fechafin = "Sin definir";
			} else {
				$fechafin = $mostrar['fecha_fin'];
			}
	?>
    <td><?php echo $mostrar['num_contrato'] ?></td>
    <?php
	$empl = $mostrar['empleado'];
    $sql1="SELECT pnombre,snombre,papellido,sapellido from usuario where cc = $empl AND e = 1;";
	$result1=mysqli_query($con,$sql1);
	while($mostrar1=mysqli_fetch_array($result1)){
		$pnombre = $mostrar1['pnombre'];
		if (!empty($mostrar1['snombre'])){
			$snombre = $mostrar1['snombre'];
		} else {
			$snombre = "";
		}
		$papellido = $mostrar1['papellido'];
		$sapellido = $mostrar1['sapellido'];
	}
	$e = "$pnombre $snombre $papellido $sapellido";	
	?>	
    <td><a href="buscarEmpleado.php?ccc=<?php echo $mostrar['empleado'] ?>&buscar"><?php echo $e ?></a></td>
    <?php
	$emp = $mostrar['empresa'];
    $sql1="SELECT nombre_empresa from empresa where nit = '$emp' AND e = 1;";
	$result2=mysqli_query($con,$sql1);
	while($mostrar2=mysqli_fetch_array($result2)){?>
		<td><a href="buscarEmpresa.php?cempresa=<?php echo $mostrar['empresa'] ?>&buscar"><?php echo $mostrar2['nombre_empresa']?></a></td>
	<?php }	?>	
    <td><?php echo $mostrar['tipo_contrato']?></td>
    <td><?php echo $mostrar['cargo'] ?></td>
    <td><?php echo $mostrar['fecha_inicio'] ?></td>
    <td><?php echo $fechafin ?></td>
    <td><?php echo $mostrar['sueldo'] ?></td>
    <td align="justify"><p><?php echo $mostrar['funciones'] ?></p></td>
    <?php
	$entidad = $mostrar['eps'];
    $sql1="SELECT nombre_entidad from entidad where nit = $entidad AND e = 1;";
	$result3=mysqli_query($con,$sql1);
	while($mostrar3=mysqli_fetch_array($result3)){ ?>
		<td><a href="buscarEntidad.php?id=<?php echo $mostrar['eps'];?>$buscar"><?php echo $mostrar3['nombre_entidad'];?></a></td>
	<?php } ?>		
    
    <?php
	$entidad = $mostrar['arl'];
    $sql1="SELECT nombre_entidad from entidad where nit = $entidad AND e = 1;";
	$result4=mysqli_query($con,$sql1);
	while($mostrar4=mysqli_fetch_array($result4)){?>
		<td><a href="buscarEntidad.php?id=<?php echo $mostrar['arl'];?>$buscar"><?php echo $mostrar4['nombre_entidad'];?></a></td>
	<?php }?>		
    <?php
	$entidad = $mostrar['caja_compensación'];
    $sql1="SELECT nombre_entidad from entidad where nit = $entidad AND e = 1;";
	$result5=mysqli_query($con,$sql1);
	while($mostrar5=mysqli_fetch_array($result5)){?>
		<td><a href="buscarEntidad.php?id=<?php echo $mostrar['caja_compensación'];?>$buscar"><?php echo $mostrar5['nombre_entidad'];?></a></td>
	<?php } ?>	
    <?php
	$entidad = $mostrar['fondo_pensiones'];
    $sql1="SELECT nombre_entidad from entidad where nit = $entidad AND e = 1;";
	$result6=mysqli_query($con,$sql1);
	while($mostrar6=mysqli_fetch_array($result6)){ ?>
			<td><a href="buscarEntidad.php?id=<?php echo $mostrar['fondo_pensiones'];?>$buscar"><?php echo $mostrar6['nombre_entidad'];?></a></td>
	<?php }?>	
    <?php if ($rol_ses == "ADMINISTRADOR") { ?>	
    <td><a class="btn btn-primary" href="eliminarContrato1.php?num=<?php echo $mostrar['num_contrato'];?>&empresa=<?php echo $mostrar['empresa'];?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>Eliminar</a></td>
    <td><a class="btn btn-primary"  href="modificarContrato1.php?num=<?php echo $mostrar['num_contrato'];?>&empresa=<?php echo $mostrar['empresa'];?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>Modificar</a></td>
    <?php }?>
  </tr>
    <?php }
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Buscado','Se Buscaron los datos del Contrato:$contrato de la Empresa:$empresa',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
	}}
	?>
  </tr>
</table>
</div>
</body>
</html>
