<?php
	if( isset($_GET['video'])){
		$video = $_GET['video'];
	}
	//echo $video;
?>


<!doctype html>
<html>
	<head>
		<meta  http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
		<title>Videos, Musicoterapia Colombia, Liliana Medina Ferreira, magister en musicoterapia</title>
		<?php require_once('requeridos/tags.php'); ?>
		<?php include('requeridos/galeria.php'); ?>
		
		<link rel="stylesheet" type="text/css"  media="screen"  href="estilos/video-gr.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:800px)" href="estilos/video-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/video-pq.css" />

	</head>

	<body>


		<div class="cnt_contenidos">
		
			<div class="contenidos">
				
				<h2 class="">Video</h2>
				<br>
				<br>
				<div id="reproductor">
					<iframe src="//player.vimeo.com/video/<?php echo $video; ?>" width="100%" height="100%" frameborder="0" title="" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
				</div>
				
				
			</div>

			<div class="remate"></div>

		</div>

		<?php require_once('requeridos/marco.php'); ?>

		<script>





		</script>


	</body>
</html>
