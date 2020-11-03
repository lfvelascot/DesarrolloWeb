<?php
	include_once("conexion.php");
	$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
	mysqli_set_charset($con,"utf8");
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Modificar Usuario - APPAUSA Web</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1606px;
	height: 720px;
	z-index: 1;
}
</style>
<link href="multi/formularios.css" rel="stylesheet" type="text/css" />
<style type="text/css">
#apDiv2 {
	position: absolute;
	left: 247px;
	top: 80px;
	width: 1117px;
	height: 546px;
	z-index: 2;
}
</style>
</head>
<body>
<div id="apDiv1">
<h1 align="center">Modificar Usuario</h1>
<div id="apDiv2">
<h2>Datos del Usuario</h2>
<?php
session_start();
if (!isset($_SESSION['user'])) {
	header("Location: en blanco.html");
	die();
}
$rol_ses = $_SESSION['rol'];
if ($rol_ses == "TALENTO HUMANO"){
	$empresa_ses = $_SESSION['empresa'];
}
$user_ses = $_SESSION['user'];
$id=$_GET['id'];
$sql="SELECT * from usuario where cc = $id;";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($result)){
	include_once ("mcript.php");
	$vcorreo = $desencriptar($row['correo_electronico']);
	$vtel = $row['telefono'];
	$vtel = $teldesencriptar($vtel);
?>
<form>
<table width="1114" height="274" border="0">
  <tr>
    <td width="243"><p>Número de identificación: </p></td>
    <td width="325"><input type="text" name="cnumdoc" value="<?php echo $row['cc']?>" pattern="^((\d{8})|(\d{10})|(\d{11})|(\d{6}-\d{5}))?$" required="required"/></td>
        <td width="286"><p>Tipo de Documento: </p></td>
    <td width="242"><select name="ctipodoc" >
	<option value="0">Seleccionar</option>
    <option value="Cedula Ciudadania">Cedula Ciudadania</option>
    <option value="Cedula Extranjeria">Cedula Extranjeria</option>
    <option value="Pasaporte">Pasaporte</option>
    <option selected value="<?php echo $row['tipo_doc']; ?>"><?php echo $row['tipo_doc']?></option>
</select></td>
  </tr>
  <tr>
    <td><p>Primer Nombre: </p></td>
    <td><input type="text" name="cpnombre" value="<?php echo $row['pnombre']?>" autofocus required /></td>
    <td width="286"><p>Segundo Nombre: </p></td>
    <td width="242"><input type="text" name="csnombre" value="<?php if (!is_null($row['snombre'])) {echo $row['snombre'];}?>"autofocus /></td>
  </tr>
  <tr>
    <td><p>Primer Apellido: </p></td>
    <td><input type="text" name="cpapellido" value="<?php echo $row['papellido']?>" autofocus required /></td>
    <td><p>Segundo Apellido: </p></td>
    <td><input type="text" name="csapellido" value="<?php echo $row['sapellido']?>" autofocus required /></td>
  </tr>
  <tr>
    <td><p>Fecha de nacimiento:</p></td>
    <td><input type="date" name="cfechanam" value="<?php echo $row['fecha_nam']?>" autofocus required /></td>
    <td><p>Edad:</p></td>
    <td><input type="number" name="cedad" value="<?php echo $row['edad']?>" autofocus required /></td>
  </tr>
  <tr>
    <td><p>Correo Electrónico:</p></td>
    <td><input type="email" name="ccorreo" value="<?php
	 echo $vcorreo?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" required /></td>
  </tr>
  <tr>
    <td><p>Teléfono:</p></td>
    <td><input type="tel" value="<?php echo $vtel?>" name="ctelefono" /></td>
  </tr>
  <tr>
    <td><p>Rol:</p></td>
    <td><select name="crol">
	<option value="0">Seleccionar</option>
    <?php 
		$sql="SELECT * from $bd.rol;";
		$result=mysqli_query($con,$sql);
		while($mostrar=mysqli_fetch_array($result)){
		 ?>
	<option value="<?php echo $mostrar['nombre'] ?>"><?php echo $mostrar['nombre'] ?></option>
	<?php } ?>
  <option selected value="<?php echo $row['rol']?>"><?php echo $row['rol'] ?></option>
  </select></td>
  </tr>
  <?php }?>
</table>
<p align="center">
  <button type="submit" name="mod">Modificar Usuario</button>
</form>

<?php
if (isset($_GET['mod'])) {
	$vcc = $_GET['cnumdoc'];
	$vtipodoc = $_GET['ctipodoc'];
	$vnombre1 = $_GET['cpnombre'];
	$vnombre2 = $_GET['csnombre'];
	$vapellido1= $_GET['cpapellido'];
	$vapellido2= $_GET['csapellido'];
	$vfechanam = $_GET['cfechanam'];
	$vedad = $_GET['cedad'];
	$vcorreo = $_GET['ccorreo'];
	$vtelefono = $_GET['ctelefono'];
	include_once ("mcript.php");
	$vcorreo = $encriptar($vcorreo);
	$inserta = "UPDATE $bd.usuario SET cc = $vcc, tipo_doc = '$vtipodoc', nombre = '$vnombre1 $vnombre2', apellido = '$vapellido1 $vapellido2', fecha_nam = '$vfechanam', edad = $vedad, correo_electronico = '$vcorreo', telefono = $vtelefono WHERE cc = '$vcc';";
	if (mysqli_query($con,$inserta)){
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Empleado Modificado Exitoso','Se modificaron los datos del Empleado:$vcc');";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: verEmpleados.php");
		die();
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Empleado Modificado Fallido','Conflico con los datos ($vcc, $vtipodoc, $vnombre1, $vapellido1, $vfechanam, $vedad, $vcorreo, $vtelefono, $vrol)');";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: modificarEmpleado1.php?id=$vcc");
		die();
	}
}
?>
</div>
</div>
</body>
</html>
