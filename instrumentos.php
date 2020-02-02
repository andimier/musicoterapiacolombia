<?php
	require_once("required/connection.php");
	require_once("required/qs.php");
	require_once("required/php-functions.php");
	require_once("required/main-controller.php");
?>

<?php require_once('required/list-instrumentos.php'); ?>

<!doctype html>
<html>
	<head>
		<meta  http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<title>Imágenes Instrumentos, Musicoterapia Colombia, Estimulación Temprana, Liliana Medina Ferreira, Bogotá - Colombia</title>
		<meta name="description" content="Estos son los instrumentos utilizados en las sesiones de estimulación temprana y prenatal.">
		<meta name="keywords" content="tambora, maracas, llamador, alegre, xilofono, metalofono, chéquere, derbake  ">
		<?php require_once('includes/tags.php'); ?>
		<?php include('required/galeria.php'); ?>
	</head>

	<body>
		<?php require_once("components/header/header-html.php"); ?>
		<?php require_once("components/nav/nav-html.php"); ?>

		<div class="cnt_contenidos">
			<div class="contenidos">
				<h2 class="negro">Los Instrumentos</h2>
				<div class="cnt_imagenes">
					<?php for($i = 1; $i<count($instrumentos)+1; $i++): ?>
						<div class="imageneinfo">
							<div class="img">
								<img src="<?php echo $instrumentos[$i]['imagen1']; ?>" alt="<?php echo $instrumentos[$i]['texto']; ?>"/>
								<div class="mascara fancybox" data-fancybox-group="gallery" href="<?php echo $instrumentos[$i]['imagen2']; ?>"></div>

							</div>
							<!--<div class="img_info"><?php echo $instrumentos[$i]['texto']; ?></div>-->
						</div>
					<?php endfor; ?>

				</div>
			</div>
			<br>
			<br>
			<br>
			<br>
			<div class="remate"></div>
		</div>

		<?php require_once('includes/marco.php'); ?>
		<?php require_once("components/footer/footer-html.php"); ?>

		<script>
			var imageneinfo = document.getElementsByClassName('imageneinfo');
			var w_imageneinfo;

			var img = document.getElementsByClassName('img');
			var w_img;


			window.addEventListener('resize', AjustarImagnes, false);


			function AjustarImagnes() {
				InicioImagenes()
			}

			function InicioImagenes() {

				w_imageneinfo = imageneinfo[0].offsetWidth;
				console.log(w_imageneinfo)
				w_img = img[0].offsetWidth;

				if(window.innerWidth < 400){
					for(var i=0; i<imageneinfo.length; i++){
						imageneinfo[i].style.height = w_imageneinfo + 30 + 'px';

						img[i].style.height = w_img + 'px';
					}

				}else{
					for(var i=0; i<imageneinfo.length; i++){
						imageneinfo[i].style.height = w_imageneinfo + 70 + 'px';

						img[i].style.height = w_img + 'px';
					}
				}

			}

			InicioImagenes();


		</script>


	</body>
</html>
