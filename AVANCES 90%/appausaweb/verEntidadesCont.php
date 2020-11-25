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
	left: 318px;
	top: 136px;
	width: 1043px;
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
	left: 305px;
	top: 5px;
	width: 1040px;
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
  $empresa_ses = $_SESSION['empresa'];
  $con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
  mysqli_set_charset($con,"utf8");
  ?>
<div id="apDiv1">
<div id="apDiv5" align="center">
<h1 align="center">Seguridad Social Empresa</h1>

<table width="1068" border="0">
  <tr>
    <td width="108"><b>NIT. Empresa</b></td>
    <td width="195"><?php echo $empresa_ses?></td>
    <?php 
	$sql = "SELECT nombre_empresa FROM empresa WHERE nit = '$empresa_ses' AND e = 1;";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result) != 0){
		while($mostrar1=mysqli_fetch_array($result)){
			$nombre = $mostrar1['nombre_empresa'];
		}
	}
	?>
    <td width="140"><b>Nombre Empresa</b></td>
    <td width="358"><?php echo $nombre?></td>
  </tr>
</table>
</div>
<div id="apDiv2">
<h2 align="center">Entidades Contratas</h2>
  <table width="1037" height="79" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
    <tr bgcolor="#B1F0FE">
      					<td><b>NIT entidad</b></td>
      					<td><b>Nombre Entidad</b></td>
                        <td><b>Tipo Entidad</b></td>
                        <td><b>Telefono</b></td>
                        <td><b>Correo de contacto</b></td>
                        <td><b>Direcciòn</b></td>
                        <td><b>Fecha Inicio Contrato</b></td>
                        <td><b>Fecha Fin Contrato</b></td>
    </tr>
    <tr>
        <?php
		$sql = "select * from entidades_contratadas WHERE nit_empresa = $empresa_ses AND e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
				$nit_empr = $mostrar['nit_entidad'];
				$sql1 = "SELECT * from entidad where nit = $nit_empr AND e = 1";
				$result1=mysqli_query($con,$sql1);
				if(mysqli_num_rows($result1) != 0){
					while($mostrar1=mysqli_fetch_array($result1)){
						?>
      					<td><?php echo $mostrar1['nit']?></td>
      					<td><?php echo $mostrar1['nombre_entidad']?></td>
                        <td><?php echo $mostrar1['tipo']?></td>
                        <td><?php include_once('mcript.php');$t =  $mostrar1['telefono'];$t = $teldesencriptar($t); echo $t?></td>
                        <td><?php include_once('mcript.php');$t =  $mostrar1['email'];$t = $desencriptar($t); echo $t?></td>
                        <td><?php echo $mostrar1['direccion']?></td>
                        <?php
					}
				}
	?>

      <td><?php echo $mostrar['fecha_inicio']?></td>
      <td><?php echo $mostrar['fecha_fin']?></td>
    </tr>
    <?php }}
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Entidades Contratadas Vistas','Se vieron las entidades contratadas de la empresa $nombre',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
	?>
  </table>
</div>
</div>
</body>
</html>