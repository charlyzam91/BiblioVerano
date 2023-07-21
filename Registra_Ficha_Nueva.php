<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
		
<script src="js/sweetalert-dev.js"></script>
<link rel="stylesheet" href="css/sweetalert.css">  
<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>
	
<?php 
require 'Connections/conexion.php';
require 'RutinasDAO/Editar.php';
require 'RutinasDAO/insersion.php';
require 'RutinasDAO/seleccion.php';
    


	session_start();		
			$id_usuario=$_POST['txtIdUsuario'];
			$credencial=$_POST['txtCredencial'];
			$nom=strtoupper($_POST['txtNombre']);
			$apat=strtoupper($_POST['txtApat']);
			$amat=strtoupper($_POST['txtAmat']);
			$edad=$_POST['txtEdad'];

			$calle=strtoupper($_POST['txtCalle']);
			$numCall=strtoupper($_POST['txtNumCall']);
			$colon=strtoupper($_POST['txtColon']);
			$ciudad=strtoupper($_POST['txtCiudad']);			
			$escu=$_POST['cmbEscuela'];

			$respon=strtoupper($_POST['txtRespon']);
			$telef=$_POST['txtTelef'];
			$mail=strtoupper($_POST['txtmail']);
			 $sexo=$_POST['cmbSex1'];
			 $turno=$_POST['cmbTurno1'];

			 $grad=$_POST['cmbGrado'];

			$fecha_actual = date("Y-m-d");
        if(revisarFicha($id_usuario)==0){
			if (Editar_Usuario($credencial,$nom,$apat,$amat,$edad,$calle,$numCall,$colon,$ciudad,$respon,$telef,$mail,$sexo,$id_usuario )==1){
				//echo $sig_usu."-".$grad."-".$escu."-".$turno."-".$id_usuario;              
				if (Insert_Ficha($id_usuario,$grad,$escu,$turno)==1){
					//echo "Registro Actualizado Correctamente";
					// if ($mail!=""){
					// 	require('correo.php');
					// }else{
						echo "<script> swal('Registro Guardado Correctamente', '', 'success');</script>";
						// echo '<center><h1>Registro Actualizado Correctamente</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
						//}
					
				}else{
					//echo "Ficha no actualizada";
					echo "<script> swal('Ficha no Registrada !', '', 'error');</script>";
					// echo '<center><h1>Ficha no actualizada</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
				}
			}else{
				//echo "Usuario no actualizado";
				echo "<script> swal('Usuario no actualizado !', '', 'error');</script>";
				// echo '<center><h1>Usuario no actualizado</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
			}
        }else{
            echo "<script> swal('El Usuario ya tiene una ficha activa', '', 'error');</script>";
        }

						
 ?>

<meta HTTP-EQUIV="REFRESH" CONTENT="4;URL=presentacion.php"/> 
</body>
</html>