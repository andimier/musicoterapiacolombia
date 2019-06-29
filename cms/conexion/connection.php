<?php
require("constants.php");

$connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$connection){
	die("La conexion a la base de datos fallo: " . mysql_error());
}
$db_select = mysql_select_db("andimierbase1",$connection);
if(!$db_select){
	die("La Seleccion de la base de datos fallo: " . mysql_error());
}
?>