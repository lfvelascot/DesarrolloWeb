  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <style type="text/css"> BODY{ font-family:Arial, Helvetica, sans-serif } </style>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Añadir Usuario - APPAUSA Web</title>
  <style type="text/css">
  #apDiv1 {
      position: absolute;
      left: 0px;
      top: 0px;
      width: 1606px;
      height: 1008px;
      z-index: 1;
  }
  </style>
  <link href="multi/formularios.css" rel="stylesheet" type="text/css" />
  <style type="text/css">
  #apDiv2 {
      position: absolute;
      left: 344px;
      top: 81px;
      width: 927px;
      height: 612px;
      z-index: 2;
  }
  </style>
  </head>
  <body>
  <?php
  include_once("conexion.php");
  session_start();
  if (!isset($_SESSION['user'])) {
   header("Location: en blanco.html");
  }
  $user_ses = $_SESSION['user'];
  $con=mysqli_connect($host,$usuario,$clave,$bd) or die("ERROR");
  mysqli_set_charset($con,"utf8");
  if (isset($_GET['m'])){
	$m = $_GET['m'];
	echo "<script type='text/javascript'>alert('$m');</script>";
}
  ?>
  <div id="apDiv1">
  <h1 align="center">Añadir Contrato</h1>
  <div id="apDiv2">
  <h2>Datos de Contrato</h2>
  <form>
  <table width="900" height="550" border="0">
    <tr>
      <td><p>Num. Contrato:</p></td>
      <td><input type="number" name="cnumcontrato" autofocus required /></td>
    </tr>
    <tr>
      <td><p>NIT Empresa:</p></td>
      <td><input type="text" name="cempresa" pattern="^[0-9]{0,14}+-[{0-9}]$" autofocus required /></td>
    </tr>
      <tr>
      <td><p>Documento Empleado:</p></td>
      <td><input type="text" name="cdocumentoemp" pattern="^((\d{8})|(\d{10})|(\d{11})|(\d{6}-\d{5}))?$" autofocus required /></td>
    </tr>
    <tr>
      <td><p>Tipo Contrato:</p></td>
      <td><select name="ctipocontrato">
      <option selected value="0">Seleccionar</option>
          <?php 
          $sql="SELECT * from $bd.tipo_contrato;";
          $result=mysqli_query($con,$sql);
          while($mostrar=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar['nombre'] ?>"><?php echo $mostrar['nombre'] ?></option>
           <?php } ?>
           </select>
    </tr>
    <tr>
      <td><p>Cargo:</p></td>
      <td><input type="text" name="ccargo" autofocus required /></td>
    </tr>
    <tr>
      <td><p>Fecha Inicio:</p></td>
      <td><input type="date" name="cfechainin" autofocus required /></td>
    </tr>
    <tr>
      <td><p>Fecha Fin:</p></td>
      <td><input type="date" name="cfechafin" autofocus  /></td>
    </tr>
    <tr>
      <td><p>Sueldo ($):</p></td>
      <td><input type="number" name="csueldo" /></td>
    </tr>
    <tr>
      <td><p>Funciones:</p></td>
      <td><textarea name="cfunciones" rows="5" cols="100"></textarea></td>
    </tr>
    <tr>
      <td><p>EPS:</p></td>
      <td><select name="ceps">
      <option selected value="0">Seleccionar</option>
          <?php 
          $sql="SELECT * FROM entidad WHERE  tipo =  'EPS' AND e = 1;";
          $result=mysqli_query($con,$sql);
          while($mostrar=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar['nit'] ?>"><?php echo $mostrar['nombre_entidad'] ?></option>
           <?php } ?>
           </select>
      </td>
    </tr>
    <tr>
      <td><p>ARL:</p></td>
      <td><select name="carl">
      <option selected value="0">Seleccionar</option>
          <?php 
          $sql="SELECT * FROM entidad WHERE tipo =  'ARL' AND e = 1;";
          $result=mysqli_query($con,$sql);
          while($mostrar=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar['nit'] ?>"><?php echo $mostrar['nombre_entidad'] ?></option>
           <?php } ?>
    </select>
    </tr>
    <tr>
      <td><p>Caja de Compensación:</p></td>
      <td><select name="ccajacompensacion">
      <option selected value="0">Seleccionar</option>
          <?php 
          $sql="SELECT * FROM entidad WHERE tipo =  'CAJA DE COMPENSACIÓN' AND e = 1;";
          $result=mysqli_query($con,$sql);
          while($mostrar=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar['nit'] ?>"><?php echo $mostrar['nombre_entidad'] ?></option>
           <?php } ?>
  </select></td>
    </tr>
    <tr>
      <td><p>Fondo de Pensiones :</p></td>
      <td><select name="cfondopensiones">
      <option selected value="0">Seleccionar</option>
          <?php 
          $sql="SELECT * FROM entidad WHERE tipo =  'FONDO DE PENSIONES' AND e = 1;";
          $result=mysqli_query($con,$sql);
          while($mostrar=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar['nit'] ?>"><?php echo $mostrar['nombre_entidad'] ?></optio
           ><?php } 
		   mysqli_close($con);
		   ?>
  </select></td>
    </tr>
  </table>
  <p align="center">
    <button type="submit" name="add">Registrar Contrato</button></p>
  </form>
  <?php
  include_once("conexion.php");
  include_once("date.php");
  $con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
  mysqli_set_charset($con,"utf8");
  if (isset($_GET['add']) && $_GET['ccajacompensacion'] != "0"&& $_GET['cfondopensiones'] != "0"&& $_GET['carl'] != "0" && $_GET['ceps'] != "0" && $_GET['ctipocontrato'] != "0") {
      $vnumcontrato = $_GET['cnumcontrato'];
      $vnitempresa = $_GET['cempresa'];
	  $vdocempleado = $_GET['cdocumentoemp'];
      $vtipocontrato = $_GET['ctipocontrato'];
      $vcargo= $_GET['ccargo'];
      $vfechaini= $_GET['cfechainin'];
      $vfechafin= $_GET['cfechafin'];
      $vsueldo= $_GET['csueldo'];
      $vfunciones = $_GET['cfunciones'];
      $veps = $_GET['ceps'];
      $varl= $_GET['carl'];
      $vcajacompensacion= $_GET['ccajacompensacion'];
      $vfondopensiones= $_GET['cfondopensiones'];
	  $select = "SELECT rol from usuario where cc = '$vdocempleado' AND e = 1;";
      $result=mysqli_query($con,$select);
	  if(mysqli_num_rows($result) != 0){
          while($mostrar=mysqli_fetch_array($result)){
			  $rol = $mostrar['rol'];
		}
		$d1 = new DateTime($vfechaini);
		$d2 = new DateTime($vfechafin);
		if (($rol == "EMPLEADO" | $rol == "TALENTO HUMANO")){
			if ($vtipocontrato == "Definido" & !empty($_GET['cfechainin']) & !empty($_GET['cfechafin']) & ($d1 < $d2)){
			$inserta = "INSERT INTO contrato (`num_contrato`, `empleado`, `empresa`, `cargo`, `fecha_inicio`, `fecha_fin`, `sueldo`, `funciones`, `arl`, `caja_compensación`, `fondo_pensiones`, `eps`, `tipo_contrato`,`e`) VALUES ('$vnumcontrato','$vdocempleado','$vnitempresa','$vcargo','$vfechaini','$vfechafin','$vsueldo','$vfunciones','$varl','$vcajacompensacion','$vfondopensiones','$veps','$vtipocontrato',1);";
			if (mysqli_query($con,$inserta)){
				include_once("date.php");
          		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Añadido Exitoso','Inserto los datos del Contrato:$vnumcontrato de la empresa :$vnitempresa',1);";
          		mysqli_query($con,$inserta);
				$sql1="select DISTINCT COUNT(empleado) AS num_empleados from contrato WHERE empresa = $vnitempresa;";
				$result1=mysqli_query($con,$sql1);
				if(mysqli_num_rows($result1) != 0){
				while($mostrar1=mysqli_fetch_array($result1)){
					$num_em = $mostrar1['num_empleados'];
					$upd = "UPDATE empresa SET num_empleados = $num_em WHERE nit = $vnitempresa AND e = 1;";
					mysqli_query($con,$upd);
					}
				}
          		mysqli_close($con);
          		header("Location: buscarContrato.php?ccontrato=$vnumcontrato&cempresa=$vnitempresa&buscar=");
          		die();
			} else {
				include_once("date.php");
				$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Añadido Fallido','Conflico con los datos del contrato('$vnumcontrato','$vdocempleado','$vnitempresa','$vcargo','$vfechaini','$vfechafin','$vsueldo','$vfunciones','$varl','$vcajacompensacion','$vfondopensiones','$veps','$vtipocontrato')',1);";
				mysqli_query($con,$inserta);
				mysqli_close($con);
				$m = "Por favor revice los datos ingresados";
				header("Location: anadirContrato.php?m=$m");
				die();
			}
		} elseif(($vtipocontrato == "Obra Labor" | $vtipocontrato == "Indefinido") & !empty($_GET['cfechainin']) & empty($_GET['cfechafin'])) {
			$inserta = "INSERT INTO contrato (`num_contrato`, `empleado`, `empresa`, `cargo`, `fecha_inicio`, `fecha_fin`, `sueldo`, `funciones`, `arl`, `caja_compensación`, `fondo_pensiones`, `eps`, `tipo_contrato`,`e`) VALUES ('$vnumcontrato','$vdocempleado','$vnitempresa','$vcargo','$vfechaini',NULL,'$vsueldo','$vfunciones','$varl','$vcajacompensacion','$vfondopensiones','$veps','$vtipocontrato',1);";
			if (mysqli_query($con,$inserta)){
				include_once("date.php");
          		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Añadido Exitoso','Inserto los datos del Contrato:$vnumcontrato de la empresa :$vnitempresa',1);";
          		mysqli_query($con,$inserta);
				$sql1="select DISTINCT COUNT(empleado) AS num_empleados from contrato WHERE empresa = $vnitempresa;";
				$result1=mysqli_query($con,$sql1);
				if(mysqli_num_rows($result1) != 0){
				while($mostrar1=mysqli_fetch_array($result1)){
					$num_em = $mostrar1['num_empleados'];
					$upd = "UPDATE empresa SET num_empleados = $num_em WHERE nit = $vnitempresa AND e = 1;";
					mysqli_query($con,$upd);
					}
				}
          		mysqli_close($con);
          		header("Location: buscarContrato.php?ccontrato=$vnumcontrato&cempresa=$vnitempresa&buscar=");
          		die();
      		} else {
				include_once("date.php");
          		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Añadido Fallido','Conflico con los datos del contrato('$vnumcontrato','$vdocempleado','$vnitempresa','$vcargo','$vfechaini',NULL,'$vsueldo','$vfunciones','$varl','$vcajacompensacion','$vfondopensiones','$veps','$vtipocontrato')',1);";
          		mysqli_query($con,$inserta);
         		mysqli_close($con);
          		$m = "Por favor revice los datos ingresados";
				header("Location: anadirContrato.php?m=$m");
          		die();
  			}
		} 
		}else {
			include_once("date.php");
			$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Añadido Fallido','Trato de crear un contrato para el administrador: $vdocempleado',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
			$m = "El documento ingresado se encuentra asociado a un administrador";
			header("Location: anadirContrato.php?m=$m");
			die();
		}
	  } else {
		  include_once("date.php");
		$inserta = "INSERT INTO log VALUES ('$user_ses','$f','Contrato Añadido Fallido','No hay ningun Empleado con el documento: $vdocempleado',1);";
        mysqli_query($con,$inserta);
        mysqli_close($con);
		$m = "No se encontro ningun empleado asociado a el documento ingresado";
		header("Location: anadirContrato.php?m=$m");
		die();
	  }
  }
  ?>
  </div>
  </div>
  </body>
  </html>
