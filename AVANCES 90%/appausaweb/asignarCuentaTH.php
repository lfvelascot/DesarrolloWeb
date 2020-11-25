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
	left: 213px;
	top: 110px;
	width: 1164px;
	height: 514px;
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
$user_ses = $_SESSION['user'];
?>
<div id="apDiv1">
<div id="apDiv3">

  
</div>
</div>
<div id="apDiv4">
<h1 align="center">Asignar cuenta a Talento Humano</h1></div>
<div id="apDiv6">
<table width="1158" height="306" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr bgcolor="#B1F0FE">
    <td><b>Empleado</b></td>
    <td><b>Descripción Actividad</b></td>
    <td><b>Fecha Envio</b></td>
    <td><b></b></td>
  </tr>
  <tr>
  <?php
		include_once("conexion.php");
  		$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
		mysqli_set_charset($con,"utf8");
		$sql="SELECT * from solicitud_th;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
	?>
    <?php
	$empl = $mostrar['empleado'];
    $sql1="SELECT * from usuario where cc = $empl;";
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
    <td><a href="buscarUsuario.php?ccc=<?php echo $mostrar['empleado'] ?>&buscar"><?php echo $e ?></a></td>
    <td><?php echo $mostrar['funcion']?></td>
    <td><?php echo $mostrar['fecha_env'] ?></td>	
    <td><a class="btn btn-primary" href="asignarCuentaTH1.php?num=<?php  echo $empl;?>?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>Asignar Cuenta</a></td>
  </tr>
    <?php }
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Ver Solicitudes TH','Se Buscaron Todos los Contratos',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
	}
	?>
  </tr>
</table>
</div>
</body>
</html>
