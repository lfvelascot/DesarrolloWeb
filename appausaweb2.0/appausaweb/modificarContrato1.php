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
  $con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
  mysqli_set_charset($con,"utf8");
  $contrato = $_GET['num'];
  $empresa = $_GET['empresa'];
  $sql="SELECT * from contrato where num_contrato = $contrato AND empresa = '$empresa' AND e = 1;";
  $result=mysqli_query($con,$sql);
  if(mysqli_num_rows($result) != 0){
		while($mostrar=mysqli_fetch_array($result)){
			$arl = $mostrar['arl'];
			$cajacom = $mostrar['caja_compensación'];
			$fondopen = $mostrar['fondo_pensiones'];
			$eps = $mostrar['eps'];
  ?>
  <div id="apDiv1">
  <h1 align="center">Modificar Contrato</h1>
  <div id="apDiv2">
  <h2>Datos de Contrato</h2>
  <form>
  <table width="900" height="550" border="0">
    <tr>
      <td><p>Num. Contrato:</p></td>
      <td><input type="number" value="<?php echo $mostrar['num_contrato'];?>" name="cnumcontrato" autofocus required /></td>
    </tr>
    <tr>
      <td><p>NIT Empresa:</p></td>
      <td><input type="text" value="<?php echo $mostrar['empresa'];?>" name="cnitempresa" pattern="^[0-9]{0,14}+-[{0-9}]$" autofocus required /></td>
    </tr>
      <tr>
      <td><p>Documento Empleado:</p></td>
      <td><input type="text" value="<?php echo $mostrar['empleado'];?>" name="cdocumentoemp" pattern="^((\d{8})|(\d{10})|(\d{11})|(\d{6}-\d{5}))?$" autofocus required /></td>
    </tr>
    <tr>
      <td><p>Tipo Contrato:</p></td>
      <td><select name="ctipocontrato">
      <option value="0">Seleccionar</option>
      <option selected value=<?php echo $mostrar['tipo_contrato'];?>><?php echo $mostrar['tipo_contrato'];?></option>
          <?php 
          $sql="SELECT * from $bd.tipo_contrato;";
          $result=mysqli_query($con,$sql);
          while($mostrar2=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar2['nombre'] ?>"><?php echo $mostrar2['nombre'] ?></option>
           <?php } ?>
           </select>
    </tr>
    <tr>
      <td><p>Cargo:</p></td>
      <td><input type="text" value="<?php echo $mostrar['cargo'];?>" name="ccargo" autofocus required /></td>
    </tr>
    <tr>
      <td><p>Fecha Inicio:</p></td>
      <td><input type="date" value="<?php echo $mostrar['fecha_inicio'];?>" name="cfechainin" autofocus required /></td>
    </tr>
    <tr>
      <td><p>Fecha Fin:</p></td>
	<?php if (is_null($mostrar['fecha_fin'])){ ?>
	<td><input type="date" value="<?php echo "";?>" name="cfechafin" autofocus  /></td>
	<?php } else { ?>
	<td><input type="date" value="<?php echo $mostrar['fecha_fin'];?>" name="cfechafin" autofocus  /></td>
	<?php } ?>		
    </tr>
    <tr>
      <td><p>Sueldo ($):</p></td>
      <td><input type="number" value="<?php echo $mostrar['sueldo'];?>" name="csueldo" /></td>
    </tr>
    <tr>
      <td><p>Funciones:</p></td>
      <td><textarea name="cfunciones" rows="5" cols="100"><?php echo $mostrar['funciones']; ?></textarea></td>
    </tr>
    <tr>
      <td><p>EPS:</p></td>
      <td><select name="ceps">
      <option value="0">Seleccionar</option>
      <?php
      	$sql="SELECT nombre_entidad from entidad where nit = $eps AND e = 1;";
  		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){ 
		while($mostrar1=mysqli_fetch_array($result)){?>
        	<option selected value=<?php echo $mostrar['eps'];?>><?php echo $mostrar1['nombre_entidad'];?></option>
		<?php }
	}?>
          <?php 
          $sql="SELECT * from $bd.entidad WHERE tipo = 'EPS' AND e = 1;";
          $result=mysqli_query($con,$sql);
          while($mostrar3=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar3['nit'] ?>"><?php echo $mostrar3['nombre_entidad'] ?></option>
           <?php } ?>
           </select>
      </td>
    </tr>
    <tr>
      <td><p>ARL:</p></td>
      <td><select name="carl">
      <option value="0">Seleccionar</option>
        <?php
      	$sql="SELECT nombre_entidad from entidad where nit = $arl AND e = 1;";
  		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){ 
		while($mostrar1=mysqli_fetch_array($result)){?>
        	<option selected value=<?php echo $mostrar['arl'];?>><?php echo $mostrar1['nombre_entidad'];?></option>
		<?php }
	}?>>
          <?php 
          $sql="SELECT * from $bd.entidad WHERE tipo = 'ARL' AND e = 1;";
          $result=mysqli_query($con,$sql);
          while($mostrar3=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar3['nit'] ?>"><?php echo $mostrar3['nombre_entidad'] ?></option>
           <?php } ?>
    </select></tr>
    <tr>
      <td><p>Caja de Compensación:</p></td>
      <td><select name="ccajacompensacion">
      <option value="0">Seleccionar</option>
        <?php
      	$sql="SELECT nombre_entidad from entidad where nit = $cajacom AND e = 1;";
  		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){ 
		while($mostrar1=mysqli_fetch_array($result)){?>
        	<option selected value=<?php echo $mostrar['caja_compensación'];?>><?php echo $mostrar1['nombre_entidad'];?></option>
		<?php }
	}?>>
          <?php 
          $sql="SELECT * from $bd.entidad WHERE tipo = 'CAJA DE COMPENSACIÓN' AND e = 1;";
          $result=mysqli_query($con,$sql);
          while($mostrar3=mysqli_fetch_array($result)){
           ?>
           <option value="<?php echo $mostrar3['nit'] ?>"><?php echo $mostrar3['nombre_entidad'] ?></option>
           <?php } ?>
  </select></td>
    </tr>
    <tr>
      <td><p>Fondo de Pensiones :</p></td>
      <td><select name="cfondopensiones">
      <option value="0">Seleccionar</option>
        <?php
      	$sql="SELECT nombre_entidad from entidad where nit = $fondopen AND e = 1;";
  		$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result) != 0){ 
		while($mostrar1=mysqli_fetch_array($result)){?>
        	<option selected value=<?php echo $mostrar['fondo_pensiones'];?>><?php echo $mostrar1['nombre_entidad'];?></option>
		<?php }
	}?>>
          <?php 
          $sql="SELECT * from $bd.entidad WHERE tipo = 'FONDO DE PENSIONES' AND e = 1;";
          $result=mysqli_query($con,$sql);
          while($mostrar3=mysqli_fetch_array($result)){?>
           <option value="<?php echo $mostrar3['nit'] ?>"><?php echo $mostrar3['nombre_entidad'] ?></option>
		   <?php } } }
		   mysqli_close($con);
		   ?>
  </select></td>
    </tr>
  </table>
  <p align="center">
    <button type="submit" name="add">Modificar Contrato</button></p>
  </form>
  <?php
  include_once("conexion.php");
  include_once("date.php");
  $con=mysqli_connect($host,$usuario,$clave,$bd) or die('Fallo la conexion');
  mysqli_set_charset($con,"utf8");
  if (isset($_GET['add'])) {
      $vnumcontrato = $_GET['cnumcontrato'];
      $vnitempresa = $_GET['cnitempresa'];
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
	  $select = "SELECT rol from usuario where cc = '$vdocempleado';";
      $result=mysqli_query($con,$select);
	  if(mysqli_num_rows($result) != 0){
          while($mostrar=mysqli_fetch_array($result)){
			  $rol = $mostrar['rol'];
		}
		if ($vtipocontrato == "Definido" & !empty($_GET['cfechainin']) & !empty($_GET['cfechafin']) & ($rol == "EMPLEADO" | $rol == "TALENTO HUMANO")){
			$inserta = "UPDATE $bd.contrato SET num_contrato = '$vnumcontrato', empleado = '$vdocempleado', empresa = '$vnitempresa', cargo = '$vcargo', fecha_inicio = '$vfechaini', fecha_fin = '$vfechafin', sueldo = '$vsueldo', funciones = '$vfunciones', arl = '$varl', caja_compensación = '$vcajacompensacion', fondo_pensiones = '$vfondopensiones', eps = '$veps', tipo_contrato = '$vtipocontrato' WHERE num_contrato = '$vnumcontrato' AND empresa = '$vnitempresa';";
			if (mysqli_query($con,$inserta)){
				include_once("date.php");
          		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Modificado Exitoso','Se Modificaron los datos del Contrato: $vnumcontrato de la Empresa : $vnitempresa',1);";
          		mysqli_query($con,$inserta);
          		mysqli_close($con);
          		header("Location: buscarContrato.php?ccontrato=$vnumcontrato&cempresa=$vnitempresa&buscar=");
          		die();
			} else {
				include_once("date.php");
				$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Modificado Fallido','Conflico con los datos del contrato('$vnumcontrato','$vdocempleado','$vnitempresa','$vcargo','$vfechaini','$vfechafin','$vsueldo','$vfunciones','$varl','$vcajacompensacion','$vfondopensiones','$veps','$vtipocontrato')',1);";
				mysqli_query($con,$inserta);
				mysqli_close($con);
				header("Location: modificarContrato.php");
				die();
			}
		} elseif(($vtipocontrato == "Obra Labor" | $vtipocontrato == "Indefinido") & !empty($_GET['cfechainin']) & empty($_GET['cfechafin']) & ($rol == "EMPLEADO" | $rol == "TALENTO HUMANO")) {
			$inserta = "UPDATE $bd.contrato SET num_contrato = '$vnumcontrato', empleado = '$vdocempleado', empresa = '$vnitempresa', cargo = '$vcargo', fecha_inicio = '$vfechaini', fecha_fin = NULL, sueldo = '$vsueldo', funciones = '$vfunciones', arl = '$varl', caja_compensación = '$vcajacompensacion', fondo_pensiones = '$vfondopensiones', eps = '$veps', tipo_contrato = '$vtipocontrato' WHERE num_contrato = '$vnumcontrato' AND empresa = '$vnitempresa';";
			if (mysqli_query($con,$inserta)){
				include_once("date.php");
          		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Modificado Exitoso','Se Modificaron los datos del Contrato: $vnumcontrato de la Empresa : $vnitempresa',1);";
          		mysqli_query($con,$inserta);
          		mysqli_close($con);
          		header("Location: buscarContrato.php?ccontrato=$vnumcontrato&cempresa=$vnitempresa&buscar=");
          		die();
      		} else {
				include_once("date.php");
          		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Modificado Fallido','Conflico con los datos del contrato('$vnumcontrato','$vdocempleado','$vnitempresa','$vcargo','$vfechaini','$vfechafin','$vsueldo','$vfunciones','$varl','$vcajacompensacion','$vfondopensiones','$veps','$vtipocontrato')',1);";
          		mysqli_query($con,$inserta);
         		mysqli_close($con);
          		header("Location: modificarContrato.php");
          		die();
  			}
		} else {
			include_once("date.php");
			$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Añadido Fallido','Trato de ingresar el contrato de un Administrado : $vdocempleado',1);";
			mysqli_query($con,$inserta);
			mysqli_close($con);
			header("Location: modificarContrato.php");
			die();
		}	
	  } else {
		  include_once("date.php");
		$inserta = "INSERT INTO $bd.log VALUES ('$user_ses','$f','Contrato Añadido Fallido','No hay ningun Empleado con el documento: $vdocempleado',1);";
        mysqli_query($con,$inserta);
        mysqli_close($con);
		header("Location: modificarContrato.php");
		die();
	  }
  }
  ?>
  </div>
  </div>
  </body>
  </html>
