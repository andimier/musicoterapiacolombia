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

        <?php include_once('components/navigation/nav.php'); ?>

        <main class="main-container">
            <div id="cnt_edicion">
                <section>
                    <h3>
                        Hola!
                    </h3>
                    <p>
                        Para editar las secciones utiliza el menú ubicado a la izquierda.<br>
                        Haz click en el título de alguna de las secciones.
                    </p>

                    <br />
                    <br />
                    <br />
                    <ul id="list-container">
                        <li id="item1" class="item" draggable="true">item1</li>
                        <li id="item2" class="item" draggable="true">item2</li>
                        <li id="item3" class="item" draggable="true">item3</li>
                        <li id="item4" class="item" draggable="true">item4</li>
                    </ul>
                </section>

                <section id="editing-container">
                    <?php
                        require_once(
                            Utils::getEditingComponent()
                        );
                    ?>
                </section>
            </div>
        </main>

        <div id="footer"></div>
    </body>

    <?php include_once('required/js-bundler.php'); ?>
</html>
<?php if (isset($connection)) mysqli_close($connection); ?>