<?php require_once('requeridos/phpcontacto.php'); ?>

<!doctype html>
<html>
	<head>
		<meta  http-equiv="Content-Type" content="text/html; charset=UTF-8" >
		<title>Contacto, Musicoterapia Colombia, Liliana Medina Ferreira, Bogotá - Colombia</title>
		<meta name="description" content="Ofrecemos un espacio en el que utilizamos la música y todos sus elementos al servicio del ser humano Integral.">
		<meta name="keywords" content="liliana, medina, ferreira, musicoterapia, prenatal, estimulación, temprana, metodo, suzuki, clases, violín, musica, padres, bebes, danza, bogota, colombia ">

		<?php require_once('requeridos/tags.php'); ?>	
		<?php include('requeridos/galeria.php'); ?>
		
		<link rel="stylesheet" type="text/css"  media="screen"  href="estilos/contacto-gr.css"/>
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:481px) and (max-width:800px)" href="estilos/contacto-md.css" />
		<link rel="stylesheet" type="text/css"  media="only screen and (min-width:50px) and (max-width:480px)" href="estilos/contacto-pq.css" />


	</head>

	<body>


		<div class="cnt_contenidos">

			<div class="contenidos">

				<h2 class="verde0">Contacto</h2>
				
				
				<div id="cnt_formulario">
		
					<div id="vale1"></div>
				
					<div id="formulario">
					
						<div id="cnt_info" class="bk_piel">
						
							<div class="info">
								<h3 class="negro">BOGOTÁ . COLOMBIA</h3>
								<br>
	
								<h4>Teléfonos</h4>
								<p class="gris2">
								300 6155891<br >
								301 7344018

								</p>
								<br>
								<h4>e-mail</h4>
								
								<p class="gris2">
									<h5>liliana@musicoterapiacolombia.com     </h5>
									<h5>catalina@musicoterapiacolombia.com    </h5>
									<h5>laura@musicoterapiacolombia.com       </h5>
								</p>
							</div>
							
							
							<br />
								<br />
							
							<div class="cnt_campos">
							
							
								<form name="formulario" action="" method="post" onsubmit="return validateForm()">
								
									<label class="etiqueta">Nombre</label>
									<br />
									<input type="text" id="formText1"  name="nombre" value=""/>
									   
									<label class="etiqueta">Correo</label>
									<br />
									<input type="text" id="formText2"  name="correo" value=""/>
									   
									<label class="etiqueta">Mensaje</label>
									<br />
									<textarea id="formTextarea" name="mensaje"></textarea>
									   
									<div class="vacio"></div>
									<input type="submit" class="boton" name="enviarcontacto" id="enviarcontacto" value="Enviar" />
								
								</form>
							</div>
							
						</div>
						
						
					</div>
				
				
				
				</div>







			</div>

			<div class="remate"></div>
			<div class="remate"></div>

		</div>

		<?php require_once('requeridos/marco.php'); ?>

		<script>
			function validateForm(){
			
				var meil = document.forms["formulario"]["formText2"].value;
				var atpos  = meil.indexOf("@");
				var dotpos = meil.lastIndexOf(".");
				
				var x = document.forms["formulario"]["formText1"].value; 
				var y = document.forms["formulario"]["formTextarea"].value; 
				
				if (atpos<1 || dotpos < atpos+2 || dotpos+2 >= meil.length){
				  alert( "El correo que ingresaste no es valido" );
				  return false;
				}	
				
				if ( x == null || x == "" ){
				  alert("Por favor escribe tu nombre");
				  return false;
				}else if ( y == null || y == "" ){
					alert("Por favor escribe un mensaje");
					return false;
				}else{
					alert("gracias, estaremos contestándote lo más pronto posible!");
				}
			}
			
			//console.log($('.entrada h3').css('font-family'))
			
			
		</script>


	</body>
</html>
