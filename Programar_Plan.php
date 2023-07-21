<?php 
	require 'Connections/conexion.php';
	require 'RutinasDAO/Editar.php';

	if (isset($_GET['Baja'])) {		  
		if (baja_planeacion($_GET['Baja'])==0){
			echo "Error al eliminar";
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script src="js/table.js"></script>
</head>
<body>
<form name="form1" action="EscribirPlan.php" method="POST">

<br>
Planeación Nueva: 
<br>
<table  border="0">
  <tbody>
    <tr>
      <td align="center" >Persona</td>
      <td align="center" >Semana</td>
      <td align="center" >Grado</td>
      <td align="center" >Turno</td>
    </tr>
    <tr>
      <td>
      	<select name="cmbPersona" required>
	 	<option value=""  >Seleccione la persona</option>
		   <?php		   
		   $SQL="SELECT * FROM `personal` where `Estatus`=1";
		   conectar();
		   $Res=mysql_query($SQL);
		   desconectar();
		   while($Fila=mysql_fetch_assoc($Res)){
			   echo  "<option value= '";			   
			   echo $Fila['id']."' ";					
					echo(">");					 			
			  		   echo ($Fila['Nombre']);			   			   
				echo"</option>";			  			   			
		   	}
				?>
			</select>


      </td>
      <td>
      	<select name="cmbSemana" required>
	 	<option value=""  >Seleccione la Semana</option>
		   <?php		   
		   $SQL="SELECT * FROM `semanas`";
		   conectar();
		   $Res=mysql_query($SQL);
		   desconectar();
		   while($Fila=mysql_fetch_assoc($Res)){
			   echo  "<option value= '";			   
			   echo $Fila['id_semana']."' ";					
					echo(">");					 			
			  		   echo ($Fila['Descripcion']);			   			   
				echo"</option>";			  			   			
		   	}
				?>
			</select>
      </td>

      <td><select name="cmbGrado" required>
	 	<option value=""  >Seleccione el Grado</option>
		   <?php		   
		   $SQL="SELECT * FROM `grados`";
		   conectar();
		   $Res=mysql_query($SQL);
		   desconectar();
		   while($Fila=mysql_fetch_assoc($Res)){
			   echo  "<option value= '";			   
			   echo $Fila['Grado']."' ";
					echo(">");		
			  		   echo ($Fila['Descripcion']);			   
			   
				echo"</option>";			  			   			
		   	}
				?>
			</select>
		</td>


      <td>
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
</select>


      </td>

      <td><input type="submit" name="Guardar Registro" value="Guardar Plan"></td>
    </tr>
  </tbody>
</table>
<br>
<br /><hr color="blue" size=3>Planeaciones Asignadas<br />
<br>
<table id="tabla" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th>Persona</th>
      <th>Semana</th>
      <th>Grado</th>
      <th>Turno</th>      
      <th></th>
    </tr>
  </thead>
  <tbody>
  <?php 

				

		$SQL="select p.id_plan, pnl.Nombre as Persona, sem.Descripcion as Semana, gra.descripcion as Grado, tur.descripcion as Turno 
				from planeacion p
				inner join personal pnl on p.id_persona= pnl.id
				inner join semanas sem on p.id_semana=sem.id_semana
				inner join grados gra on p.id_grado=gra.id_grado
				inner join turnos tur on p.id_turno=tur.id_turno where p.estatus=1";
       conectar();
       $Res=mysql_query($SQL);
       desconectar();
       while($fila=mysql_fetch_assoc($Res)){
		   
         echo "
			<tr>
				<td>".$fila['Persona']."</td>
				<td>".$fila['Semana']."</td>
				<td>".$fila['Grado']."</td>
				<td>".$fila['Turno']."</td>				
				<td><a href=programar_Plan.php?Baja=".$fila['id_plan'].">Quiar</a></td>				
			</tr> "; 
				
     		 }
		?>

  </tbody>
  </table>

</form>
</body>
</html>