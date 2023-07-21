<?php 
	require 'Connections/conexion.php';


	$grad=$_POST['cmbGrado'];
	header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment; filename=listaAsistencia".$grad.".doc");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<center>
	
<table>
	<tr>
		<td align="center"><font color="red"><b>MIS VACACIONES EN LA BIBLIOTECA 2017</b></font></td>
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
	   						$sql="select u.id_usuario,u.Credencial,u.Nombre, u.A_Paterno, u.A_Materno from usuarios u inner join ficha f on u.id_usuario=f.id_usuario where f.id_grado=1";

	   						break;
	   					case '12':
	   						
	   						echo "
	   						<td align='center'><font color='red'><b>Terminaron Primero y Segundo</b></font></td>
	   						";
	   						$sql="select u.id_usuario,u.Credencial,u.Nombre, u.A_Paterno, u.A_Materno from usuarios u inner join ficha f on u.id_usuario=f.id_usuario where f.id_grado=2 or f.id_grado=3";
	   						
	   						break;
	   					case '34':
	   						
	   						echo "
	   						<td align='center'><font color='red'><b>Terminaron Tercero y Cuarto</b></font></td>
	   						";
	   						$sql="select u.id_usuario,u.Credencial,u.Nombre, u.A_Paterno, u.A_Materno from usuarios u inner join ficha f on u.id_usuario=f.id_usuario where f.id_grado=4 or f.id_grado=5";
	   						
	   						break;
	   					case '56':
	   						
	   						echo "
	   						<td align='center'><font color='red'><b>Terminaron Quinto y Sexto</b></font></td>
	   						";
	   						$sql="select u.id_usuario,u.Credencial,u.Nombre, u.A_Paterno, u.A_Materno from usuarios u inner join ficha f on u.id_usuario=f.id_usuario where f.id_grado=6 or f.id_grado=7";
	   						
	   						break;
		}

	 ?>
		
	</tr>
</table>

	<?php 

	if (isset($_POST['cmbGrado'])){
		echo"
		<center>
		<table style='text-align: center; width: 90%;' border='1' cellpadding='2' cellspacing='2'>
		<tr>
	<tbody>
		<td>#</td><td>Nombre</td> <td width='40px'>Lu</td><td width='40px'>Ma</td><td width='40px'>Mi</td><td width='40px'>Ju</td><td width='40px'>Vi</td>
		</tr>";

		conectar();
		$res=mysql_query($sql);
		desconectar();
		$i=1;
		while ($fila=mysql_fetch_assoc($res)) {
			echo"
		<tr>
		<td>$i</td> <td  style='text-align: left;' >".$fila['Nombre']." ".$fila['A_Paterno']." ".$fila['A_Materno']."</td> <td width='40px'> </td><td width='40px'> </td><td width='40px'> </td><td width='40px'> </td><td width='40px'> </td>
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