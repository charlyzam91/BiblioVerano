
<!DOCTYPE html>
<html lang="es">
<head>
<script src="js/sweetalert-dev.js"></script>  
<link rel="stylesheet" href="css/sweetalert.css">  
</head>
<body>
<?php
	require 'Connections/conexion.php';
	require 'RutinasDAO/insersion.php';
	require 'RutinasDAO/seleccion.php';
	
	$tipo=$_POST['cmbTipoEsc'];
	$Descri=$_POST['txtNom_Escu'];	
	if (Buscar_Escuela($Descri)==0){
		if (Inserta_Escuela($tipo,$Descri)==1) {
					//echo "Correcto";
					// echo '<center><h1>Escuela Registrada</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
					echo "<script> swal('Registrado Correctamente !', '', 'success');</script>";
		}else{
		//echo "Error al ingresar Escuela";
		//echo '<center><h1>Error al ingresar Escuela </h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
		echo "<script> swal('Error al Realizar el registar ', '', 'error');</script>";
		}
	}else{
		//echo "Escuela ya existente";
		//echo '<center><h1>Escuela ya existente</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
		echo "<script> swal('Escuela ya existente !', '', 'info');</script>";
		
	}
	?>		

<meta HTTP-EQUIV="REFRESH" CONTENT="4;URL=presentacion.php"/> 
</body>
</html>

	
	
	

