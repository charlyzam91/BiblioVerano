<?php 
		$usuario=$_GET['usua'];
		require 'Connections/conexion.php';
		require 'RutinasDAO/seleccion.php';
		
		 $sql="SELECT u.*, es.*, g.*,t.* FROM `usuarios` u
				inner join ficha f on u.id_usuario=f.id_usuario
				inner join escuelas es on f.id_escuela=es.id_escuela
				inner join grados g on f.id_grado=g.Grado
				inner join turnos t on f.id_horario=t.id_turno where u.id_usuario='$usuario' order by f.id_ficha desc";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		
		$fila=mysql_fetch_assoc($res);		               
        
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
	 <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
  <link rel="stylesheet" href="css/sweetalert.css">  
  <link rel="stylesheet" href="css/cssbotones.css" />
  <link rel="stylesheet" href="css/cssText.css" />

  <script src="js/sweetalert-dev.js"></script>
<link rel="stylesheet" href="css/sweetalert.css">  
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

 </head>
 <body>


 <?php

if(revisarFicha($usuario)==0){

}else{
    echo "<script> swal('El Usuario ya tiene una ficha activa', '', 'error');</script>";
    echo "<meta HTTP-EQUIV='REFRESH' CONTENT='4;URL=presentacion.php'/> ";
}

?>


 <form name=" form1" action="Registra_Ficha_Nueva.php" method="POST">

 		<table border="0">
 			<tr>
 				<td ># Usuario</td>
 				<td >Num. Credencial</td>
 				<td >Nombre</td>
 				<td >Apellido Paterno</td>
 				<td >Apellido Materno</td>
 				<td >Edad</td>
 				
 				
 				
 			</tr>

 			<tr>
				<td ><input type="text" class = "text" name="txtIdUsuario"   readonly  size="3" value="<?php echo $usuario ;  ?>" ></td>	
 				<td ><input type="text" class = "text" name="txtCredencial" placeholder="Credencial" value="<?php echo $fila['Credencial']; ?>"  ></td>
 				<td ><input type="text" class = "text" name="txtNombre" placeholder="Nombre"  value="<?php echo $fila['Nombre']; ?>" required></td>
 				<td ><input type="text"  class = "text" name="txtApat"  placeholder="Apellido Paterno" required value="<?php echo $fila['A_Paterno']; ?>" ></td>
 				<td ><input type="text"  class = "text" name="txtAmat"  placeholder="Apellido Materno" required value="<?php echo $fila['A_Materno']; ?>" ></td>
 				<td ><input type="text"  class = "text" name="txtEdad"  placeholder="Edad" size="5" required value="<?php echo $fila['Edad']; ?>" ></td>
 				
 				
 				
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
 			<td ><input type="text"  class = "text" name="txtCalle"  placeholder="Calle" required value="<?php echo $fila['Calle'];  ?>" ></td>
 			<td ><input type="text"  class = "text" name="txtNumCall" placeholder="# externo" size="4" required  value="<?php echo $fila['Num_ext'];  ?>" ></td>
 				<td ><input type="text"  class = "text" name="txtColon"  placeholder="Colonia" required value="<?php echo $fila['Colonia'];  ?>" ></td>
 				<td ><input type="text"  class = "text" name="txtCiudad"  placeholder="Cuidad" required value="<?php echo $fila['Ciudad'];  ?>" ></td> 				
 				
 				
 				
 				
 				
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
			<td ><select name="cmbEscuela">
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
 				<td ><input type="text"  class = "text" name="txtRespon"  placeholder="Tutor"  required value="<?php echo $fila['Tutor'];?>" ></td>
 				<td ><input type="text"  class = "text" name="txtTelef"  placeholder="Telefono" required value="<?php echo $fila['Telefono'];  ?>" ></td>
 				<td ><input type="text"  class = "text" name="txtmail"  placeholder="Correo" value="<?php echo $fila['E_Mail'];  ?>" ></td>
 				


 			</tr>
			</table>
			<br/>
			<table>
			<tr>
				<td >Sexo</td>
 				<td >Turno</td>
			</tr>
			<?php 
			if ($fila['Sexo']==1){
				$selmas="selected";
			} elseif ($fila['Sexo']==2) {
				$selfem="selected";
			}


			 ?>
			<tr>
				<td ><select name="cmbSex1">
 					<option value="" required>Seleccione el genero</option>
 					<option value="1" <?php echo $selmas; ?> >Masculino</option>
 					<option value="2" <?php echo $selfem; ?> >Femenino</option>
 				</select></td>
 				<td ><select name="cmbTurno1">
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
		<button type="submit" value="" class="botonOK" ><span class="material-symbols-outlined">save_as</span></button>
<a href="presentacion.php" target=Acciones class="botonCanc"><span class="material-symbols-outlined">Cancel</span></a>

</form>
 </body>
 </html>

