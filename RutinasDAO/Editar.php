<?php 
		function baja_personal($id_baja){
			$sql="UPDATE `personal` SET `Estatus`=0 WHERE `id`='$id_baja'";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				return 1;
			}else{
				return 0;
			}
		}

		function baja_planeacion($id_baja){
			 $sql="UPDATE `planeacion` SET `Estatus`=2 WHERE `id_plan`='$id_baja'";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				return 1;
			}else{
				return 0;
			}
		}
		
		function Baja_Escuelas($id_baja){
			$sql="UPDATE `escuelas` SET `Estatus`=0 WHERE `id_escuela`='$id_baja'";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				return 1;
			}else{
				return 0;
			}
		}

		function cambair_estatus_todos(){
			$sql="UPDATE `ficha` SET `Estatus`=0 WHERE 1";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				echo "Fichas pasadas a historial";
			}else{
				echo "error al pasar fichas a historial";
			}
			
			$sql="DELETE `planeacion` WHERE `Estatus`=2 ";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				echo "Planeaciones erroneas Eliminadas";
			}else{
				echo "Error al eliminar planeaciones erroneas";
			}

			$sql="UPDATE `planeacion` SET `Estatus`=0 WHERE 1";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				echo "Planeaciones pasadas a historial";
			}else{
				echo "error al pasar las planeaciones a historial";
			}

		}

		function Editar_Usuario($CRED,$N,$AP,$AM,$ED,$CAL,$NE,$COL,$CIU,$TUTOR,$TELEFONO,$CORREO,$SE,$ID_USUA)
		{
				 $sql="UPDATE `usuarios` SET `Credencial`='$CRED',`Nombre`='$N',`A_Paterno`='$AP',`A_Materno`='$AM',`Edad`='$ED',`Calle`='$CAL',`Num_ext`='$NE',`Colonia`='$COL',`Ciudad`='$CIU',`Tutor`='$TUTOR',`Telefono`='$TELEFONO',`E_Mail`='$CORREO',`Sexo`='$SE' WHERE `id_usuario`='$ID_USUA'";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				//echo "DAO Usuario Actualizado";
				return 1;
			}else{
				//echo "DAO error al actualizar Usuario";
				return 0;
			}
		}

		function Editar_Ficha($SiuS, $GRAD, $ESC, $HOR,$ID_USUA){
		   $sql="UPDATE `ficha` SET `id_grado`='$GRAD',`id_escuela`='$ESC',`id_horario`='$HOR' WHERE `id_usuario`='$ID_USUA' ";
		conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				//echo "DAO Usuario Actualizado";
				return 1;
			}else{
				//echo " DAO error al Actualizar Usuario";
				return 0;
			}	

		}



		function Baja_Planeaciones(){
			$sql="UPDATE `planeacion` SET `Estatus`=2 where `Estatus`=1 ";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				return 1;
			}else{
				return 0;
			}
 
		 }

		 function Baja_Fichas(){
			$sql="UPDATE `ficha` SET `Estatus`=2 where `Estatus`=1";
			conectar();
			$res=mysql_query($sql);
			desconectar();	
			if ($res) {
				return 1;
			}else{
				return 0;
			}
 
		 }




 ?>
