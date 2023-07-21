<?php 
		require 'Connections/conexion.php';
	require 'RutinasDAO/insersion.php';
	require 'RutinasDAO/seleccion.php';

	session_start();		
			$grado=$_SESSION['grado'];
			$sig_usu=$_SESSION['UsuaProx'];


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
			
			if(revisarUsuarios($nom,$apat,$amat)==1){
				echo '<center><h1>Este usuario ya fue registrado anteriormente </h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Regresar</h2></a> </center>';
			}else{

			if (Insert_Usuario($credencial,$nom,$apat,$amat,$edad,$calle,$numCall,$colon,$ciudad,$respon,$telef,$mail,$sexo,$fecha_actual)==1){

				if (Insert_Ficha($sig_usu,$grad,$escu,$turno)==1) {
					
					echo "<br>";
					if ($mail!=""){
						require('correo.php');
					}else{
						echo '<center><h1>Registro Exitoso!!</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Finalizar</h2></a> </center>';
					}
					
				}else{
					echo "Fallo insert Ficha";
				}

			}else{
				echo "Fallo insert usuario";
			}
				}
			


 ?>