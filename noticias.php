<?php

	require_once("includes/connection.php");

	$titulos = array();
	$contenidos = array();

	$query1= "SELECT titulo, contenido, fecha FROM noticias ORDER BY fecha DESC";
	//$query1 = "SELECT titulo, contenido, fecha FROM contenidos WHERE seccion_id = 8 ORDER BY fecha DESC";
	$grupo1 = mysql_query($query1, $connection);
	
	if(mysql_query($query1, $connection)){
		//echo 'si';
	}else{
		echo mysql_error();
	}

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<title>Noticias, Musicoterapia Colombia, Liliana Medina Ferreira, Bogotá - Colombia</title>
		<title>Musicoterapia Colombia, etimulación temprana</title>
		<?php require_once('requeridos/tags.php'); ?>
	

	</head>

	<body>

		<div class="cnt_contenidos">
				
			<div class="contenidos">
			
				<h2 class="verde0">Noticias</h2>
					
					<?php while($noticia = mysql_fetch_array($grupo1)):?>
						
						<h3 class="gris2"><?php	echo $noticia['titulo']; ?></h3>
						<h4> Publicado: <?php echo $noticia['fecha']; ?></h4>
						<div class="texto">
						<?php echo $noticia['contenido']; ?>
						</div>
					<?php endwhile; ?>

				
			
				
			</div>
			
			<div class="remate"></div>
		</div>
		
		<?php require_once('requeridos/marco.php'); ?>
	</body>
	
</html>