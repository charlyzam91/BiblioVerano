<?php 
require('Connections/conexion.php');
require('RutinasDAO/seleccion.php');
require('RutinasDAO/editar.php');

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <script src="js/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
  <link rel="stylesheet" href="css/sweetalert.css">  
  <link rel="stylesheet" href="css/cssbotones.css" />


	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script src="js/table.js"></script>
 </head>
 <body>


<?php	

if (isset($_GET['Baja'])) {		
		if (Baja_Escuelas($_GET['Baja'])==0){
			echo "<script> swal('Error al dar de baja el registro ', '', 'error');</script>";
		}else{
			echo "<script> swal('Registro dado de baja !', '', 'success');</script>";
		}
	}

?>


 <form name="form1" action="Ingresar_Escuela.php" method="POST" >

 	<div id="Nueva_Escuela" border="1">
	
	Alta de Nueva Escuela
	<br/><br/>
 		<table border="0" >
 			<tr>
 				<td>Tipo de Escuela</td>
 				<td>Nombre / Descripción</td>
 			</tr>

 			<tr>
 				<td><select name="cmbTipoEsc" class="text" required>
 						<option value="" required> Seleccione Tipo</option>
 						<option value="PRES">Preescolar</option>
 						<option value="PRIM">Primaria</option>
 					</select>
 				</td>
				
 				<td><input type="text" class="text" name="txtNom_Escu" required></td>
				<td><button type="submit" value="" class="botonOK" ><span class="material-symbols-outlined">save_as</span></button></td></td>
 			</tr>
			
 		</table>
 		<br/>
 		</form>

 	</div>
		<br /><hr color="blue" size=3>Busqueda de Escuelas <br /><br /><br />

 	<div id="Ver_Escuelas">
	 <table id="tabla" class="display" cellspacing="0" width="100%">
			 <thead>
            <tr>
			
                <th>Tipo</th>
                <th>Descripción</th>
                <th></th>
                        
            </tr>
        </thead>        
 
        <tbody>
 		
 			
 			<?php 
 				$sql="SELECT id_escuela,Tipo, Descripcion FROM `escuelas` where `Estatus`=1 ORDER BY `Tipo`";
 				conectar();
 				$res=mysql_query($sql);
 				desconectar();
 				 while($Fila=mysql_fetch_assoc($res)){
					 
			   		echo "
			   		<tr>
 				<td>".$Fila['Tipo']."</td>
 				<td>".ucfirst($Fila['Descripcion'])."
 				<td>"."<a href='Alta_Escuela.php?Baja=".$Fila['id_escuela']."'><span class='material-symbols-outlined'>delete</span></a></td>				 
 				</tr>
 				</td>";
				
		   		}

 			 ?>
 		

			</tbody>
 		</table>
 	</div> 		
 </body>
 </html>