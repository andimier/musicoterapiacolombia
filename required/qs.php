<?php
	require_once('php_functions.php');
	$titulos = array();
	$contenidos = array();

	function getNews($connection) {
		$q_string = "SELECT titulo, contenido, fecha FROM noticias ORDER BY fecha DESC LIMIT 3";

		return getPhpQuery($q_string, $connection);
	}

	$grupo1 = getNews($connection);
?>