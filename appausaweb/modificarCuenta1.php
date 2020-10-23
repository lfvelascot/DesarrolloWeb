<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: -1px;
	top: -15px;
	width: 1606px;
	height: 720px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 364px;
	top: 93px;
	width: 915px;
	height: 210px;
	z-index: 2;
}
</style>
<link href="multi/formularios.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php
  include_once("conexion.php");
  session_start();
  if (!isset($_SESSION['user'])) {
   header("Location: en blanco.html");
  }
  $user_ses = $_SESSION['user'];
  $con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
  mysqli_set_charset($con,"utf8");
  $b = isset($_GET['react']);
  $load = isset($_GET['load']);
  if (isset($_GET['react'])) {
	$vusario = $_GET['cdusuario'];
	$vcorreo = $_GET['cmail'];
  } elseif ($load){
	include_once ("mcript.php");
	$id = $_GET['id'];
	$sql="SELECT * FROM $bd.cuenta WHERE usuario = '$id';";
    $result=mysqli_query($con,$sql);
    while($mostrar=mysqli_fetch_array($result)){
		$vusario = $mostrar['usuario'];
		$vcorreo = $mostrar['correo_electronico']; 
		$vcorreo = $desencriptar($vcorreo);
		$vestado = $mostrar['estado']; 
		$vperfil= $mostrar['perfil']; 
	}
  }
  ?>
<div id="apDiv1">
<h1 align="center"> Modificar Cuenta </h1>
</div>
<div id="apDiv2">
<h2>Datos de Cuenta</h2>
<form>
<table width="915" height="206" border="0">
  <tr>
    <td width="333"><p>CC. Usuario:</p></td>
    <td width="572"><input type="number" name="cdusuario" value="<?php if ($b | $load){echo $vusario; } else { echo "";}?>" required="required"/></td>
  </tr>
  <tr>
    <td><p>Correo Electronico:</p></td>
    <td><input type="email" name="cmail" value="<?php if ($b | $load){echo $vcorreo ;} else { echo "";}?>" required="required"/></td>
  </tr>
  <tr>
      <td><p>Perfil:</p></td>
      <td><select name="cperfil">
      <option value="0">Seleccionar</option>
      <option selected value="<?php if ($load) { echo $vperfil; }?>"><?php if ($load) { echo $vperfil; }?></option>
      <?php 
          $sql="SELECT * FROM perfil WHERE nombre != 'SUPER';";
          $result=mysqli_query($con,$sql);
          while($mostrar=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar['nombre'] ?>"><?php echo $mostrar['nombre'] ?></option>
        <?php } ?>
    </select>
  </tr>
  <tr>
    <td><p>Estado</p></td>
    <td><select name="cestado">
	<option value="0">Seleccionar</option>
    <option selected value="<?php if ($load) { echo $vestado; }?>"><?php if ($load) { echo $vestado; }?></option>
	<option value="ACTIVA">ACTIVA</option>
    <option value="BLOQUEDA">BLOQUEDA</option></select></td>
  </tr>
</table>
<p align="center">
  <button type="submit" name="add">Modificar Cuenta</button></p>
</form>
<?php
if (isset($_GET['add'])) {
	$vusario = $_GET['cdusuario'];
	$vcorreo = $_GET['cmail'];
	$perfil = $_GET['cperfil'];
	$vestado = $_GET['cestado'];
	$matches = null;
		$matches = null;
		if (1 === preg_match('/^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$/', $vcorreo, $matches) & (strpos($vcorreo, ".com") !== false | strpos($vcorreo, ".co") !== false)){
			$sql="SELECT rol_asociado from perfil WHERE nombre = $perfil';";
			$result=mysqli_query($con,$sql);
			while($mostrar=mysqli_fetch_array($result)){
				$rol_asos = $mostrar['rol_asociado'];
			}
			$sql="SELECT * from usuario WHERE cc = $vusario AND rol = '$rol_asos';";
			$result=mysqli_query($con,$sql);
			if(mysqli_num_rows($result) == 0){
				include_once("mcript.php");
				$correoe = $encriptar($vcorreo);
				$conte = $encriptar($vcontr1);
				$sql = "UPDATE $bd.cuenta SET correo_electronico = '$correoe', estado = '$vestado', perfil = '$perfil' where  usuario = '$vusario';"; 
				if (mysqli_query($con,$sql)){
					include_once("date.php");
					$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Cuenta Modificado Exitoso','Se modificaron los datos de la cuenta del usuario : $vusario',1;";
					mysqli_query($con,$inserta);
					mysqli_close($con);
					header("Location: buscarCuenta.php?ccc=$vusario&add=");
					die();
				} else {
					include_once("date.php");
					$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Cuenta Modificado Fallido','Conflicto con la actualizacion de los datos de la cuenta del usuario : $usuario',1);";
					mysqli_query($con,$inserta);
					mysqli_close($con);
					header("Location:  modificarCuenta1.php?cdusuario=$vusario&cmail=$vcorreo&react=");
					die();
				}
			} else {
				include_once("date.php");
				$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Cuenta Añadido Fallido','El perfil elegido no esta asociado al rol del usuario: $vusario',1);";
				mysqli_query($con,$inserta);
				mysqli_close($con);
				header("Location:  modificarCuenta1.php?cdusuario=$vusario&cmail=$vcorreo&react=");
				die();
			}
		} else {
			include_once("date.php");
			$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Cuenta Añadido Fallido','El correo electronico no esta permitido',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
			header("Location: modificarCuenta1.php?cdusuario=$vusario&cmail=$vcorreo&react=");
			die();
		}
}
?>

</div>
</body>
</html>
