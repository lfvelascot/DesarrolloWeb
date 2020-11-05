<?php 
session_start();
if (!isset($_SESSION['user']) | $_SESSION['cc'] == $_GET['id']) {
 	header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
include_once("conexion.php");
$id = $_GET['id'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
$sql = "UPDATE $bd.usuario SET e = 0 where cc = $id";
if ($result=mysqli_query($con,$sql)){
		include_once("date.php");
		if (isset($_GET['empleado'])){
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Empleado Eliminado Exitoso','Se Eliminaron los datos del Usuario identificado con el Documento:$id');";
			mysqli_query($con,$inserta);
		} else {
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Usuario Eliminado Exitoso','Se Eliminaron los datos del Usuario identificado con el Documento:$id');";
			mysqli_query($con,$inserta);
			$sql = "UPDATE cuenta SET estado = 'BLOQUEADA', e = 0 WHERE usuario = $id";
			mysqli_query($con,$sql);
			// $sql = "UPDATE $bd.contrato SET e = 0 WHERE empleado = $id";
			// mysqli_query($con,$sql);
		}
		mysqli_close($con);
		header("Location: verUsuarios.php");
} else {
		include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Usuario Eliminado Fallido','Se Trataron de eliminar los datos de Usuario identificado con el Documento:$id');";
		mysqli_query($con,$inserta);
		mysqli_close($con);
		header("Location: buscarUsuario.php?ccc=$id&buscar=");
}
?>