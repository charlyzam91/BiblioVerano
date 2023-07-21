<?php

$para = "smjc6391@gmail.com";
$asunto = 'configurado';
$mensaje = '

Biblio Verano 2017

Inscripción Confirmada:

Recomendaciones: 
1.- Debera prensentarse 10 minutos antes de la hora de inicio
2.- Sin objetos de Valor por ejemplo: --Tablets, celulares, etc---
3.- El niñ@ debera presentarse desayunado
4.- Estar puntuales a la hora de salida

-- Gracias por inscribir a sus niñ@s en los cursos de Verano de la Biblioteca Publica Amado Nervo--

';
$cabeceras = 'From: BiblioVerano 2017 <biblioteca.jacona1163@gmail.com>' . "\r\n" .
'Reply-To: biblioteca.jacona1163@gmail.com' . "\r\n" .
'X-Mailer: PHP/' . phpversion();

if(mail($para,$asunto,$mensaje,$cabeceras)) {
echo '<center><h1>Registro Exitoso!!! <br/> Correo enviado correctamente</h1><br/> <a href="presentacion.php"<input type="button" name="Regresar" value="Regresar"><h2>Finalizar</h2></a></center>';
} else {
echo 'Error al enviar mensaje';
}
?>