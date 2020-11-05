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
	left: 231px;
	top: 92px;
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
include_once("conexion.php");
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
  <div id="apDiv3">
    <table width="1179" height="175" border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
      <tr bgcolor="#B1F0FE">
        <td height="77"><b>CC. Usuario</b></td>
        <td><b>Correo Electronico</b></td>
        <td><b>Estado</b></td>
        <td><b>Perfil</b></td>
        <td><b>Log</b></td>
    	<td width="86"><b>Opción</b></td>
      </tr>
      <?php
		include_once("conexion.php");
  		include_once("mcript.php");
 		$con=mysqli_connect($desencriptar($host),$desencriptar($usuario),$desencriptar($clave),$desencriptar($bd)) or die('Fallo la conexion');
		mysqli_set_charset($con,"utf8");
		$sql="SELECT * from cuenta WHERE e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
			include_once("mcript.php");
			$correo = $desencriptar($mostrar['correo_electronico']);
			$vcorreo = $mostrar['correo_electronico'];
			$user = $mostrar['usuario'];
			$sql1="SELECT * from usuario where cc = $user;";
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
		<tr>
        <td><a href="buscarUsuario.php?ccc=<?php echo $mostrar['usuario'] ?>&buscar"><?php echo $e ?></a></td>
        <td><?php echo $correo?></td>
        <td><?php echo $mostrar['estado']?></td>
        <td><?php echo $mostrar['perfil']?></td>
        <td><a href="log.php?correo=<?php echo $correo?>">log</a></td>
        <td><a href="modificarContrasenaCuenta.php?correo=<?php echo $correo?>&user=<?php echo $mostrar['usuario']?>">Cambiar Contraseña</a></td>
        </tr>
        <?php }}?>
    </table>
  </div>
  <div id="apDiv4">
  <h1 align="center">Cambiar Contraseña Cuenta</h1></div>
   
</div>

</body>
</html>
