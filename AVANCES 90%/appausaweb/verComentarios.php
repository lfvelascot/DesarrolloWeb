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
	left: 228px;
	top: 94px;
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
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
?>
<div id="apDiv1">
  <div id="apDiv3">
    <table width="1179" height="224" border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
      <tr bgcolor="#B1F0FE">
        <td height="73"><b>Fecha Envio</b></td>
        <td><b>Usuario</b></td>
        <td><b>Cuenta</b></td>
        <td><b>Comentario</b></td>
      </tr>
      <?php
		include_once("conexion.php");
		$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
		mysqli_set_charset($con,"utf8");
		$sql="SELECT * from comentario where e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
			while($mostrar=mysqli_fetch_array($result)){
			$cuenta = $mostrar['cuenta'];
			$sql1 = "SELECT * from usuario WHERE cc = (SELECT usuario from cuenta where correo_electronico = '$cuenta');";
			$result1=mysqli_query($con,$sql1);
			if(mysqli_num_rows($result1) != 0){
				while($mostrar1=mysqli_fetch_array($result1)){
					$pnom = $mostrar1['pnombre'];
					$pape = $mostrar1['papellido'];
					$cc = $mostrar1['cc'];
				}
			}
			include_once('mcript.php');
			$cuenta = $desencriptar($cuenta);
		?> 
        <tr>
        <td><?php echo $mostrar['fecha']?></td>
        <td><a href="buscarUsuario.php?ccc=<?php echo $cc?>&buscar="><?php echo "$pnom $pape"?></a></td>
        <td><a href="buscarCuenta.php?ccc=<?php echo $cc?>&buscar="><?php echo $cuenta?></a></td>
        <td><?php echo $mostrar['contenido']?></td>
        </tr>
        <?php }
			include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Comentarios Vistos','Se vieron los comentarios de los usuarios de APPAUSA',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
		}
		?>
    </table>
  </div>
  <div id="apDiv4">
  <h1 align="center">Comentarios APPAUSA</h1></div>
   
</div>

</body>
</html>
