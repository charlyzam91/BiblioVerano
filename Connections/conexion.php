<?php
error_reporting(0);
function conectar()
{
	$BaseDatos="biblioverano";
	mysql_connect("localhost","root",'')or die (mysql_error());
	mysql_select_db($BaseDatos)or die (mysql_error());
	//echo "ok";
}
function desconectar()
{
	mysql_close();
}

?>