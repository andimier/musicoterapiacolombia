<?php
	require_once("required/connection.php");
	require_once("required/qs.php");
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
		<div class="cnt_contenidos">

			<div id="presentacion">
				<img src="imagenes/fondoliliana.png" />

				<div id="nombre">
					<h2>Musicoterapia Colombia</h2>
					<h3>Liliana Medina F.</h3>

				</div>
			</div>
			<br>

			<div id="cnt_tarjetas">

				<div id="t3">
					<br />

					Ofrecemos un espacio en el que utilizamos la música y todos sus elementos
					al servicio del ser humano Integral.
				</div>

				<br>
				<br>
				<br>

				<div id="video_inicio">
					<div id="video1">
						<iframe src="//player.vimeo.com/video/120076633" width="100%" height="100%" frameborder="0" title="" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
					</div>
				</div>

				<br>
				<br>

				<div id="t3">
					<h2 class="verde0">Últimas Noticias</h2>
					<br />
					<br />

					<?php while($noticia = mysqli_fetch_array($grupo1)):?>
						<div class="cnt_noticia">
							<div class="noticia">
								<a href="noticias.php"><?php	echo $noticia['titulo']; ?><br /></a>
								<a href="noticias.php"><?php	echo $noticia['fecha']; ?></a><br />
							</div>
						</div>
					<?php endwhile; ?>

				</div>
			</div>

			<div class="remate"></div>

		</div>



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

		<?php require_once('includes/marco.php'); ?>
	</body>
</html>
