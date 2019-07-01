<?php

	$connection = mysqli_connect('localhost', 'root', '');
	mysqli_set_charset($connection, 'utf8');

	if (!$connection){
		die("La conexion a la base de datos fallo: " . mysql_error());
	}

	$db_select = mysqli_select_db($connection, "musicote_base");

	if (!$db_select){
		die("La Seleccion de la base de datos fallo: " . mysql_error());
	}

    $p = mysqli_query($connection, "SELECT titulo, contenido, fecha FROM noticias ORDER BY fecha DESC LIMIT 3");
    $ar = mysqli_fetch_array($p);
	//echo "<pre>" . print_r( $ar ) . "</pre>";

	$arr = ['andrés es un muchacho muy juicioso y, le gustan los pingüinos', 'luz', 'julita'];
	array_push($arr, 'laura');
	//echo "<pre>" . print_r( $arr ) . "</pre>";

	$s_arr = serialize($arr);
	print_r(unserialize($s_arr));


?>