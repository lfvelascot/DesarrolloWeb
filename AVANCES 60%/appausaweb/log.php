<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 1px;
	top: 0px;
	width: 1610px;
	height: 751px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 125px;
	top: 91px;
	width: 1370px;
	height: 611px;
	z-index: 2;
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
$correo = $_GET['correo'];
?>
<div id="apDiv1">
<h1 align="center">Registro del Actividad (Usuario:<?php echo $correo?>)</h1>
<div id="apDiv2">
  <table width="1369" height="151" border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
    <tr bgcolor="#B1F0FE">
      <td >Cuenta</td>
      <td >Fecha</td>
      <td>Accion</td>
      <td>Descripción</td>
    </tr>
    <?php
		include_once("conexion.php");
		$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
		mysqli_set_charset($con,"utf8");
		include_once ("mcript.php");
		$encr = $encriptar($correo);
		$sql="SELECT * from log WHERE cuenta = '$encr' ORDER BY `fecha` DESC;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
				include_once("mcript.php");
				$correo = $desencriptar($mostrar['cuenta']);
	?> 
    <tr>
      <td><?php echo $correo?></td>
      <td><?php echo $mostrar['fecha']?></td>
      <td><?php echo $mostrar['accion']?></td>
      <td><?php echo $mostrar['descrip']?></td>
    </tr>
    <?php }
			include_once("date.php");
			$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Registro de Actividad Visto','Se vieron los registros de actividad de la cuenta asociada al correo: $correo',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
	} ?>
  </table>

</div>
</div>

</body>
</html>