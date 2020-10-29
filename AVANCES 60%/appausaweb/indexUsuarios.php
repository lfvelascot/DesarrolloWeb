<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="multi/image/png" href="multi/icon.png" />
<title>APPAUSA Web - Gestor Empleados</title>
<style type="text/css">
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:1919px;
				font-family:Arial, Helvetica, sans-serif;
			}
			
			ul, ol {
				list-style:none;
			}
			
			.nav > li {
				float:left;
			}
			
			.nav li a {
				background-color:#000;
				color:#fff;
				text-decoration:none;
				padding:10px 12px;
				display:block;
			}
			
			.nav li a:hover {
				background-color:#1595D2;
			}
			
			.nav li ul {
				display:none;
				position:absolute;
				min-width:160px;
			}
			
			.nav li:hover > ul {
				display:block;
			}
			
			.nav li ul li {
				position:relative;
			}
			
			.nav li ul li ul {
				right:-140px;
				top:0px;
			}
#Div0 {
	position: absolute;
	left: 0px;
	top: 92px;
	width: 1919px;
	height: 40px;
	z-index: 2;
}

#apDiv1 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1919px;
	height: 721px;
	z-index: 1;	
}
#apDiv2 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1922px;
	height: 91px;
	z-index: 2;
	background: #74B1F5;
	border: thin none #666;
}
#apDiv1 #apDiv2 {
	font-family: Arial, Helvetica, sans-serif;
}
#apDiv3 {
	position: absolute;
	left: 456px;
	top: 132px;
	width: 434px;
	height: 409px;
	z-index: 2;
}
#apDiv4 {
	position: absolute;
	left: 139px;
	top: 11px;
	width: 73px;
	height: 74px;
	z-index: 3;
	border: thin none #666;
}
#apDiv5 {
	position: absolute;
	left: 254px;
	top: 19px;
	width: 853px;
	height: 53px;
	z-index: 4;
	-webkit-transition-property: all;
	-moz-transition-property: all;
	-ms-transition-property: all;
	-o-transition-property: all;
	transition-property: all;
	-webkit-transition-duration: 5.5s;
	-moz-transition-duration: 5.5s;
	-ms-transition-duration: 5.5s;
	-o-transition-duration: 5.5s;
	transition-duration: 5.5s;
	-webkit-transition-timing-function: linear;
	-moz-transition-timing-function: linear;
	-ms-transition-timing-function: linear;
	-o-transition-timing-function: linear;
	transition-timing-function: linear;
	-webkit-transition-delay: 3s;
	-moz-transition-delay: 3s;
	-ms-transition-delay: 3s;
	-o-transition-delay: 3s;
	transition-delay: 3s;
}
#apDiv6 {
	position: absolute;
	left: 42px;
	top: 572px;
	width: 1284px;
	height: 53px;
	z-index: 3;
}
#apDiv7 {
	position: absolute;
	left: 501px;
	top: 156px;
	width: 345px;
	height: 47px;
	z-index: 4;
}
#apDiv8 {
	position: absolute;
	left: 500px;
	top: 216px;
	width: 348px;
	height: 321px;
	z-index: 5;
}
#apDiv9 {
	position: absolute;
	left: 502px;
	top: 220px;
	width: 346px;
	height: 294px;
	z-index: 5;
}
#apDiv10 {
	position: absolute;
	left: 124px;
	top: 141px;
	width: 1648px;
	height: 592px;
	z-index: 2;
}
#apDiv11 {
	position: absolute;
	left: 744px;
	top: 121px;
	width: 524px;
	height: 39px;
	z-index: 3;
	border: thick
}
#apDiv12 {
	position: absolute;
	left: 64px;
	top: 182px;
	width: 294px;
	height: 478px;
	z-index: 4;
}


