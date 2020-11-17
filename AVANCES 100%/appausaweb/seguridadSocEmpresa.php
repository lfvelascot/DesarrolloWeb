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
	width: 1551px;
	height: 747px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 36px;
	top: 142px;
	width: 545px;
	height: 570px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 653px;
	top: 143px;
	width: 574px;
	height: 576px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 1130px;
	top: 74px;
	width: 416px;
	height: 35px;
	z-index: 4;
}
#apDiv5 {
	position: absolute;
	left: 24px;
	top: 4px;
	width: 1480px;
	height: 115px;
	z-index: 5;
}
</style>
<link href="multi/formularios2.css" rel="stylesheet" type="text/css" />
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
$nombre = $_GET['nombre'];
$nit = $_GET['nit'];
if (isset($_GET['m'])){
	$m = $_GET['m'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
?>
<div id="apDiv1">
<div id="apDiv5" align="center">
<h1 align="center">Seguridad Social Empresa</h1>

<table width="1068" border="0">
  <tr>
    <td width="108"><b>NIT. Empresa</b></td>
    <td width="195"><?php echo $nit?></td>
    <td width="140"><b>Nombre Empresa</b></td>
    <td width="358"><?php echo $nombre?></td>
  </tr>
</table>
</div>
<div id="apDiv2">
<h2 align="center">Entidades Contratas</h2>
  <table width="543" height="78" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
    <tr bgcolor="#B1F0FE">
      <td width="102">Entidad</td>
      <td width="58">Tipo</td>
      <td width="106">Inicio Contrato</td>
      <td width="105">Fin Contrato</td>
      <td width="65"></td>
      <td width="83"></td>
    </tr>
    <tr>
        <?php
		$sql = "select * from entidades_contratadas WHERE nit_empresa = $nit AND e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
				$nit_empr = $mostrar['nit_entidad'];
				$sql1 = "SELECT * from entidad where nit = $nit_empr AND e = 1";
				$result1=mysqli_query($con,$sql1);
				if(mysqli_num_rows($result1) != 0){
					while($mostrar1=mysqli_fetch_array($result1)){
						$d1 = $mostrar1['nit'];
						$d2 = $mostrar1['nombre_entidad'];
						$dato = "$d2 (nit. $d1)";
						$tipo = $mostrar1['tipo'];
					}
				}
	?>
      <td><?php echo $dato?></td>
      <td><?php echo $tipo?></td>
      <td><?php echo $mostrar['fecha_inicio']?></td>
      <td><?php echo $mostrar['fecha_fin']?></td>
      <td><a href="modContratoEnti.php?emnit=<?php echo $nit?>&ennit=<?php echo $nit_empr?>">Modificar</a></td>
      <td><a href="eliContratoEnti.php?emnit=<?php echo $nit?>&ennit=<?php echo $nit_empr?>">Eliminar</a></td>
    </tr>
    <?php }}?>
  </table>
</div>
<div id="apDiv3">
<h2 align="center">Entidades Existentes</h2>
  <table width="571" height="96" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
    <tr bgcolor="#B1F0FE">
      <td>NIT</td>
      <td>Nombre Entidad</td>
      <td>Tipo</td>
      <td>Telefono</td>
      <td>Direccion</td>
      <td>Email</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
    <?php
		$sql = " select * from entidad WHERE e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
				include ("mcript.php");
	?>
      <td><?php echo $mostrar['nit']?></td>
      <td><?php echo $mostrar['nombre_entidad']?></td>
      <td><?php echo $mostrar['tipo']?></td>
      <td><?php echo $mostrar['telefono']?></td>
      <td><?php echo $mostrar['direccion']?>;</td>
      <td><?php $em = $desencriptar($mostrar['email']); echo $em; ?></td>
      <td><a href="contratarEntidad.php?emnit=<?php echo $nit?>&ennit=<?php echo $mostrar['nit']?>">Contratar</a></td>
    </tr>
    <?php }
	}
	  		include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Seguridad Social Vista','Se buscaron las entidades contratas en por parte de la empresa $nombre para la Seguridad social de sus empleados',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
	?>
  </table>
</div>
<div id="apDiv4" align="center" style="z-index:15">
<button style="z-index:20" onclick="location= ' buscarEmpresa.php?nit=<?php echo $nit?>&buscar='">Finalizar</button>
</div>
</div>
</body>
</html>