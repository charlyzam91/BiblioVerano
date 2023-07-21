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
 </head>
 <body>
 <form name=" form1" action="Asignar_Ficha.php" method="POST">

 		<table border="0">
 			<tr>
 				<td align="center">Num. Credencial</td>
 				<td align="center">Nombre</td>
 				<td align="center">Apellido Paterno</td>
 				<td align="center">Apellido Materno</td>
 				<td align="center">Edad</td>
 				
 				
 				
 			</tr>

 			<tr>
 				<td align="center"><input type="text" name="txtCredencial" placeholder="Credencial" ></td>
 				<td align="center"><input type="text" name="txtNombre" placeholder="Nombre" required></td>
 				<td align="center"><input type="text" name="txtApat" placeholder="Apellido Paterno" required></td>
 				<td align="center"><input type="text" name="txtAmat" placeholder="Apellido Materno" required></td>
 				<td align="center"><input type="text" name="txtEdad" placeholder="Edad" size="5" required></td>
 				
 				
 				
 			</tr>
</table>
<br/>
<table border="0">
 			<tr>
 			<td align="center">Grado Terminado</td>
 			<td align="center">Calle</td>
 			<td align="center">#</td> 
 				<td align="center">Colonia</td>
 				<td align="center">Ciudad</td>
 				
 				
 				
 				
 								
 			</tr>

 			<tr>
 			<td align="center"><select name="cmbGrado">
	 	<option value="" required>Seleccione el Grado</option>
		   <?php		   
		   $SQL="SELECT * FROM `grados`";
		   conectar();
		   $Res=mysql_query($SQL);
		   desconectar();
		   while($Fila=mysql_fetch_assoc($Res)){
			   echo  "<option value= '";			   
			   echo $Fila['Grado']."' ";
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
 			<td align="center"><input type="text" name="txtCalle" placeholder="Calle" required></td>
 			<td align="center"><input type="text" name="txtNumCall" placeholder="# externo" size="4" required></td>
 				<td align="center"><input type="text" name="txtColon" placeholder="Colonia" required></td>
 				<td align="center"><input type="text" name="txtCiudad" placeholder="Cuidad" required></td> 				
 				
 				
 				
 				
 				
 			</tr>
</table>
<br/>
<table border="0">
 			<tr>
				<td align="center">Escuela de Procedencia</td>
 				<td align="center">Nombre (Padre / Madre / Tutor)</td>
 				<td align="center">Telefono</td>
 				<td align="center">Correo Electronico</td>
 				  				 								
 			</tr>

 			<tr>
			<td align="center"><select name="cmbEscuela">
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
			  		  echo ($Fila['Descripcion']);			   			   
				echo"</option>";			  			   			
		   		}
				?>
					</select></td>
 				<td align="center"><input type="text" name="txtRespon" placeholder="Tutor" required></td>
 				<td align="center"><input type="text" name="txtTelef" placeholder="Telefono" required></td>
 				<td align="center"><input type="text" name="txtmail" placeholder="Correo"></td>
 				


 			</tr>
			</table>
			<br/>
			<table>
			<tr>
				<td align="center">Sexo</td>
 				<td align="center">Turno</td>
			</tr>
			<tr>
				<td align="center">
				<select name="cmbSex1" required>
 					<option value="" >Seleccione el genero</option>
 					<option value="1">Masculino</option>
 					<option value="2">Femenino</option>
 				</select></td>
 				<td align="center">
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
<center><input type="submit" name="Guardar Registro" value="Guardar Registro"> 
&nbsp&nbsp&nbsp&nbsp&nbsp


<a href="presentacion.php"<input type="button" name="cancelar Registro" value="Cancelar Registro">Cancelar</a>

</form>
 </body>
 </html>