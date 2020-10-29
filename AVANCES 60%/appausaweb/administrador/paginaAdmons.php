<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" type="../multi/image/png" href="icon.png" />
<title>Administradores - APPAUSA Web</title>
<style type="text/css">
			* {
				margin:0px;
				padding:0px;
			}
			
			#header {
				margin:auto;
				width:1365px;
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
	width: 1365px;
	height: 40px;
	z-index: 2;
}

#apDiv1 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1365px;
	height: 721px;
	z-index: 1;	
}
#apDiv2 {
	position: absolute;
	left: 0px;
	top: 0px;
	width: 1366px;
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
	left: 489px;
	top: 15px;
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
	left: 34px;
	top: 62px;
	width: 1310px;
	height: 488px;
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

</style>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['user'])) {
 header("Location: ./");
}
$user_ses = $_SESSION['user'];
?>
<div id="apDiv1">
  <div id="apDiv2">
    <div id="apDiv4"><a title="Pagina Administradores" href="paginaAdmons.html"><img src="../multi/icono.png" width="72" height="73"></a></div>
	<div id="apDiv5">
  	<img src="../multi/textopagina.png">
	</div>
  </div>
  <div id="Div0">
    <div id="header" style="z-index:2">
        <?php
		include_once('conexion.php');
		$con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
		mysqli_set_charset($con,"utf8");
		$consulta = "SELECT nombre,apellido from $bd.usuario where cc = (SELECT usuario from $bd.cuenta WHERE correo_electronico = '$user_ses');";
		$resultado = mysqli_query($con, $consulta);
		while($fila = mysqli_fetch_assoc($resultado)){
			$nom=$fila['nombre'];
			$ape=$fila['apellido'];
		}
		$nom_usu = $nom." ".$ape; 
	  ?>
    <nav>
      <ul class="nav">
        <li style="width:566px"><a href="#">Bienvenido : <?php echo $nom_usu; ?> (ADMINISTRADOR)</a></li>
        <li style="width:112px"><a href="#">Usuarios</a>
          <ul style="z-index:10">
            <li ><a  href="anadirUsuario.html" target="iframe1"> Añadir Usuario</a></li>
            <li ><a  href="modificarUsuario.html" target="iframe1">Modificar Usuario</a></li>
            <li > <a  href="eliminarUsuario.html" target="iframe1">Eliminar Usuario</a></li>
            <li > <a  href="buscarUsuario.html" target="iframe1">Buscar Usuario</a></li>
            <li > <a  href="verUsuarios.html" target="iframe1">Ver todos los Usuarios</a></li>
          </ul>
        </li>
        <li style="width:112px"><a href="#">Contratos</a>
          <ul style="z-index:10">
            <li ><a  href="anadirContrato.html" target="iframe1">Añadir Contrato</a></li>
            <li ><a  href="modificarContrato.html" target="iframe1">Modificar Contrato</a></li>
            <li > <a  href="eliminarContrato.html" target="iframe1">Eliminar Contrato</a></li>
            <li > <a  href="buscarContrato.html" target="iframe1">Buscar Contrato</a></li>
            <li > <a  href="verContratos.html" target="iframe1">Ver todos los Contratos</a></li>
          </ul>
        </li>
        <li style="width:112px"><a href="#">Cuentas</a>
          <ul style="z-index:10">
            <li ><a  href="anadirCuenta.html" target="iframe1">Añadir Cuenta</a></li>
            <li ><a  href="modificarCuenta.html" target="iframe1">Modificar Cuenta</a></li>
            <li > <a  href="eliminarCuenta.html" target="iframe1">Eliminar Cuenta</a></li>
            <li > <a  href="buscarCuenta.html" target="iframe1">Buscar Cuenta</a></li>
            <li > <a  href="cambiarEstadoCuenta.html" target="iframe1">Cambiar Estado Cuenta</a></li>
            <li > <a  href="verCuentas.html" target="iframe1">Ver todas las Cuentas</a></li>
            <li > <a  href="asignarNuevoTH.html" target="iframe1">Asignar Nueva Cuenta Talento Humano</a></li>
          </ul>
        </li>
        <li style="width:111px"><a href="#">Empresas</a>
          <ul style="z-index:10">
            <li ><a  href="anadirEmpresa.html" target="iframe1"> Añadir Empresa</a></li>
            <li ><a  href="modificarEmpresa.html" target="iframe1">Modificar Empresa</a></li>
            <li > <a  href="eliminarEmpresa.html" target="iframe1">Eliminar Empresa</a></li>
            <li > <a  href="buscarEmpresa.html" target="iframe1">Buscar Empresa</a></li>
            <li > <a  href="verEmpresas.html" target="iframe1">Ver todas las Empresas</a></li>
          </ul>
        </li style="z-index:1">
        <li style="width:112px"><a href="#">Entidades</a>
          <ul style="z-index:10">
            <li ><a  href="anadirEntidad.html" target="iframe1"> Añadir Entidad</a></li>
            <li ><a  href="modificarEntidad.html" target="iframe1">Modificar Entidad</a></li>
            <li > <a  href="eliminarEntidad.html" target="iframe1">Eliminar Entidad</a></li>
            <li > <a  href="buscarEntidad.html" target="iframe1">Buscar Entidad</a></li>
            <li > <a  href="verEntidades.html" target="iframe1">Ver todas las Entidades</a></li>
          </ul>
        </li>
        <li style="width:112px"><a href="#">Ayuda</a>
          <ul style="z-index:10">
            <li ><a  href="verComentarios.html" target="iframe1">Ver Comentarios</a></li>
            <li ><a  href="verAyuda.html" target="iframe1">Necesito Ayuda</a></li>
          </ul>
        </li>
        <li style="width:125px"><a href="#">Sesión</a>
          <ul style="z-index:10">
            <li style="width:125px"><a  href="verDatosUsuario.html" target="iframe1">Perfil de Usuario</a></li>
            <li style="width:125px"><a href="../index.html"> Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
      </nav>
        </div>
        
<div id="apDiv10">
  <iframe  allowtransparency="true" width="1310" height="488" name="iframe1" src="en blanco.html"  frameborder="0" allowfullscreen style="z-index:1" ></iframe> </div>
  </div>
</body>
</html>

