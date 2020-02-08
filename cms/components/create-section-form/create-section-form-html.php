<div class="create-content-form" data-component="create-content-form">
    <h3>Insertar nuevo Contenido:</h3>

    <form enctype="multipart/form-data" method="post" action="crud/create-new-section.php">
        <input type="hidden" name="currentUrl" value="<?php echo Utils::getCurrentUrl(); ?>" />
        <input type="hidden" name="nextItemPosition" value="<?php echo $nextItemPosition ?>" />
        <label>
            <input type="text"
                name="title"
                value=""
                class="letra_azul borde_puntos input"
                size="50"
                maxlength="50"
                required
                placeholder="Escribe un título para la sección"/>
        </label>

        <input type="submit" name="createSection" id="crateContent" class="button" value="insertar contenido"/>
    </form>
</div>