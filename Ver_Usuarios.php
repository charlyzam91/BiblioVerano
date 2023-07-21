<?php

	require_once('Connections/conexion.php');
	error_reporting(0);
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
<table id="tabla" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>
		<th></th>
      <th>Credencial</th>
      <th>Nombre</th>
      <th>Apellido Paterno</th>
      <th>Apellido Materno</th>
      <th>Edad</th>
      <th>Escuela de Procedencia</th>
	  <th>Grado Terminado</th>
	  <th>Horario</th>
      <th>Calle</th>
      <th>#</th>
      <th>Colonia</th>
      <th>Ciudad</th>
      <th>Tutor</th>
      <th>Telefono</th>
      <th>Correo</th>
      <th>Sexo</th>
      <th>Fecha de Registro</th>
   

    </tr>
  </thead>
  <tbody>

			<?php 

				

		$SQL="SELECT u.*, es.descripcion as Escuela, g.Descripcion as Grado_Terminado,t.descripcion as Horario FROM `usuarios` u
				inner join ficha f on u.id_usuario=f.id_usuario
				inner join escuelas es on f.id_escuela=es.id_escuela
				inner join grados g on f.id_grado=g.Grado
				inner join turnos t on f.id_horario=t.id_turno where u.id_usuario != 1 and f.Estatus=1";
       conectar();
       $Res=mysql_query($SQL);
       desconectar();
       while($fila=mysql_fetch_assoc($Res)){
		   
         echo "
			<tr>
				
				<td><a href=Editar_Ficha.php?usua=".$fila['id_usuario'].">Editar</a></td>
				<td>".$fila['Credencial']."</td>
				<td>".$fila['Nombre']."</td>
				<td>".$fila['A_Paterno']."</td>
				<td>".$fila['A_Materno']."</td>
				<td>".$fila['Edad']."</td>
				<td>".$fila['Escuela']."</td>
				<td>".$fila['Grado_Terminado']."</td>
				<td>".$fila['Horario']."</td>
				<td>".$fila['Calle']."</td>
				<td>".$fila['Num_ext']."</td>
				<td>".$fila['Colonia']."</td>
				<td>".$fila['Ciudad']."</td>
				<td>".$fila['Tutor']."</td>
				<td>".$fila['Telefono']."</td>
				<td>".$fila['E_Mail']."</td>
				";
				if ($fila['Sexo']==1){
					echo "<td> Masculino </td>";
				}elseif ($fila['Sexo']==2){
					echo "<td> Femenino </td>";
				}

				echo "				
				<td>".$fila['Fecha_Registro']."</td>
			</tr> "; 
				
       }
					 ?>



		</tbody>
  
</table>

</body>
</html>