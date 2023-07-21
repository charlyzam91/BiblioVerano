<?php 
	require 'Connections/conexion.php';
	require 'RutinasDAO/seleccion.php';
 ?>


<!DOCTYPE html>
<html>
<head >

	<title></title>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" /> 
  	<link rel="stylesheet" href="css/cssbotones.css" />
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

$sql=" SELECT G.`Grado`,G.`Descripcion` FROM `Grados` G where G.grado < 5";
conectar();
$Res=mysql_query($sql);
desconectar();
$cont=0;
$Estado="Disponible";


	while ($fila=mysql_fetch_assoc($Res)) {		
	
	$Num_Gra=$fila['Grado'];	

		switch ($Num_Gra) {
			case 1:
			if (Rev_GradoP()==1){
				$img="cancel";
				$locacion="presentacion.php";
				$nom="Cupo LLeno";
				$clas ="botonlleno";
				$img= "cancel";

			}else{
				$nom="Preescolar";
				$clas ="botonDisp";
				$img= "check";
				$locacion="selecciona_usuario.php";
			}
				
				break;

				case 2:
				if (Rev_Grado1_2()==1){
				$img="cancel";
				$locacion="presentacion.php";
				$clas ="botonlleno";
				$img= "cancel";

			}else{
				$nom="Primero y Segundo";
				$clas ="botonDisp";
				$img= "check";
				$locacion="selecciona_usuario.php";
			}

				
				break;

				case 3:
				if (Rev_Grado3_4()==1){
				$img="cancel";
				$locacion="presentacion.php";
				$clas ="botonlleno";
				$img= "cancel";

			}else{
				$nom="Tercero y Cuarto";
				$clas ="botonDisp";
				$img= "check";	
				$locacion="selecciona_usuario.php";
			}
				
				
				break;

				case 4:
				if (Rev_Grado5_6()==1){
				$img="cancel";
				$locacion="presentacion.php";
				$clas ="botonlleno";
				$img= "cancel";

			}else{
				$nom="Quinto y Sexto";
				$clas ="botonDisp";
				$img= "check";
				$locacion="selecciona_usuario.php";
			}
				
				break;			
		}
		

	echo"<td align='center'><a href='$locacion' target=Acciones class ='text'><button class = '$clas'><span class='material-symbols-outlined'>$img</span></button></a> <br/>$nom <br/></td>";
	$cont+=1;
	if ($cont==2) {
		echo"</tr><tr>";
		$cont=0;
	}
} 
?>
</tr></table>
</div>
</center>
</body>
</html>