<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1606px;
	height: 769px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 147px;
	top: 69px;
	width: 1328px;
	height: 35px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 953px;
	top: 133px;
	width: 525px;
	height: 550px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 146px;
	top: 136px;
	width: 525px;
	height: 553px;
	z-index: 3;
}
#apDiv5 {
	position: absolute;
	left: 252px;
	top: 697px;
	width: 1129px;
	height: 44px;
	z-index: 4;
}
</style>
<link href="multi/formularios2.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv6 {
	position: absolute;
	left: 632px;
	top: 365px;
	width: 354px;
	height: 78px;
	z-index: 5;
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
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
if (isset($_GET['submit'])){
	$nombre = $_GET['perfil'];
	$descrip = $_GET['descrip'];
	$rolasos = $_GET['rol'];
}
?>
<div id="apDiv6" align="center">
<button onclick="location= ' buscarPerfil.php?perfil=<?php echo $nombre?>&add='">Finalizar</button>
</div>
<div id="apDiv1">
<h1 align="center">Asignar Actividades</h1> 
<div id="apDiv4" align="center">
<h2>Actividades Asignadas</h2>
<table width="509" height="106" border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
  <tr align="center" bgcolor="#B1F0FE">
    <td>Actividad</td>
    <td>Elemento</td>
    <td>Opción</td>
  </tr>
  <tr>
  <?php
  	$sql="SELECT DISTINCT actividad.nombre AS nombre, actividad.elemento AS elemento from actividad,gestion_actividad  WHERE gestion_actividad.perfil = '$nombre' AND actividad.nombre = gestion_actividad.actividad ORDER BY `elemento`  ASC;";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
		
  ?>
    <td><?php echo $mostrar['nombre']?></td>
    <td><?php echo $mostrar['elemento']?></td>
    <td><a href="asignarActividades1.php?actividad=<?php echo $mostrar['nombre']?>&perfil=<?php echo $nombre?>&descrip=<?php echo $descrip ?>&rol=<?php echo $rolasos?>&desasignar=">Eliminar</a></td>
  </tr>
  <?php } }?>
</table>
<p>&nbsp;</p>
</div>
</div>
<div id="apDiv2" align="center">
<p><b>Nombre del perfil: </b><?php echo $nombre?> - <b>Descripción: </b><?php echo $descrip?> <b>Rol asociado: </b><?php echo $rolasos?></p>
</div>
<div id="apDiv3" align="center">
<h2>Actividades para Asignar</h2>
<table width="509" height="106" border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
  <tr align="center" bgcolor="#B1F0FE">
    <td>Actividad</td>
    <td>Elemento</td>
    <td>Opción</td>
  </tr>
  <tr>
  <?php
  	$sql="SELECT DISTINCT actividad.nombre AS nombre, actividad.elemento as elemento 
FROM actividad,gestion_elemento 
WHERE gestion_elemento.rol = '$rolasos'
AND actividad.elemento = gestion_elemento.elemento
ORDER BY `elemento`  ASC;";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
		
  ?>
    <td><?php echo $mostrar['nombre']?></td>
    <td><?php echo $mostrar['elemento']?></td>
    <td><a href="asignarActividades1.php?actividad=<?php echo $mostrar['nombre']?>&perfil=<?php echo $nombre?>&descrip=<?php echo $descrip ?>&rol=<?php echo $rolasos?>&asignar=">Asignar</a></td>
  </tr>
  <?php } }?>
</table>

</div>

</body>
</html>