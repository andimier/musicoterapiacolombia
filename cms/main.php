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
        <div id="cnt_edicion">
            <div id="col2">
                <h3>
                    Hola!
                    <br>

                    Para editar las secciones utiliza el menú ubicado a la izquierda.<br>
                    Haz click en el título de alguna de las secciones.
                </h3>
            </div>
        </div>

        <script src="js/general.js" type="text/javascript"></script>
        <br />
        <br />

        <div id="footer"></div>
        <?php include_once('includes/header.php'); ?>
        <?php include_once('includes/nav.php'); ?>
    </body>
</html>
<?php if (isset($connection)) mysql_close($connection); ?>