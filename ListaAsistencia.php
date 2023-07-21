<?php 
	require 'Connections/conexion.php';

	$grad=$_POST['cmbGrado'];
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
	<link rel="stylesheet" href="css/cssbotones.css" />	
</head>
<body>
<form nam="form1" action="ListaAsistenciaxls.php" method="POST">
<center>
	<table border="1">   
			<tr>
				<td>
				<select name="cmbGrado" required>
	 			<option value=""  >Seleccione el Grado</option>
	 			
		   			
	   			<?php	

	   				switch ($grad) {
	   					case 'P':
	   						echo "
	   			<option value='P' selected>Preescolar</option>
	 			<option value='12'>1° y 2°</option>
	 			<option value='34'>3° y 4°</option>
	 			<option value='56'>5° y 6°</option>
	   						";

	   						break;
	   					case '12':
	   						echo "
	   			<option value='P'>Preescolar</option>
	 			<option value='12' selected>1° y 2°</option>
	 			<option value='34'>3° y 4°</option>
	 			<option value='56'>5° y 6°</option>";
	   						break;
	   					case '34':
	   						echo "
	   			<option value='P'>Preescolar</option>
	 			<option value='12'>1° y 2°</option>
	 			<option value='34' selected>3° y 4°</option>
	 			<option value='56'>5° y 6°</option>";
	   						
	   						break;
	   					case '56':
	   						echo "
	   			<option value='P'>Preescolar</option>
	 			<option value='12'>1° y 2°</option>
	 			<option value='34'>3° y 4°</option>
	 			<option value='56' selected>5° y 6°</option>";
	   						
	   						break;
	   					
	   					default:

	   						echo "
	   			<option value='P'>Preescolar</option>
	 			<option value='12'>1° y 2°</option>
	 			<option value='34'>3° y 4°</option>
	 			<option value='56'>5° y 6°</option>";
	   						
	   						break;
	   				}



		   				/*$SQL="SELECT * FROM `grados`";
		   				conectar();
		   				$Res=mysql_query($SQL);
		   				desconectar();
		   			while($Fila=mysql_fetch_assoc($Res)){
			   			echo  "<option value= '";			   
			   			echo $Fila['Grado']."' ";
						echo(">");		
			  		    echo ($Fila['Descripcion']);			   			   
						echo"</option>";
		   			}*/
					?>
				</select>
				</td>
					</tr>
					<tr>
				<td><button type="submit" onclick="this.form.action='ListaAsistencia.php'" value="Action1" class="botonOK"><span class="material-symbols-outlined">search</span></button>
				 &nbsp&nbsp&nbsp <button type="submit"  value="Action2" class="botonOK"><span class="material-symbols-outlined">download</span> Word </button>	</td>

			</tr>
	</table>
<br/>
<br/>
<br/>


<table>
	<tr>
		<td align="center"><font color="red"><b>MIS VACACIONES EN LA BIBLIOTECA </b></font></td>
	</tr>
	<tr>
		<td align="center"><font color="red"><b>Biblioteca publica municipal "AMADO NERVO"</b></font></td>
	</tr>
	<tr>
	<?php 
		switch ($grad) {
					case 'P':

	   						echo "
	   						<td align='center'><font color='red'><b>Terminaron Preescolar</b></font></td>
	   						";
	   						$sql="select u.id_usuario,u.Nombre, u.A_Paterno, u.A_Materno from ficha f inner join usuarios u on u.id_usuario = f.id_usuario WHERE f.id_grado= 1 and f.estatus =1";

	   						break;
	   					case '12':
	   						
	   						echo "
	   						<td align='center'><font color='red'></b>Terminaron Primero y Segundo</b></font></td>
	   						";
	   						$sql="select u.id_usuario,u.Nombre, u.A_Paterno, u.A_Materno from ficha f inner join usuarios u on u.id_usuario = f.id_usuario WHERE f.id_grado in (2,3) and f.estatus =1";
	   						
	   						break;
	   					case '34':
	   						
	   						echo "
	   						<td align='center'><font color='red'><b>Terminaron Tercero y Cuarto</b></font></td>
	   						";
	   						$sql="select u.id_usuario,u.Nombre, u.A_Paterno, u.A_Materno from ficha f inner join usuarios u on u.id_usuario = f.id_usuario WHERE f.id_grado in (4,5) and f.estatus =1";
	   						
	   						break;
	   					case '56':
	   						
	   						echo "
	   						<td align='center'><font color='red'><b>Terminaron Quinto y Sexto</b></font></td>
	   						";
	   						$sql="select u.id_usuario,u.Nombre, u.A_Paterno, u.A_Materno from ficha f inner join usuarios u on u.id_usuario = f.id_usuario WHERE f.id_grado in (6,7) and f.estatus =1";
	   						
	   						break;
		}

	 ?>
		
	</tr>
</table>

	<?php 

	if (isset($_POST['cmbGrado'])){
		echo"
		<center>
		<table style='text-align: center; width: 65%;' border='1' cellpadding='2' cellspacing='2'>
		<tr>
	<tbody>
		<td>#</td><td>Nombre</td> <td width='20px'>Lu</td><td width='20px'>Ma</td><td width='20px'>Mi</td><td width='20px'>Ju</td><td width='20px'>Vi</td>
		</tr>";

		conectar();
		$res=mysql_query($sql);
		desconectar();
		$i=1;
		while ($fila=mysql_fetch_assoc($res)) {
			echo"
		<tr>
		<td>$i</td> <td  style='text-align: left;' >".utf8_encode($fila['Nombre'])." ".utf8_encode($fila['A_Paterno'])." ".utf8_encode($fila['A_Materno'])."</td> <td width='20px'> </td><td width='20px'> </td><td width='20px'> </td><td width='20px'> </td><td width='20px'> </td>
		</tr>
		";
		$i++;

		}
	}
	 ?>
</tbody> 
</tr>

</table>
</center>

</form>
</body>
</html>