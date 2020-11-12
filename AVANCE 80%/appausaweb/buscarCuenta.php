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
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
?>
<div id="apDiv1">
  <div id="apDiv2">
    <form>
      <p>&nbsp; </p>
      <p>Ingrese la CC del usuario de la cuenta&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" name ="ccc" pattern="^((\d{8})|(\d{10})|(\d{11})|(\d{6}-\d{5}))?$" required="required"/>
        <button type="submit" name = "add">Buscar</button>
      </p>
    </form>
   </div>
  <div id="apDiv3">
    <table width="1179" height="306" border="1" cellspacing="0" cellpadding="2" bordercolor="666633">
      <tr bgcolor="#B1F0FE">
        <td><b>CC. Usuario</b></td>
        <td><b>Correo Electronico</b></td>
        <td><b>Estado</b></td>
        <td><b>Perfil</b></td>
        <td><b>Log</b></td>
    	<td width="86"><b></b>Opción</td>
        <td width="86"><b></b>Opción</td>
    	<td width="86"><b>Opción</b></td>
        <td width="86"><b>Opción</b></td>
      </tr>
      <tr>
      <?php
	if (isset($_GET['add'])) {
		include_once("conexion.php");
		$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
		mysqli_set_charset($con,"utf8");
		$id = $_GET['ccc']; 
		$sql="SELECT * from cuenta where usuario = $id AND e = 1;";
		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
			include_once("mcript.php");
			$correo = $desencriptar($mostrar['correo_electronico']);
?> 
        <td><a href="buscarUsuario.php?ccc=<?php echo $mostrar['usuario']?>&buscar="><?php echo $mostrar['usuario']?></a></td>
        <td><?php echo $correo?></td>
        <td><?php echo $mostrar['estado']?></td>
        <td><?php echo $mostrar['perfil']?></td>
        <td><a href="log.php?correo=<?php echo $correo?>">log</a></td>
		<td><a href="modificarCuenta1.php?id=<?php echo $mostrar['usuario']?>&load">Modificar</a></td>
        <td><a href="cambiarEstadoCuenta1.php?ccc=<?php echo $mostrar['usuario']?>">Cambiar Estado</a></td>
        <td><a href="modificarContrasenaCuenta.php?correo=<?php echo $correo?>&user=<?php echo $mostrar['usuario']?>">Cambiar Contraseña</a></td>
        <td><a href="modificarPerfilCuenta.php?correo=<?php echo $correo?>&user=<?php echo $mostrar['usuario']?>">Cambiar Perfil</a></td>
        <?php }}
			include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Buscado','Se Buscaron los datos de la Cuenta:$id ',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
		}?>
      </tr>
    </table>
  </div>
  <div id="apDiv4">
  <h1 align="center">Buscar Cuenta</h1></div>
   
</div>

</body>
</html>
