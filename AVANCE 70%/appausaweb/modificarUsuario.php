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
	width: 1562px;
	height: 488px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 228px;
	top: 62px;
	width: 857px;
	height: 42px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 112px;
	top: 123px;
	width: 861px;
	height: 308px;
	z-index: 3;
}
#apDiv4 {
	position: absolute;
	left: 370px;
	top: 18px;
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
if (!isset($_SESSION['user'])) {
 header("Location: enblanco.html");
}
$user_ses = $_SESSION['user'];
?>
<div id="apDiv1">
<div id="apDiv3">
<table width="1332" height="212" border=1 cellspacing=0 cellpadding=2 bordercolor="666633">
  <tr bgcolor="#B1F0FE">
    <td><b>CC</b></td>
    <td><b>Tipo Documento</b></td>
    <td><b>Nombre</b></td>
    <td><b>Apellido</b></td>
    <td><b>Fecha Nacimiento</b></td>
    <td><b>Edad</b></td>
    <td><b>Correo Electronico</b></td>
    <td><b>Telefono</b></td>
    <td><b>Rol</b></td>
    <td><b>Contrato</b></td>
    <td><b>Cuenta</b></td>
    <td><b>Opción</b></td>
  </tr>
<?php
		include_once("conexion.php");
		$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
		mysqli_set_charset($con,"utf8");
		$sql="SELECT * from usuario WHERE e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
			include_once ("mcript.php");
			$vcorreo = $desencriptar($mostrar['correo_electronico']);
			$pnombre = $mostrar['pnombre'];
			if (!empty($mostrar['snombre'])){
				$snombre = $mostrar['snombre'];
			} else {
				$snombre = "";
			}
			$papellido = $mostrar['papellido'];
			$sapellido = $mostrar['sapellido'];
?>
    <tr>
    <td height="89"><?php echo $mostrar['cc'] ?></td>
    <td><?php echo $mostrar['tipo_doc'] ?></td>
    <td><?php echo "$pnombre $snombre" ?></td>
    <td><?php echo "$papellido $sapellido" ?></td>
    <td><?php echo $mostrar['fecha_nam'] ?></td>
    <td><?php echo $mostrar['edad'] ?></td>
    <td><?php echo $vcorreo ?></td>
    <td><?php echo $mostrar['telefono'] ?></td>
    <td><?php echo $mostrar['rol'] ?></td>
    <?php 
		if ($mostrar['rol'] != "ADMINISTRADOR"){?>
			<td><a href="contratos.php?emp=<?php echo $mostrar['cc']?>">Contratos</a></td>
	<?php 	} else { ?>
		<td></td>
	 <?php }?>
     <?php 
		if ($mostrar['rol'] == "ADMINISTRADOR"){?>
			<td><a class="btn btn-primary"  href="buscarCuenta.php?cid=<?php echo $mostrar['cc'];?>&buscar="><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>Ver Cuenta</a></td>
	<?php 	} else { ?>
		<td></td>
	 <?php }?>
    <td><a class="btn btn-primary"  href="modificarUsuario1.php?id=<?php echo $mostrar['cc']; ?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>Modificar</a></td>
    </tr>
      	<?php 
		}
			include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Usuarios Vistos','Se vieron todos los registros de Usuarios de APPAUSA WEB',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
		} 			
	 ?>
</table>
</div>
<div id="apDiv4"><h1 align="center">Modificar Usuario</h1></div></div>
</div>
</body>
</html>
