<?php 
	require 'Connections/conexion.php';
	require 'RutinasDAO/Editar.php';

	if (isset($_GET['Baja'])) {
		if (baja_personal($_GET['Baja'])==0){
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
	<form name="form1" action="EscribirPersonan.php" method="POST">
			<br>
Alta de Personal Nuevo: 
<br>
<table  border="0">
  <tbody>
    <tr>
      <td align="center" >Nombre: </td>
    </tr>
    <tr>
      <td align="center" ><input type="text" name="NuePersona"> </td>
      <td><input type="submit" name="Guardar persona" value="Guardar Persona"></td>
    </tr>
    </tbody>
    </table>
    <br>
<br /><hr color="blue" size=3>Personal Ingresado<br />
<br>
<table id="tabla" class="display" cellspacing="0" width="100%">
  <thead>
    <tr>     
      <th>Nombre</th>
      <th></th>
      
    </tr>
  </thead>
  <tbody>
  <?php 

				

		$SQL="SELECT * FROM `personal` WHERE `Estatus`='1'";
       conectar();
       $Res=mysql_query($SQL);
       desconectar();
       while($fila=mysql_fetch_assoc($Res)){
		   
         echo "
			<tr>				
				<td>".$fila['Nombre']."</td>				
				<td><a href=personal.php?Baja=".$fila['id']." >Quitar</a></td>				
			</tr> "; 
				
     		 }
		?>

  </tbody>
  </table>



	</form>
</body>
</html>