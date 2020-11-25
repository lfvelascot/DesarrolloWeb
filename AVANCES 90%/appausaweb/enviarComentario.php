<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Enviar Comentario - APPAUSA Web</title>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 0px;
	top: 2px;
	width: 1614px;
	height: 727px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 221px;
	top: 86px;
	width: 1204px;
	height: 473px;
	z-index: 2;
}
</style>
<link href="multi/formularios2.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
include_once("conexion.php");
$con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
mysqli_set_charset($con,"utf8");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: enblanco.html");
}
$rol_ses = $_SESSION['rol']; 
if ($rol_ses == 'TALENTO HUMANO'){
	$empresa_ses = $_SESSION['empresa'];
} 
$user_ses = $_SESSION['user'];
?>
<div id="apDiv1">
<h1 align="center">Enviar Comentario</h1>
<div id="apDiv2">
<p>A continuación,escriba cualquier comentario sobre el rendimiento, puntos a mejorar o inconvenientes presentados al momento de usar la Aplicacion APPAUSA Sistema de Gestion de empleados:</p>
  <form>
  <p align="center">
    <textarea name="comentarios" rows="15" cols="110"></textarea>
  </p>
  <p align="center"> <button type="submit" name="add">Enviar Comentario</button></p></form>
  <?php
   if (isset($_GET['add']) && isset($_GET['comentarios']) && !empty($_GET['comentarios'])){
	   $c = $_GET['comentarios'];
	   include_once("date.php");
	   $sql = "INSERT INTO comentario VALUES ('$f','$user_ses','$c',1);";
	   if (mysqli_query($con,$sql)){
		   	include_once("date.php");
          	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Comentario Enviado','El usuario envio un comentario sobre la aplicación web',1);";
          	mysqli_query($con,$inserta);
		   $m = "Comentario enviado de forma exitosa";
		   echo "<script type='text/javascript'>alert('$m');</script>";
	   } else {
		   include_once("date.php");
          	$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Comentario No Enviado','El usuario trato de enviar un comentario sobre la aplicación web',1);";
          	mysqli_query($con,$inserta);
		   $m = "Error al enviar comentario";
		   echo "<script type='text/javascript'>alert('$m');</script>";
	   }
   }
  ?>
</div>
</div>
</body>
</html>
