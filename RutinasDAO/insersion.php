<?php 

	function Insert_Usuario($CRED,$N,$AP,$AM,$ED,$CAL,$NE,$COL,$CIU,$TUTOR,$TELEFONO,$CORREO,$SE,$FR){
		$sql="INSERT INTO `usuarios`(`id_usuario`, `Credencial`, `Nombre`, `A_Paterno`, `A_Materno`, `Edad`, `Calle`, `Num_ext`, `Colonia`, `Ciudad`, `Tutor`, `Telefono`, `E_Mail`, `Sexo`, `Fecha_Registro`) VALUES (NULL,'$CRED','$N','$AP','$AM','$ED','$CAL','$NE','$COL','$CIU','$TUTOR','$TELEFONO','$CORREO','$SE','$FR')";
		conectar();
		$res=mysql_query($sql);
		desconectar();	
		if ($res) {
			return 1;
		}else{
				return 0;
		}

	}

	function Insert_Ficha($SiuS, $GRAD, $ESC, $HOR){
		$sql="INSERT INTO `ficha`(`id_ficha`, `id_usuario`, `id_grado`, `id_escuela`, `id_horario`, `Estatus`, `Fecha_Creacion`) VALUES (NULL,'$SiuS','$GRAD','$ESC','$HOR', '1', now())";
		conectar();
		$res=mysql_query($sql);
		desconectar();	
		if ($res) {
			return 1;
		}else{
				return 0;
		}
	}
	
	function Inserta_Escuela($Tipo, $Descrip){
	$sql="INSERT INTO `escuelas`(`id_escuela`, `Tipo`, `Descripcion`) VALUES (NULL,'$Tipo','$Descrip')";	
	conectar();
		$res=mysql_query($sql);
		desconectar();	
		if ($res) {
			return 1;
		}else{
			return 0;
		}
	}
	
	function inserta_plan($pers,$semana, $grado, $turno){
		$sql="INSERT INTO `planeacion`(`id_plan`, `id_persona`, `id_semana`, `id_grado`, `id_turno`, `Estatus`, `Fecha_Creacion`) VALUES (NULL,'$pers','$semana','$grado','$turno', '1',now())";	
	conectar();
		$res=mysql_query($sql);
		desconectar();	
		if ($res) {
			return 1;
		}else{
			return 0;
		}
	}

	function inserta_personal($nomb){
		$sql="INSERT INTO `personal`(`id`, `Nombre`, `Estatus`) VALUES (NULL,'$nomb','1')";	
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