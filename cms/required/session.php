<?php
	// session_start();

	// function logged_in(){
	// 	return isset($_SESSION['user_id']);
	// }

	// function confirmar_login(){
	// 	if (!logged_in()) {
	// 		header("Location: content.php");
	// 		exit;
	// 	}
	// }

	if (!isset($_SESSION)) session_start();

	$MM_restrictGoTo = "login.php";

	if (!((isset($_SESSION['user_id'])))) {
		$MM_qsChar = "?";
		$MM_referrer = $_SERVER['PHP_SELF'] . "?";
		$MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);

		header("Location: ". $MM_restrictGoTo);
		exit;
	}
?>