#apDiv13 {
	position: absolute;
	left: 0px;
	top: 92px;
	width: 1364px;
	height: 70px;
	z-index: 4;
}
#apDiv14 {
	position: absolute;
	left: 4px;
	top: 89px;
	width: 1917px;
	height: 899px;
	z-index: 1;
	background: url(multi/background2.png) bottom no-repeat
}
</style>
</head>
<body>
<?php
include_once('conexion.php');
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: ./");
}
$user_ses = $_SESSION['user'];
$perfil_ses = $_SESSION['perfil'];
$rol_ses = $_SESSION['rol'];
$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
mysqli_set_charset($con,"utf8");
$consulta = $consulta = "SELECT pnombre,snombre,papellido,sapellido from $bd.usuario where cc = (SELECT usuario from $bd.cuenta WHERE correo_electronico = '$user_ses');";
$resultado = mysqli_query($con, $consulta);
?>
<div id="apDiv14"></div>
<div id="apDiv1">
  <div id="apDiv2">
    <div id="apDiv4"><a title="Pagina Empresas" href="empresas/paginaEmpresas.html"><img src="multi/icono.png" width="72" height="73"></a></div>
	<div id="apDiv5">
  	<img src="multi/textopagina.png">
	</div>
  </div>
  <div id="Div0">
    <div id="header" style="z-index:2">
    <nav>
        <?php
		while($fila = mysqli_fetch_assoc($resultado)){
			$pnom=$fila['pnombre'];
			if (!empty($fila['snombre'])){
				$snom=$fila['snombre'];
			} else {
				$snom="";
			}
			$pape=$fila['papellido'];
			$sape=$fila['sapellido'];
		}
			$nom_usu = $pnom." ".$snom." ".$pape." ".$sape; 
	  ?>
      <ul class="nav">
        <li style="width:880px"><a href="#">Bienvenido : <?php echo "$nom_usu ($rol_ses)"; ?></a></li>
        <?php
		if ($rol_ses == "TALENTO HUMANO"){
		?>
        <li style="width:209px"><a href="#">Empleados</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Empleados' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:209px"><a href="#">Contratos</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Contratos' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:209px"><a href="#">Entidades</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Entidades' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:209px"><a href="#">Ayuda</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Ayuda' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:200px"><a href="#">Sesión</a>
          <ul style="z-index:10">
            <li style="width:200px"><a href="verDatosCuenta.php" target="iframe1">Ver Datos Cuenta</a></li>
            <li style="width:200px"><a href="logout.php" >Cerrar Sesión</a></li>
        </ul>
        </li>
        <?php 
		}elseif ($rol_ses == "ADMINISTRADOR"){
		?>
        <li style="width:119px"><a href="#">Usuarios</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Usuarios' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:119px"><a href="#">Contratos</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Contratos' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:120px"><a href="#">Cuentas</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Cuentas' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:120px"><a href="#">Empresas</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Empresas' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:120px"><a href="#">Entidades</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Entidades' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        </li>
        <li style="width:120px"><a href="#">Perfiles</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Perfiles' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:120px"><a href="#">Ayuda</a>
          <ul style="z-index:10">
          <?php
			$consulta = "select gestion_actividad.actividad AS actividad, actividad.url AS url, actividad.elemento AS elemento from gestion_actividad,actividad where gestion_actividad.perfil = '$perfil_ses' AND gestion_actividad.actividad = actividad.nombre AND actividad.elemento = 'Ayuda' AND gestion_actividad.e = 1;";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			?>
            <li style="width:200px"><a href="<?php echo $fila['url']?>" target="iframe1"><?php echo $fila['actividad']?></a></li>
            <?php }?>
        </ul>
        </li>
        <li style="width:200px"><a href="#">Sesión</a>
          <ul style="z-index:10">
            <li style="width:200px"><a href="verDatosCuenta.php" target="iframe1">Ver Datos Cuenta</a></li>
            <li style="width:200px"><a href="logout.php" >Cerrar Sesión</a></li>
        </ul>
        </li>
        <?php 
		}else{
			session_destroy();
			header("Location: ./");
		}
		?>
      </ul>
     </nav>
      </div>
<div id="apDiv10">
  <iframe  allowtransparency="true" width="1648" height="592" name="iframe1" src="en blanco.html"  frameborder="0" allowfullscreen style="z-index:1" ></iframe> </div>
  </div>
</body>
</html>
