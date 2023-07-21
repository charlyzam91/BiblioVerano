<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>

	<script src="js/sweetalert-dev.js"></script>  
    <link rel="stylesheet" href="css/sweetalert.css">  

</head>
<body>

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

			echo "<script> swal('Registrado Correctamente !', '', 'success');</script>";
	}else{
//		echo "Error al ingresar planeacion";
echo "<script> swal('Error al Realizar el registar Planecion', '', 'error');</script>";
	}
	}else{
	//	echo "La planeacion seleccionada ya existe";
	echo "<script> swal('Planeacion ya existente !', '', 'info');</script>";
	}

 ?>


<meta HTTP-EQUIV="REFRESH" CONTENT="2;URL=programar_plan.php"/> 
	
</body>
</html>