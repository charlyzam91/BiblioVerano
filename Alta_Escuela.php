<?php 
require('Connections/conexion.php');
require('RutinasDAO/seleccion.php');
require('RutinasDAO/insersion.php');
require('RutinasDAO/Editar.php');

if (isset($_GET['Baja'])) {		  
		if (Baja_Escuelas($_GET['Baja'])==0){
			echo "Error al eliminar";
		}
	}

 ?>

 <!DOCTYPE html>
 <html>
 <head>
	
	<link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
	<script src="js/table.js"></script>
 </head>
 <body>
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
 				<td><select name="cmbTipoEsc" required>
 						<option value="" required> Seleccione Tipo</option>
 						<option value="PRES">Preescolar</option>
 						<option value="PRIM">Primaria</option>
 					</select>
 				</td>
				
 				<td><input type="text" name="txtNom_Escu" required> &nbsp &nbsp <input type="submit" name="Guardar" value="Guardar"></td>
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
 				$sql="SELECT * FROM `escuelas` where `Estatus`=1 ORDER BY `Tipo`";
 				conectar();
 				$res=mysql_query($sql);
 				desconectar();
 				 while($Fila=mysql_fetch_assoc($res)){
					 
			   		echo "
			   		<tr>
 				<td>".$Fila['Tipo']."</td>
 				<td>".$Fila['Descripcion']."
 				<td>"."<a href='Alta_Escuela.php?Baja=".$Fila['id_escuela']."'>Quitar</a></td>
 				</tr>
 				</td>";
				
		   		}

 			 ?>
 		

			</tbody>
 		</table>
 	</div> 		
 </body>
 </html>