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
	left: 162px;
	top: 60px;
	width: 1244px;
	height: 42px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 163px;
	top: 87px;
	width: 1230px;
	height: 398px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 4px;
	top: 1px;
	width: 1289px;
	height: 48px;
	z-index: 4;
}
</style>
<link href="multi/formularios2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="apDiv1">
  <div id="apDiv3">
  <table width="1227" height="178" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr bgcolor="#B1F0FE">
    <td width="117" height="84"><b>NIT</b></td>
    <td width="163"><b>Nombre Empresa</b></td>
    <td width="113"><b>Tipo Empresa</b></td>
    <td width="103"><b>Direccion</b></td>
    <td width="200"><b>Correo Electronico</b></td>
    <td width="67"><b>Telefono</b></td>
    <td width="143"><b>Descripción</b></td>
    <td width="86"><b>Empleados</b></td>
    <td width="86"><b>Inicio Jornada Laboral</b></td>
    <td width="86"><b>Fin Jornada Laboral</b></td>
    <td width="86"><b></b></td>
    <td width="86"><b></b></td>
    <td width="86"><b></b></td>
  </tr>
  <tr>
  <?php 
		include_once("conexion.php");
		include_once("mcript.php");
  		$con=mysqli_connect($desencriptar($host),$desencriptar($usuario),$desencriptar($clave),$desencriptar($bd)) or die('Fallo la conexion');
		mysqli_set_charset($con,"utf8");
		$sql="SELECT * from empresa WHERE e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
				include ("mcript.php");
				$correo = $mostrar['email'];
				$telefono = $mostrar['telefono'];
				$correo = $desencriptar($correo);
				$telefono = $teldesencriptar($telefono);
  ?>
    <td height="92"><?php echo $mostrar['nit']?></td>
    <td><?php echo $mostrar['nombre_empresa']?></td>
    <td><?php echo $mostrar['tipo_empresa']?></td>
    <td><?php echo $mostrar['direccion']?></td>
    <td><?php echo $correo?></td>
    <td><?php echo $telefono?></td>
    <td><?php echo $mostrar['descripción_empresa']?></td>
    <td><?php echo $mostrar['num_empleados']?></td>
    <td><?php echo $mostrar['inicio_actividad']?></td>
    <td><?php echo $mostrar['fin_actividad']?></td>
    <td><a href="buscarContratosEmp.php?cempresa=<?php echo $mostrar['nit']?>&buscar">Ver Contratos</a></td>
    <td><a href="seguridadSocEmpresa.php?cempresa=<?php echo $mostrar['nit']?>">Seguridad Social</a></td>
    <td><a href="eliminarEmpresa1.php?cempresa=<?php echo $mostrar['nit']?>">Eliminar</a></td>
  </tr>
  <?php } }  ?>
</table>

</div>
  <h1 align="center">Eliminar Empresa</h1>
</div>

</body>
</html>
