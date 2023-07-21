<?php 

	function Select_Grado($GRADO){
		$sql="SELECT `Descripcion` FROM `grados` WHERE `Grado` = $GRADO";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);

		return $fila['Descripcion'];
	}

	function id_usuario_prox(){
		$sql="SELECT max(`id_usuario`)+1 as id_proximo FROM `usuarios`";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);

		return $fila['id_proximo'];
	}
	
	function Buscar_Escuela($esc){
		$sql="SELECT count(`Descripcion`) as existe  FROM `Escuelas` where `Descripcion` like '%$esc%'";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);
			if ($fila['existe']>0){
		return 1 ;
		}else{
		return 0 ;
		}
			
		
	}

	function Rev_GradoP(){
		$sql="SELECT count(id_grado) as fichas FROM `ficha` where id_grado= 1";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);
			if ($fila['fichas']>30){
		return 1 ;
		}else{
		return 0 ;
		}

	}

		function Rev_Grado1_2(){
		$sql="SELECT count(id_grado)as fichas FROM `ficha` where id_grado= 2 or id_grado=3";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);
			if ($fila['fichas']>31){
		return 1 ;
		}else{
		return 0 ;
		}
	}

		function Rev_Grado3_4(){
		$sql="SELECT count(id_grado)as fichas FROM `ficha` where id_grado= 4 or id_grado=5";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);
			if ($fila['fichas']>30){
		return 1 ;
		}else{
		return 0 ;
		}
	}

		function Rev_Grado5_6(){
		$sql="SELECT count(id_grado)as fichas FROM `ficha` where id_grado= 6 or id_grado=7";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);
			if ($fila['fichas']>30){
		return 1 ;
		}else{
		return 0 ;
		}
	}

	function Revisa_Planeacion($pers,$semana, $grado, $turno){
		$sql="SELECT count(id_persona) as plan_hecho FROM `planeacion` WHERE `id_persona`='$pers' and `id_semana`='$semana' and `id_grado`='$grado' and `id_turno`='$turno'";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);
			if ($fila['plan_hecho']>0){
		return 1 ;
		}else{
		return 0 ;
		}
	}

	function Datos_usuario($usuario){
		 $sql="SELECT u.*, es.*, g.*,t.* FROM `usuarios` u
				inner join ficha f on u.id_usuario=f.id_usuario
				inner join escuelas es on f.id_escuela=es.id_escuela
				inner join grados g on f.id_grado=g.Grado
				inner join turnos t on f.id_horario=t.id_turno where u.id_usuario='$usuario'";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		
			return mysql_fetch_assoc($res);
		
		
	}
	
	function revisarUsuarios($N,$AP,$AM){
		$sql="SELECT EXISTS (SELECT `Nombre`, `A_Paterno`, `A_Materno`, `Edad` FROM `usuarios` WHERE `Nombre` like '%$N%' and `A_Paterno`like '%$AP%' and `A_Materno` like '%$AM%') as Existe";
		conectar();
		$res=mysql_query($sql);
		desconectar();
		$fila=mysql_fetch_assoc($res);
			if ($fila['Existe']>0){
		return 1 ;
		}else{
		return 0 ;
		}
	}



 ?>