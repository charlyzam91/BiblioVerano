<?php 
	require 'Connections/conexion.php';
  require 'RutinasDAO/seleccion.php';
	require 'RutinasDAO/Editar.php';


 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
  <link rel="stylesheet" href="css/sweetalert.css">  
  <link rel="stylesheet" href="css/cssbotones.css" />
  <script src="js/sweetalert-dev.js"></script>  

	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script src="js/table.js"></script>
</head>
<body>

<?php

if (isset($_GET['Baja'])) {
  if (Revisa_Planeacion_Personal($_GET['Baja'])==0){
    if (baja_personal($_GET['Baja'])==0){
      echo "<script> swal('Error al dar de baja el registro ', '', 'error');</script>";
      }else{
        echo "<script> swal('Registro dado de baja !', '', 'success');</script>";
      }
  }else{
    echo "<script> swal('La persona tiene una planeacion activa ', '', 'error');</script>";
  }
  
}


?>

	<form name="form1" action="EscribirPersonan.php" method="POST">
			<br>
Alta de Personal Nuevo: 
<br>
<table  border="0">
  <tbody>
    <tr>
      <td >Nombre: </td>
    </tr>
    <tr>
      <td ><input type="text" name="NuePersona" class="text"> </td>
      <td><button type="submit" value="" class="botonOK" ><span class="material-symbols-outlined">save_as</span></button></td>
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
				<td><a href=personal.php?Baja=".$fila['id']." ><span class='material-symbols-outlined'>delete</span></a></td>				
			</tr> "; 
				
     		 }
		?>

  </tbody>
  </table>



	</form>
</body>
</html>