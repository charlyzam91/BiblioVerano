<?php 
require 'Connections/conexion.php';
	require 'RutinasDAO/Editar.php';

	session_start();		
			$grado=$_SESSION['grado'];
			$sig_usu=$_SESSION['UsuaProx'];

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

			if (Editar_Usuario($credencial,$nom,$apat,$amat,$edad,$calle,$numCall,$colon,$ciudad,$respon,$telef,$mail,$sexo,$id_usuario )==1){
				if (Editar_Ficha($sig_usu,$grad,$escu,$turno,$id_usuario)==1){
					//echo "Registro Actualizado Correctamente";
					if ($mail!=""){
						require('correo.php');
					}else{
						echo '<center><h1>Registro Actualizado Correctamente</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
						}
					
				}else{
					//echo "Ficha no actualizada";
					echo '<center><h1>Ficha no actualizada</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
				}
			}else{
				//echo "Usuario no actualizado";
					echo '<center><h1>Usuario no actualizado</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
			}


						
 ?>