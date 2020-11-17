<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 5px;
	top: -20px;
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
  include_once("administrador/conexion.php");
  session_start();
  if (!isset($_SESSION['user'])) {
   header("Location: en blanco.html");
  }
  $user_ses = $_SESSION['user'];
  $con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
  mysqli_set_charset($con,"utf8");
  $b = isset($_GET['react']);
  if (isset($_GET['react'])) {
	$m = $_GET['react'];
	$vusario = $_GET['cdusuario'];
	$vcorreo = $_GET['cmail'];
	echo "<script type='text/javascript'>alert('$m');</script>";
  }
  ?>
<div id="apDiv1">
<h1 align="center"> Añadir Nueva Cuenta </h1>
</div>
<div id="apDiv2">
<h2>Datos de Cuenta</h2>
<form>
<table width="915" height="206" border="0">
  <tr>
    <td width="333"><p>CC. Usuario:</p></td>
    <td width="572"><input type="text" name="cdusuario" value="<?php if ($b){echo $vusario; } else { echo "";}?>" pattern="^((\d{8})|(\d{10})|(\d{11})|(\d{6}-\d{5}))?$" title="El numero de documento debe tener 5,6,8,10,11 digitos" required/></td>
  </tr>
  <tr>
    <td><p>Correo Electronico:</p></td>
    <td><input type="email" name="cmail" value="<?php if ($b){echo $vcorreo ; } else { echo "";}?>" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" title="El correo eletronico debe contener un arroba para comprobar la existencia de un dominio" required="required"/></td>
  </tr>
  <tr>
    <td><p>Contraseña:</p></td>
    <td><input type="password" name="ccontrasena" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" title="La contraseña debe tener entre 8 y 16 digitos, además de componerse de valores alfanumericos y signos" required /></td>
  </tr>
  <tr>
    <td><p>Confirmar Contraseña:</p></td>
    <td><input type="password" name="ccontrasenac" pattern="^(?=.*\d)(?=.*[\u0021-\u002b\u003c-\u0040])(?=.*[A-Z])(?=.*[a-z])\S{8,16}$" title="La contraseña debe tener entre 8 y 16 digitos, además de componerse de valores alfanumericos y signos" required /></td>
  </tr>
  <tr>
      <td><p>Perfil:</p></td>
      <td><select title="Elija una opción por favor" name="cperfil">
      <option selected value="0">Seleccionar</option>
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
    <td><select title="Elija una opción" name="cestado">
	<option selected value="0">Seleccionar</option>
	<option value="ACTIVA">ACTIVA</option>
    <option value="BLOQUEDA">BLOQUEDA</option></select></td>
  </tr>
</table>
<p align="center">
  <button type="submit" title="De click para validar los datos ingresados" name="add">Añadir Cuenta</button></p>
</form>
<?php
if (isset($_GET['add']) && $_GET['cperfil'] != "0" && $_GET['cestado'] != "0") {
	$vusario = $_GET['cdusuario'];
	$vcorreo = $_GET['cmail'];
	$vcontr1 = $_GET['ccontrasena'];
	$vcontr2 = $_GET['ccontrasenac'];
	$perfil = $_GET['cperfil'];
	$vestado = $_GET['cestado'];
	$sql="SELECT * from usuario WHERE cc = $vusario AND e = 1;";
	$result=mysqli_query($con,$sql);
	if(mysqli_num_rows($result) != 0){
		if ($vcontr1 == $vcontr2){
			if ((strpos($vcorreo, ".com") !== false | strpos($vcorreo, ".co") !== false)){
				$sql="SELECT rol_asociado from perfil WHERE nombre = '$perfil';";
				$result=mysqli_query($con,$sql);
				if(mysqli_num_rows($result) != 0){
					while($mostrar=mysqli_fetch_array($result)){
						$rol_asos = $mostrar['rol_asociado'];
					}
					$sql="SELECT * from usuario WHERE cc = $vusario AND rol = '$rol_asos';";
					$result=mysqli_query($con,$sql);
					if(mysqli_num_rows($result) != 0){
						include_once("mcript.php");
						$correoe = $encriptar($vcorreo);
						$conte = $encriptar($vcontr1);
						$sql = "INSERT INTO cuenta VALUES ('$correoe','$conte','$vestado','$perfil',$vusario,1,0);"; 
						if (mysqli_query($con,$sql)){
							include_once("date.php");
							$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Añadido Exitoso','Inserto los datos del Usuario:$vusario idenficado por el correo: $correoe',1);";
							mysqli_query($con,$inserta);
							mysqli_close($con);
							header("Location: buscarCuenta.php?ccc=$vusario&add=");
							die();
						} else {
							include_once("date.php");
							$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Añadido Fallido','Conflicto con los datos de la Cuenta($correoe)',1);";
							mysqli_query($con,$inserta);
							mysqli_close($con);
							$m = "Por favor revice los de datos ingresados y verifique que no esta tratando de crear una cuenta a un usuario que ya tiene una asignada";
							header("Location: anadirCuenta.php?cdusuario=$vusario&cmail=$vcorreo&react=$m");
							die();
						}
					} else {
						include_once("date.php");
						$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Añadido Fallido','El perfil elegido no esta asociado al rol del usuario: $vusario',1);";
						mysqli_query($con,$inserta);
						mysqli_close($con);
						$m = "El perfil elegido no se encuentra asociado con el rol del usuario";
						header("Location: anadirCuenta.php?cdusuario=$vusario&cmail=$vcorreo&react=$m");
						die();
					}
				} 
			} else {
				include_once("date.php");
				$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Añadido Fallido','El correo electronico no esta permitido',1);";
				mysqli_query($con,$inserta);
				mysqli_close($con);
				$m = "El correo debe tener algun dominio existente";
				header("Location: anadirCuenta.php?cdusuario=$vusario&cmail=$vcorreo&react=$m");
				die();
			}
		} else {
			include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Añadido Fallido','Las contraseñas no considieron',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
			$m = "Las contraseñas no coincidieron, o no cumplen los requisitos (entre 8 y 16 caracteres, con letras en mayuscula y minuscula, y numeros)";
			header("Location: anadirCuenta.php?cdusuario=$vusario&cmail=$vcorreo&react=$m");
			die();
		}
	} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Cuenta Añadido Fallido','No se encontro un  usuario asociadoa numero de documento ingresado',1);";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		$m = "El número de documento no se encuentra asociado a ningun usuario existente o habilitado en la plataforma";
		header("Location: anadirCuenta.php?cdusuario=$vusario&cmail=$vcorreo&react=$m");
		die();
	}
}
?>

</div>
</body>
</html>
