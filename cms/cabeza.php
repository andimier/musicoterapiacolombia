<?php encontrar_seccion_y_contenido_seleccionados(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>CMS MUSICOTERAPIA COLOMBIA - ANDIMIER</title>

	<link rel="Stylesheet" type="text/css" href="estilos/estilos.css" />
	<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>
	<script type="text/javascript">
	/*
	function nocopypaste(e){
		var code = (document.all) ? event.keyCode:e.which;

		var msg = "Sorry, this functionality is disabled.";
		if (parseInt(code)==17){
			//CRT Key
			alert(msg);
			window.event.returnValue = false;
		}
	}*/
	</script>
	<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>
	<script type="text/javascript" src="edicion/editortexto.js"></script>


</head>

<body>

<div id="cabezote"></div>

<div id="contenedor">

    <div class="col1">
    	
        <div class="etiquetalogout">
            <a href="logout.php" onclick="return confirm('estas a punto de cerrar sesion, se perderan los cambios que no hayas guardado!')">CERRAR SESI�N</a>
        </div>
        
        <br />
        
        <div id="sitioyusuario">
            WWW.MUSICOTERAPIACOLOMBIA.COM<br />
            Usuario: <?php echo $_SESSION['username']; ?>
			
        </div>
        
        <br /><br />
        
        <div class="titulos1"><h3>Secciones</h3></div>
        <div class="secciones">
            <?php navegacion($seccion_seleccionada, $contenido_seleccionado)?>
        </div>
    
    </div>