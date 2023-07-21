<?php 

date_default_timezone_set('America/Mexico_City');
$horaActual=date('H:i:s',Time())."";


function Nombre($equipo){	
	$nomUsu="SELECT U.`Nombre` FROM `Usuarios` U inner join `Bitacora` B on U.`Folio`=B.`Usuario` where B.`id_equipo`='$equipo' and B.`Estado_Sesion`='A'";
	 conectar();
      $ResNom=mysql_query($nomUsu);
	 desconectar();
	 $nomb=mysql_fetch_assoc($ResNom);
	 if ($nomb!=0) {
	 	 return "--".$nomb['Nombre'];
	 }else{
	 	return "";	 
	 }	
}// fin nombre

function Revisar(){
	
$HoraInBit="SELECT `H_Inicio`, `id_equipo`, `Tiempo_Sesion` FROM `Bitacora` WHERE `Estado_Sesion`='A' ";
	conectar();
     $ResHor=mysql_query($HoraInBit);
	 desconectar();
	 echo mysql_num_rows($ResHor);
	 return mysql_num_rows($ResHor);	 
	 //if (mysql_num_rows($ResHor) == 0) {	 	
    exit;	
	//}
}


function Hora_Finalizar($horaInic, $Tiempo){

	 	$horaInicial= $horaInic;
		$minutoAnadir= $Tiempo*60;
		$segundos_horaInicial=strtotime($horaInicial);
		$segundos_minutoAnadir=$minutoAnadir*60;
		return  $HoraInicio=date("H:i:s",$segundos_horaInicial+$segundos_minutoAnadir);
	
}//fin Tiempo

 ?>