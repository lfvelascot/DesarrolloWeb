<?php
include_once('conexion.php');
include_once('date.php');
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: ./");
}
$user_ses = $_SESSION['user'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$sql="INSERT INTO $bd.log VALUES ('$user_ses','$f','Fin Sesión','Cerro Sesión sin Problema');";
mysqli_query($con,$sql);
mysqli_close($con);
session_destroy();
header("Location: ./");
?>