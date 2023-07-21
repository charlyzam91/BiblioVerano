<?php 
require('Connections/conexion.php');
require('RutinasDAO/Editar.php');

 ?>

    

 <!DOCTYPE html>
 <html lang="en">
 <head>
 <script src="js/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
  <link rel="stylesheet" href="css/sweetalert.css">  
  <link rel="stylesheet" href="css/cssbotones.css" />


	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script src="js/table.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>

 <a href='configuraciones.php?finCursos=1' class="botonOK"><span class="material-symbols-outlined">power_settings_new</span> <br> Finalizar Cursos </a>

 <?php	

if (isset($_GET['finCursos'])) {	
        if ($_GET['finCursos'] == 1){
            if (Baja_Planeaciones()==1){
                echo "<center> <h2> Planeaciones Enviadas a Historial </h2></center>";
                echo"<br><br><br><br><br><br><br><br><br><br>";
            }

            if (Baja_Fichas()==1){
                echo "<center> <h2> Fichas Enviadas a Historial</h2></center>";
            }else{
                echo "Falta fichas";
            }
    
            echo "<script> swal('Todo Preparado para el Siguiente año ', '', 'success');</script>";
        }			
	}

?>

<meta HTTP-EQUIV="REFRESH" CONTENT="4;URL=presentacion.php"/> 
 
 </body>
 </html>