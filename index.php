<?php
	require_once("required/connection.php");
	require_once("required/qs.php");
	require_once("required/php-functions.php");
	require_once("required/main-controller.php");
?>

<!DOCTYPE html>
<html>
	<head>
		<meta  http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<title>Musicoterapia Colombia, Liliana Medina Ferreira, magister en musicoterapia, Bogotá Colombia</title>
		<meta name="description" content="Ofrecemos un espacio en el que utilizamos la música y todos sus elementos al servicio del ser humano Integral.">
		<meta name="keywords" content="liliana, medina, ferreira, musicoterapia, prenatal, estimulación, temprana, metodo, suzuki, clases, violín, musica, padres, bebes, danza, bogota, colombia ">
		<?php require_once('includes/tags.php'); ?>
	</head>

	<body>
		<?php require_once("components/header/header-html.php"); ?>
		<?php require_once("components/nav/nav-html.php"); ?>

		<main class="main-container">
			<?php
				require_once(
					MainController::getPage()
				);
			?>
		</main>

		<?php require_once('includes/marco.php'); ?>
		<?php require_once("components/footer/footer-html.php"); ?>

		<script>

			var banner = document.getElementById('presentacion');
			var alturaimg;

			StartInicio();

			window.addEventListener('resize', AjustaInicio, false);

			function AjustaInicio() {

				alturaimg = $('#presentacion img').height();
				banner.style.height = alturaimg + 'px';
				StartInicio();

			}

			function StartInicio() {

				if(window.innerHeight < 700 && window.innerWidth > 400 ){

					// PANTALLAS ANCHAS PERO DE POCA ALTURA
					// -------
					// |     |

					$('#presentacion').css({
						margin:'70px auto 70px auto'
					});

					$('#nombre h2').css({
						fontSize:'28px'
					});
					$('#nombre h3').css({
						fontSize:'20px'
					});


				}else if(window.innerHeight > 700 && window.innerWidth > 400){

					// PANTALLAS GRANDES NORMALES
					$('#presentacion').css({
						margin:'70px auto 70px auto'
					});

					$('#nombre h2').css({
						fontSize:'38px'
					});
					$('#nombre h3').css({
						fontSize:'24px'
					});

				}else{
					$('#presentacion').css({
						margin:'100px auto 20px auto'
					});

					$('#nombre h2').css({
						fontSize:'18px'
					});
					$('#nombre h3').css({
						fontSize:'15px'
					});

				}
			}

		</script>
	</body>
</html>
