<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: -4px;
	top: 0px;
	width: 1606px;
	height: 720px;

	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 237px;
	top: 74px;
	width: 1169px;
	height: 42px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 235px;
	top: 189px;
	width: 1180px;
	height: 456px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 7px;
	top: -1px;
	width: 1596px;
	height: 48px;
	z-index: 4;
}
</style>
<link href="multi/formularios2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include_once("administrador/conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
include_once("mcript.php");
$con=mysqli_connect($desencriptar($host),$desencriptar($usuario),$desencriptar($clave),$desencriptar($bd)) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
?>
<div id="apDiv1">
  <div id="apDiv2">
    <form>
      <p>&nbsp; </p>
      <p>Ingrese el nombre del Perfil a buscar:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name ="perfil" />
        <button type="submit" name = "add">Buscar</button>
      </p>
    </form>
   </div>
  <div id="apDiv3">
    <table width="1179" height="306" border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
      <tr bgcolor="#B1F0FE">
        <td><b>Nombre</b></td>
        <td><b>Descripción</b></td>
        <td><b>Rol Asociado</b></td>
        <td><b>Actividades</b></td>
    	<td width="86"><b></b>Opción</td>
    	<td width="86"><b>Opción</b></td>
        <td width="86"><b>Opción</b></td>
      </tr>
      <tr>
      <?php
	if (isset($_GET['add'])) {
		include_once("conexion.php");
		include_once("mcript.php");
 		$con=mysqli_connect($desencriptar($host),$desencriptar($usuario),$desencriptar($clave),$desencriptar($bd)) or die('Fallo la conexion');
		mysqli_set_charset($con,"utf8");
		$id = $_GET['perfil']; 
		$sql="SELECT * from perfil where nombre = '$id' AND e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
			$sql1="SELECT actividad from gestion_actividad where perfil = '$id' AND e = 1;";
			$result1=mysqli_query($con,$sql1);
			$actividad = "";
			if(mysqli_num_rows($result1) != 0){
				while($mostrar1=mysqli_fetch_array($result1)){
					$x = $mostrar1['actividad'];
					$actividad = "$actividad - $x";
				}
			}
		?> 
        <td><?php echo $mostrar['nombre']?></td>
        <td><?php echo $mostrar['descrpción']?></td>
        <td><?php echo $mostrar['rol_asociado']?></td>
        <td><?php echo $actividad ?></td>
		<td><a href="modificarPerfil1.php?perfil=<?php echo $mostrar['nombre']?>&descrip=<?php echo $mostrar['descrpción']?>&rol=<?php echo $mostrar['rol_asociado']?>&submit">Modificar</a></td>
        <td><a href="eliminarPerfil1.php?ccc=<?php echo $mostrar['nombre']?>">Eliminar</a></td>
        <td><a href="asignarActividades.php?perfil=<?php echo $mostrar['nombre']?>&descrip=<?php echo $mostrar['descrpción']?>&rol=<?php echo $mostrar['rol_asociado']?>&submit=">Gestionar Actividades</a></td>
        <?php }}
			include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Perfil Buscado','Se Buscaron los datos del perfil:$id ',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
		}?>
      </tr>
    </table>
  </div>
  <div id="apDiv4">
  <h1 align="center">Buscar Perfil</h1></div>
   
</div>

</body>
</html>
