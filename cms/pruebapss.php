<?php 

require_once("includes/connection.php");
require_once("includes/functions.php");

$query = "SELECT * FROM usuarios";
$res = mysql_query($query, $connection);

while ($quien = mysql_fetch_array($res)){
	echo $quien['username'] . "-" . $quien['hashed_password'] . "<br />";
}

 ?>

