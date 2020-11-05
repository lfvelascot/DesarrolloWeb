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
	left: 171px;
	top: 161px;
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
<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: enblanco.html");
}
$user_ses = $_SESSION['user'];
?>
<div id="apDiv1">
<div  align="center" id="apDiv2">
<form> <p>&nbsp; </p>
  <p>Ingrese el NIT de la Empresa a buscar&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="45" name="nit"> <button type="submit" name="buscar">Buscar</button>
  </p>
</form>
</div>
<div id="apDiv3">
<table width="1227" height="208" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr bgcolor="#B1F0FE">
    <td width="117" height="84"><b>NIT</b></td>
    <td width="163"><b>Nombre Empresa</b></td>
    <td width="113"><b>Tipo Empresa</b></td>
    <td width="103"><b>Direccion</b></td>
    <td width="200"><b>Correo Electronico</b></td>
    <td width="67"><b>Telefono</b></td>
    <td width="143"><b>Descripción</b></td>
    <td width="86"><b>Num Empleados</b></td>
    <td width="86"><b>Contratos</b></td>
    <td width="86"><b>Inicio Jornada Laboral</b></td>
    <td width="86"><b>Fin Jornada Laboral</b></td>
    <td width="86"><b></b></td>
    <td width="86"><b></b></td>
    <td width="86"><b></b></td>
  </tr>
  <tr>
  <?php 
  if (isset($_GET['buscar']) & !empty($_GET['nit'])) {
		include_once("conexion.php");
		$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
		mysqli_set_charset($con,"utf8");
		$id = $_GET['nit']; 
		$sql="SELECT * from empresa WHERE nit = $id AND e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
				include ("mcript.php");
				$correo = $mostrar['email'];
				$telefono = $mostrar['telefono'];
				$correo = $desencriptar($correo);
				$telefono = $teldesencriptar($telefono);
  ?>
    <td><?php echo $mostrar['nit']?></td>
    <td><?php echo $mostrar['nombre_empresa']?></td>
    <td><?php echo $mostrar['tipo_empresa']?></td>
    <td><?php echo $mostrar['direccion']?></td>
    <td><?php echo $correo?></td>
    <td><?php echo $telefono?></td>
    <td><?php echo $mostrar['descripción_empresa']?></td>
    <td><?php echo $mostrar['num_empleados']?></td>
    <td><a href="buscarContratosEmp.php?cempresa=<?php echo $mostrar['nit']?>&buscar">Ver Contratos</a></td>
    <td><?php echo $mostrar['inicio_actividad']?></td>
    <td><?php echo $mostrar['fin_actividad']?></td>
    <td><a href="seguridadSocEmpresa.php?nit=<?php echo $mostrar['nit']?>&nombre=<?php echo $mostrar['nombre_empresa']?>">Seguridad Social</a></td>
    <td><a href="eliminarEmpresa1.php?cempresa=<?php echo $mostrar['nit']?>">Eliminar</a></td>
    <td><a href="modificarEmpresa1.php?cempresa=<?php echo $mostrar['nit']?>">Modificar</a></td>
  </tr>
  <?php } } 
  			include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Empresa Buscada','Se Buscaron los datos de la empresa:$id',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
  } ?>
</table>

</div>
  <h1 align="center">Buscar Empresa</h1>
</div>

</body>
</html>
