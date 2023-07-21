<?php 
	require 'Connections/conexion.php';
	require 'RutinasDAO/seleccion.php';


 ?>


<!DOCTYPE html>
<html>
<head >

	<title></title>
	<center>
Categorias: 
</center>
<meta charset="utf-8">
</head>
<body >
<br/>
<br/>

<center>
<div style="float">
<table>
<tr>

<?php
date_default_timezone_set('America/Mexico_City');
require_once('Connections/conexion.php');

$sql=" SELECT G.`Grado`,G.`Descripcion` FROM `Grados` G where G.grado < 5";
conectar();
$Res=mysql_query($sql);
desconectar();
$cont=0;
$Estado="Disponible";

	while ($fila=mysql_fetch_assoc($Res)) {		
	
	$Num_Gra=$fila['Grado'];
	$nom=utf8_encode($fila['Descripcion']); 

		switch ($Num_Gra) {
			case 1:
			if (Rev_GradoP()==1){
				$img="completo.png";
				$locacion="";
				$nom="Cupo LLeno";

			}else{
				$img="prescolar.png";
				$locacion="Ficha.php?grad=1";
			}
				
				break;

				case 2:
				if (Rev_Grado1_2()==1){
				$img="completo.png";
				$locacion="";
				$nom="Cupo LLeno";

			}else{
				$img="uno.png";
				$locacion="Ficha.php?grad=2";
			}

				
				break;

				case 3:
				if (Rev_Grado3_4()==1){
				$img="completo.png";
				$locacion="";
				$nom="Cupo LLeno";

			}else{
				$img="dos.png";
				$locacion="Ficha.php?grad=3";
			}
				
				
				break;

				case 4:
				if (Rev_Grado5_6()==1){
				$img="completo.png";
				$locacion="";
				$nom="Cupo LLeno";

			}else{
				$img="tres.png";
				$locacion="Ficha.php?grad=4";
			}
				
				break;			
		}
		

	echo"<td align='center'><a href='$locacion' target=Acciones><button><img src='Utilidades/$img' width='125' title=$Estado></button></a> <br/>$nom <br/></td>";
	$cont+=1;
	if ($cont==2) {
		echo"</tr></table> <table>";
		$cont=0;
	}
} 
?>
</tr></table>
</div>
</center>
</body>
</html>