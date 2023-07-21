<?php 

	require 'Connections/conexion.php';
	require 'RutinasDAO/insersion.php';
	require 'RutinasDAO/seleccion.php';

	$pers=$_POST['cmbPersona'];
	$sem=$_POST['cmbSemana'];
	$grado=$_POST['cmbGrado'];
	$turno=$_POST['cmbTurno1'];


	if (Revisa_Planeacion($pers, $sem, $grado, $turno)==0){
		if (inserta_plan($pers, $sem, $grado, $turno)==1) {
					echo "<script>top.Inicio.document.location.href='principal.php';window.location.assign('Programar_plan.php');</script>";
	}else{
//		echo "Error al ingresar planeacion";
		echo '<center><h1>Error al ingresar planeacion</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
	}
	}else{
	//	echo "La planeacion seleccionada ya existe";
	echo '<center><h1>La planeacion seleccionada ya existe</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
	}

 ?>