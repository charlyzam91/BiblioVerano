<?php 
	require 'Connections/conexion.php';
	require 'RutinasDAO/seleccion.php';

	$grado=$_GET['grad'];
		session_start();
		$_SESSION['grado'] = $grado;
		$_SESSION['UsuaProx']= id_usuario_prox();


	if($grado=='1'){
		$sig="PRES";
	}else{
		$sig="PRIM";
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 

 <title></title>

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
<link rel="stylesheet" href="css/cssbotones.css" />
<link rel="stylesheet" href="css/cssText.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 </head>
 <body>
 <form name="form1" action="Asignar_Ficha.php" method="POST">

 		<table border="0">
 			<tr>
 				<td >Num. Credencial</td>
 				<td >Nombre</td>
 				<td >Apellido Paterno</td>
 				<td >Apellido Materno</td>
 				<td >Edad</td>
 				
 				
 				
 			</tr>

 			<tr>
 				<td ><input type="text" class= "text" name="txtCredencial" placeholder="Credencial" ></td>
 				<td ><input type="text" class= "text" name="txtNombre" placeholder="Nombre" required></td>
 				<td ><input type="text" class= "text" name="txtApat" placeholder="Apellido Paterno" required></td>
 				<td ><input type="text" class= "text" name="txtAmat" placeholder="Apellido Materno" required></td>
 				<td ><input type="text" class= "text" name="txtEdad" placeholder="Edad" size="5" required></td>
 				
 				
 				
 			</tr>
</table>
<br/>
<table border="0">
 			<tr>
 			<td >Grado Terminado</td>
 			<td >Calle</td>
 			<td >#</td> 
 				<td >Colonia</td>
 				<td >Ciudad</td>
 				
 				
 				
 				
 								
 			</tr>

 			<tr>
 			<td ><select name="cmbGrado" class= "text">
	 	<option value="" required>Seleccione el Grado</option>
		   <?php		   
		   $SQL="SELECT * FROM `grados`";
		   conectar();
		   $Res=mysql_query($SQL);
		   desconectar();
		   while($Fila=mysql_fetch_assoc($Res)){
			   echo  "<option value= '";			   
			   echo utf8_encode($Fila['Grado'])."' ";
					if ($Fila['Grado']==$grado){
					echo("selected >");
					}else{
					echo(">");
					}
					 			
			  		   echo ($Fila['Descripcion']);			   
			   
			echo"</option>";			  			   			
		   }
			?>
		</select></td>
 			<td ><input type="text"  class= "text" name="txtCalle" placeholder="Calle" required></td>
 			<td ><input type="text"  class= "text" name="txtNumCall" placeholder="# externo" size="4" required></td>
 				<td ><input type="text"  class= "text" name="txtColon" placeholder="Colonia" required></td>
 				<td ><input type="text"  class= "text" name="txtCiudad" placeholder="Cuidad" required></td> 				
 				
 				
 				
 				
 				
 			</tr>
</table>
<br/>
<table border="0">
 			<tr>
				<td >Escuela de Procedencia</td>
 				<td >Nombre (Padre / Madre / Tutor)</td>
 				<td >Telefono</td>
 				<td >Correo Electronico</td>
 				  				 								
 			</tr>

 			<tr>
			<td ><select name="cmbEscuela" class= "text">
	 			<option value="" required>Seleccione una escuela</option>
		  			 <?php		   
		  			 echo $SQL="SELECT * FROM `escuelas` where `Tipo` = '$sig'";
		   			conectar();
		   			$Res=mysql_query($SQL);
		   			desconectar();
		   			while($Fila=mysql_fetch_assoc($Res)){
			  		 echo  "<option value='";			   
			  		 echo $Fila['id_escuela']."' ";			   
					 echo(">");			
			  		  echo (utf8_encode($Fila['Descripcion']));			   			   
				echo"</option>";			  			   			
		   		}
				?>
					</select></td>
 				<td ><input type="text"  class= "text" name="txtRespon" placeholder="Tutor" required></td>
 				<td ><input type="text"  class= "text" name="txtTelef" placeholder="Telefono" required></td>
 				<td ><input type="text"  class= "text" name="txtmail" placeholder="Correo"></td>
 				


 			</tr>
			</table>
			<br/>
			<table>
			<tr>
				<td >Sexo</td>
 				<td >Turno</td>
			</tr>
			<tr>
				<td >
				<select name="cmbSex1" required class= "text">
 					<option value="" >Seleccione el genero</option>
 					<option value="1">Masculino</option>
 					<option value="2">Femenino</option>
 				</select></td>
 				<td >
				<select name="cmbTurno1" required>
	 	<option value="" >Seleccione el Turno</option>
		   <?php		   
		   $SQL="SELECT * FROM `Turnos`";
		   conectar();
		   $Res=mysql_query($SQL);
		   desconectar();
		   while($Fila=mysql_fetch_assoc($Res)){
			   echo  "<option value= '";			   
			   echo $Fila['id_turno']."' ";			   
					 echo(">");			
			  		   echo ($Fila['Descripcion']);			   
			   
			echo"</option>";			  			   			
		   }
			?>
</select></td>  	
			</tr>

 		</table>
		<br/><br/>
<center>
	<!-- <input type="submit" name="Guardar Registro" value="Guardar Registro" >  -->


</form>

<button type="submit" value="" class="botonOK" ><span class="material-symbols-outlined">save_as</span></button>
<a href="presentacion.php" target=Acciones class="botonCanc"><span class="material-symbols-outlined">Cancel</span></a>
 </body>
 </html>