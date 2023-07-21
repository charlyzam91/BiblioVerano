<?php 
		$usuario=$_GET['usua'];
		require 'Connections/conexion.php';
		require 'RutinasDAO/seleccion.php';
		
		$sql="SELECT u.*, es.*, g.*,t.* FROM `usuarios` u
				inner join ficha f on u.id_usuario=f.id_usuario
				inner join escuelas es on f.id_escuela=es.id_escuela
				inner join grados g on f.id_grado=g.Grado
				inner join turnos t on f.id_horario=t.id_turno where u.id_usuario='$usuario'";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		
		$fila=mysql_fetch_assoc($res);
		echo $nomb=$fila['Nombre'];
		
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <form name=" form1" action="editar_usuario.php" method="POST">

 		<table border="0">
 			<tr>
 				<td align="center"># Usuario</td>
 				<td align="center">Num. Credencial</td>
 				<td align="center">Nombre</td>
 				<td align="center">Apellido Paterno</td>
 				<td align="center">Apellido Materno</td>
 				<td align="center">Edad</td>
 				
 				
 				
 			</tr>

 			<tr>
				<td align="center"><input type="text" name="txtIdUsuario"   readonly  size="3" value="<?php echo $usuario ;  ?>" ></td>	
 				<td align="center"><input type="text" name="txtCredencial" placeholder="Credencial" value="<?php echo $fila['Credencial']; ?>"  ></td>
 				<td align="center"><input type="text" name="txtNombre" placeholder="Nombre"  value="<?php echo $nomb; ?>" required></td>
 				<td align="center"><input type="text" name="txtApat"  placeholder="Apellido Paterno" required value="<?php echo $fila['A_Paterno']; ?>" ></td>
 				<td align="center"><input type="text" name="txtAmat"  placeholder="Apellido Materno" required value="<?php echo $fila['A_Materno']; ?>" ></td>
 				<td align="center"><input type="text" name="txtEdad"  placeholder="Edad" size="5" required value="<?php echo $fila['Edad']; ?>" ></td>
 				
 				
 				
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
					if ($Fila['Grado']==$fila['id_grado']){
					echo("selected >");
					}else{
					echo(">");
					}
					 			
			  		   echo ($Fila['Descripcion']);			   
			   
			echo"</option>";			  			   			
		   }
			?>
</select></td>
 			<td align="center"><input type="text" name="txtCalle"  placeholder="Calle" required value="<?php echo $fila['Calle'];  ?>" ></td>
 			<td align="center"><input type="text" name="txtNumCall" placeholder="# externo" size="4" required  value="<?php echo $fila['Num_ext'];  ?>" ></td>
 				<td align="center"><input type="text" name="txtColon"  placeholder="Colonia" required value="<?php echo $fila['Colonia'];  ?>" ></td>
 				<td align="center"><input type="text" name="txtCiudad"  placeholder="Cuidad" required value="<?php echo $fila['Ciudad'];  ?>" ></td> 				
 				
 				
 				
 				
 				
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
		  			 echo $SQL="SELECT * FROM `escuelas` where `Estatus` = '1'";
		   			conectar();
		   			$Res=mysql_query($SQL);
		   			desconectar();
		   			while($Fila=mysql_fetch_assoc($Res)){
			  		 echo  "<option value='";			   
			  		 echo $Fila['id_escuela']."' ";	
			  		  if ($Fila['id_escuela']==$fila['id_escuela']) {
			   		   	echo("selected >");
			   		   } else{
			   		   	echo(">");
			   		   }			   					 
			  		  echo ($Fila['Descripcion']);			   			   
				echo"</option>";			  			   			
		   		}
				?>
					</select></td>
 				<td align="center"><input type="text" name="txtRespon"  placeholder="Tutor"  required value="<?php echo $fila['Tutor'];?>" ></td>
 				<td align="center"><input type="text" name="txtTelef"  placeholder="Telefono" required value="<?php echo $fila['Telefono'];  ?>" ></td>
 				<td align="center"><input type="text" name="txtmail"  placeholder="Correo" value="<?php echo $fila['E_Mail'];  ?>" ></td>
 				


 			</tr>
			</table>
			<br/>
			<table>
			<tr>
				<td align="center">Sexo</td>
 				<td align="center">Turno</td>
			</tr>
			<?php 
			if ($fila['Sexo']==1){
				$selmas="selected";
			} elseif ($fila['Sexo']==2) {
				$selfem="selected";
			}


			 ?>
			<tr>
				<td align="center"><select name="cmbSex1">
 					<option value="" required>Seleccione el genero</option>
 					<option value="1" <?php echo $selmas; ?> >Masculino</option>
 					<option value="2" <?php echo $selfem; ?> >Femenino</option>
 				</select></td>
 				<td align="center"><select name="cmbTurno1">
	 	<option value="" required>Seleccione el Turno</option>
		   <?php		   
		   $SQL="SELECT * FROM `Turnos`";
		   conectar();
		   $Res=mysql_query($SQL);
		   desconectar();
		   while($Fila=mysql_fetch_assoc($Res)){
			   echo  "<option value= '";			   
			   echo $Fila['id_turno']."' ";	
			   if ($Fila['id_turno']==$fila['id_turno']) {
			   		   	echo("selected >");
			   		   } else{
			   		   	echo(">");
			   		   }		   
					 			
			  		   echo ($Fila['Descripcion']);			   
			   
			echo"</option>";			  			   			
		   }
			?>
</select></td>  	
			</tr>

 		</table>
		<br/><br/>
<center><input type="submit" name="Guardar Registro" value="Guardar Registro"> &nbsp &nbsp &nbsp <input type="cancel" name="cancelar" value="Cancelar"></center>

</form>
 </body>
 </html>

