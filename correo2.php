<?php

$para = 'destinatario@dominio.com';
$asunto = 'Prueba de SMTP local';
$mensaje = 'Mensaje de prueba';
$cabeceras = 'From: remitente@dominio.com' . "\r\n" .
'Reply-To: remitente@dominio.com' . "\r\n" .
'-Mailer: PHP/' . phpversion();

if(mail($para, $asunto, $mensaje, $cabeceras)) {
echo 'Correo enviado correctamente';
} else {
echo 'Error al enviar mensaje';
}
?>