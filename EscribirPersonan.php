<?php 
	
	require 'Connections/conexion.php';
	require 'RutinasDAO/insersion.php';
 ?>

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

$nombre=$_POST['NuePersona'];

if (inserta_personal($nombre)==1) {
				//echo "Correcto";
				echo "<script> swal('Personal Registrado Correctamente !', '', 'success');</script>";
}else{
	//echo "Error al ingresar persona";
	echo "<script> swal('Error al Registrar Personal', '', 'error');</script>";
	
}
 ?>
	<meta HTTP-EQUIV="REFRESH" CONTENT="2;URL=personal.php"/> 
 </body>
 </html>