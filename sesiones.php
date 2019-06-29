<?php require_once('requeridos/list-sesiones1.php'); ?>
<!doctype html>
<html>
	<head>
		<meta  http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<title>Imágenes de Sesiones de Estimulación Temprana, Musicoterapia Colombia, Liliana Medina Ferreira</title>
		
		<meta name="description" content="">
		<meta name="keywords" content="">
		
		<?php require_once('requeridos/tags.php'); ?>
		<?php include('requeridos/galeria.php'); ?>


	</head>

	<body>


		<div class="cnt_contenidos">

			<div class="contenidos">

				<h2 class="negro">Imágenes, Sesiones</h2>

				

				<div class="cnt_imagenes">
					
					<h3>Actividad Musical</h3>
					<br>
					<br>
				
					<?php for($i = 1; $i<count($sesiones1)+1; $i++): ?>

						<div class="imageneinfo">
						
							<div class="img">
								<img src="<?php echo $sesiones1[$i]['imagen1']; ?>" alt="<?php echo $sesiones1[$i]['texto']; ?>"/>
								<div class="mascara fancybox" href="<?php echo $sesiones1[$i]['imagen2']; ?>" data-fancybox-group="gallery"></div>
							</div>
							<!--<div class="img_info"><?php echo $sesiones1[$i]['texto']; ?></div>-->
						</div>
						
					<?php endfor; ?>
					
					<div class="vacio"></div>
					
					
					
					<h3>Estimulación Temprana</h3>
					<br>
					<br>
					
					<?php for($i = 1; $i<count($sesiones2)+1; $i++): ?>

						<div class="imageneinfo">
						
							<div class="img">
								<img src="<?php echo $sesiones2[$i]['imagen1']; ?>" alt="<?php echo $sesiones2[$i]['texto']; ?>"/>
								<div class="mascara fancybox" href="<?php echo $sesiones2[$i]['imagen2']; ?>" data-fancybox-group="gallery"></div>
							</div>
							<div class="img_info"><?php echo $sesiones2[$i]['texto']; ?></div>
						</div>
						
					<?php endfor; ?>
					
					
					
					<div class="vacio"></div>
					
					<h3>Musicoterapia Prenatal</h3>
					<br>
					<br>
					
					<?php for($i = 1; $i<count($sesiones3)+1; $i++): ?>

						<div class="imageneinfo">
						
							<div class="img">
								<img src="<?php echo $sesiones3[$i]['imagen1']; ?>" alt="<?php echo $sesiones3[$i]['texto']; ?>"/>
								<div class="mascara fancybox" href="<?php echo $sesiones3[$i]['imagen2']; ?>" data-fancybox-group="gallery"></div>
							</div>
							<div class="img_info"><?php echo $sesiones3[$i]['texto']; ?></div>
						</div>
						
					<?php endfor; ?>
					
					
				</div>
				
				




			</div>

			<div class="remate"></div>

		</div>

		<?php require_once('requeridos/marco.php'); ?>

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
