<?php 
	
	require 'Connections/conexion.php';
	require 'RutinasDAO/insersion.php';

	$nombre=$_POST['NuePersona'];

	if (inserta_personal($nombre)==1) {
					//echo "Correcto";
					echo '<center><h1>Personal Agregado</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
	}else{
		//echo "Error al ingresar persona";
					echo '<center><h1>Error al ingresar persona</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
		
	}

 ?>