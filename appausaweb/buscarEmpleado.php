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
	width: 1648px;
	height: 488px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 429px;
	top: 98px;
	width: 857px;
	height: 42px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 148px;
	top: 190px;
	width: 1331px;
	height: 263px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 479px;
	top: 15px;
	width: 789px;
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
if (!isset($_SESSION['user'])  | !isset($_SESSION['empresa'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
$empresa_ses = $_SESSION['empresa'];
$cc_ses = $_SESSION['cc'];
?>
<div id="apDiv1">
<div id="apDiv2">
<form> <p> Ingrese el número de cedula del Empleado a buscar: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" size="20" name="ccc" pattern="^((\d{8})|(\d{10})|(\d{11})|(\d{6}-\d{5}))?$" required="required"> <button type="submit" name="buscar">Buscar</button></form></p>
</div>
<div id="apDiv3">
<table width="1332" height="240" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr bgcolor="#B1F0FE">
    <td><b>CC</b></td>
    <td><b>Tipo Documento</b></td>
    <td><b>Nombre</b></td>
    <td><b>Apellido</b></td>
    <td><b>Fecha Nacimiento</b></td>
    <td><b>Edad</b></td>
    <td><b>Correo Electronico</b></td>
    <td><b>Telefono</b></td>
    <td><b>Contrato</b></td>
    <td><b>Opción</b></td>
    <td><b>Opción</b></td>
    <td><b>Opción</b></td>
  </tr>
  <tr>
  	<?php
	if (isset($_GET['buscar']) & !empty($_GET['ccc'])) {
		include_once("conexion.php");
		$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
		mysqli_set_charset($con,"utf8");
		$id = $_GET['ccc']; 
		$sql="SELECT * from usuario WHERE cc = $id and cc != $cc_ses AND e = 1 AND  usuario.rol = 'EMPLEADO';";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
			include ("mcript.php");
			$dato_desencriptado = $desencriptar($mostrar['correo_electronico']);
			$pnombre = $mostrar['pnombre'];
			if (!empty($mostrar['snombre'])){
				$snombre = $mostrar['snombre'];
			} else {
				$snombre = "";
			}
			$papellido = $mostrar['papellido'];
			$sapellido = $mostrar['sapellido'];
	?>
    <td><?php echo $mostrar['cc'] ?></td>
    <td><?php echo $mostrar['tipo_doc'] ?></td>
    <td><?php echo "$pnombre $snombre" ?></td>
    <td><?php echo "$papellido $sapellido" ?></td>
    <td><?php echo $mostrar['fecha_nam'] ?></td>
    <td><?php echo $mostrar['edad'] ?></td>
    <td><?php echo  $dato_desencriptado;?></td>
    <td><?php echo $mostrar['telefono'] ?></td>
    <td><a href="contratos.php?emp=<?php echo $mostrar['cc']?>">Contratos</a></td>
    <td><a class="btn btn-primary" href="eliminarUsuario1.php?id=<?php echo $mostrar['cc'];?>&empleado="><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>Eliminar</a></td>
    <td><a class="btn btn-primary"  href="modificarEmpleado1.php?id=<?php echo $mostrar['cc']; ?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>Modificar</a></td>
    <td><a class="btn btn-primary"  href="solicitarTHEmpleado1.php?id=<?php echo $mostrar['cc']; ?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>Solicitar Cuenta de Talento Humano</a></td>
  </tr>
      	<?php 
			include_once("date.php");
			$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Empleado Buscado','Se Buscaron los datos del Empleado:$id',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
		}
		} 			
	}
	 ?>
</table>
</div>
<div id="apDiv4">
  <h1 align="center">Buscar Empleado</h1></div>
</div>
</body>


</html>
