<?php
	require("constants.php");

	$connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);

	if (!$connection) {
		die("Datos Incorrectos: " . mysql_error($connection));
	}

	$db_select = mysqli_select_db($connection, "musicote_base");

	if (!$db_select) {
		die("La Seleccion de la base de datos fallo: " . mysql_error($connection));

	}
?>