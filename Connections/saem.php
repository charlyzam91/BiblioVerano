<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_saem = "localhost";
$database_saem = "SAEM";
$username_saem = "root";
$password_saem = "";
$saem = @mysql_pconnect($hostname_saem, $username_saem, $password_saem) or trigger_error(mysql_error(),E_USER_ERROR); 
?>