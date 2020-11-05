<?php
include_once("conexion.php");
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: en blanco.html");
}
$user_ses = $_SESSION['user'];
$correo = $_GET['correo'];
ob_start();
?>
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: -6px;
	top: -4px;
	width: 722px;
	height: 670px;
	z-index: 1;
}
</style>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<link href="tables.css" rel="stylesheet" type="text/css">
<style type="text/css">
#apDiv2 {
	position: absolute;
	left: 39px;
	top: 3px;
	width: 77px;
	height: 58px;
	z-index: 2;
}
#apDiv3 {
	position: absolute;
	left: 157px;
	top: 1px;
	width: 368px;
	height: 56px;
	z-index: 2;	
}
</style>
<div id="apDiv1" align="center">
<div id="apDiv3" class="box"><h2 align="center">REPORTE DE ACTIVIDAD (<?php echo $correo?> - <?php include_once('date.php'); echo $d ?>)</h2></div>
<p align="justify" >Este reporte se genera con el fin de conocer las actividades del usuario propietario de esta cuenta.</p>
  <table width="741" height="151" border="1" cellspacing="0" cellpadding="1" bordercolor="666633">
    <tr bgcolor="#B1F0FE">
      <td width="70" >Fecha</td>
      <td width="100">Accion</td>
      <td width="340">Descripción</td>
    </tr>
    <?php
		include_once("conexion.php");
		include_once("mcript.php");
  		$con=mysqli_connect($desencriptar($host),$desencriptar($usuario),$desencriptar($clave),$desencriptar($bd)) or die('Fallo la conexion');
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
      <td width="70"><?php echo $mostrar['fecha']?></td>
      <td width="100"> <?php echo $mostrar['accion']?></td>
      <td width="340"><?php echo $mostrar['descrip']?></td>
    </tr>
    <?php }
			include_once("date.php");
			$encr = $desencriptar($encr);
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Reporte Actividad Generado','Se genero un documento PDF de la actividad de la cuenta $encr',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
	} ?>
  </table>
</div>
  <?php
/* Guardamos el HTML generado en una variable para trabajar con ella */
$html = ob_get_contents();
/* Deshacemos todo lo generado y empezamos de nuevo */
ob_end_clean();
require 'tcpdf_min/tcpdf.php';
/* Creamos el documento PDF */
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
/* Agregamos la primera página */
$pdf->AddPage();
/* Generamos su contenido a partir del código HTML */
$pdf->writeHTML($html, true, false, true, false, '');
/* Damos salida del documento al navegador */
$pdf->Output('tu_pdf.pdf', 'I');
?>