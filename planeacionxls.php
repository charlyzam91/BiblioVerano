<?php 
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Planeaciones_Asignadas.xls");

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
			</tr> "; 
				
     		 }
		?>

  </tbody>
  </table>

</form>
</body>
</html>