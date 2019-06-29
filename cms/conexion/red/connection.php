<?php
require("constants.php");

$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$connection){
	die("Datos Incorrectos: " . mysql_error());
	echo '# ps -fea | grep mysqld';
}
$db_select = mysql_select_db("musicote_base",$connection);
if(!$db_select){
	die("La Seleccion de la base de datos fallo: " . mysql_error());
	
}
?>