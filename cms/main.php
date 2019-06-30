<?php
    require_once("required/session.php");
    require_once("required/connection.php");
    require_once("required/php_functions.php");
    require_once("required/utils.php");

    // encontrar_seccion_y_contenido_seleccionados();
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once('includes/tags.php'); ?>
    </head>

    <body>
        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/nav.php'); ?>

        <main>
            <section id="cnt_edicion">
                <h3>
                    Hola!
                </h3>
                <p>
                    Para editar las secciones utiliza el menú ubicado a la izquierda.<br>
                    Haz click en el título de alguna de las secciones.
                </p>
            </section>
        </main>

        <div id="footer"></div>
    </body>

    <script>
		var navegacion = document.getElementById('navegacion'),
			col2 = document.getElementById('col2'),
			margen = navegacion.offsetWidth;

		col2.style.width = $(window).width() - margen + 'px';
		col2.style.marginLeft =  margen + 'px';
	</script>
    <script type="text/javascript" src="edicion/editortexto.js"></script>
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script src="js/general.js" type="text/javascript"></script>
</html>
<?php if (isset($connection)) mysqli_close($connection); ?>