
<?php
	require_once("required/connection.php");
	require_once("required/qs.php");
	require_once("required/php-functions.php");
	require_once("required/main-controller.php");
?>

<!doctype html>
<html>
	<head>
		<meta  http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<title>Musicoterapia Colombia, etimulación temprana</title>
		<?php require_once('includes/tags.php'); ?>
		<meta name="description" content="Estas son las sedes de Musicoterapia Colombia, Bogotá.">
		<meta name="keywords" content="la, esmeralda, occidente">
	</head>

	<body>
		<?php require_once("components/header/header-html.php"); ?>
		<?php require_once("components/nav/nav-html.php"); ?>

		<div class="cnt_contenidos">
			<div class="contenidos">
				<h2 class="verde0">Sedes</h2>

				<div id="cnt_sedes">
					<div class="sede sede3"></div>
					<p class="verde0">
					Sede principal<br>
					Occidente<br>
					Bogotá
					</p>

					<div class="sede sede1"></div>
					<p class="verde0">
					Sede principal<br>
					Occidente<br>
					Bogotá
					</p>
				</div>
				<div class="remate"></div>
			</div>
		</div>

		<?php require_once('includes/marco.php'); ?>
		<?php require_once("components/footer/footer-html.php"); ?>

		<script>

			var sede = document.getElementsByClassName('sede');
			var w_sede;


			window.addEventListener('resize', AjustarSedes, false);


			function AjustarSedes() {
				InicioSedes()
			}

			function InicioSedes() {

				w_sede = sede[0].offsetWidth;

				for(var i=0; i<sede.length; i++){
					sede[i].style.height = w_sede + 'px';
				}
			}

			InicioSedes();


		</script>


	</body>
</html>
