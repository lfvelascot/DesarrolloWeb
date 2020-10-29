<?php
if (!isset($_GET['correo'])){
$user_ses = $_SESSION['user'];
require('fpdf.php');
include_once("date.php");
class PDF extends FPDF{
// Cabecera de página
function Header(){
    // Logo
    //$this->Image('icono.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
	include_once("date.php");
    $this->Cell(utf8_decode('Reporte de Productos (Scorreo - $f)'),1,0,'C');
    // Salto de línea
    $this->Ln(20);
	$this ->Cell(40,10,utf8_decode('Fecha y Hora'),1,0,'C',0);
	$this ->Cell(55,10,utf8_decode('Acción'),1,0,'C',0);
	$this ->Cell(100,10,utf8_decode('Descripción'),1,1,'C',0);
}

// Pie de página
function Footer(){
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina ').$this->PageNo().'/{nb}',0,0,'C');
	}
}
include_once("date.php");
$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Reporte Actividad Generado','Se genero un documento PDF de la actividad de la cuenta $correo',1);";
mysqli_query($con,$inserta);
mysqli_close($con);
// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);
require("mcript.php");
$correo = $_GET['correo'];
$encr = $encriptar($correo);
require("conexion.php");
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$sql="SELECT * from log WHERE cuenta = '$encr' ORDER BY `fecha` DESC;";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result) != 0){
	while($mostrar = $result-> fetch_assoc()){
		$pdf ->Cell(40,10,utf8_decode($mostrar['fecha']),1,0,'C',0);
		$pdf ->Cell(55,10,utf8_decode($mostrar['accion']),1,0,'C',0);
		$pdf ->MultiCell(100,10,utf8_decode($mostrar['descrip']),1,"J");
	}
}
$pdf->Output('ficha.pdf','I');
$pdf->Output();
}
?>