<div class="create-content-form" data-component="create-content-form">
    <h3>Insertar nuevo Contenido:</h3>

    <form enctype="multipart/form-data" method="post" action="crud/create-new-content.php">
        <input type="hidden" name="tabla" value="<?php echo $table; ?>" />
        <input type="hidden" name="sectionId" value="<?php echo $sectionId; ?>" />
        <input type="hidden" name="contentId" value="<?php echo $contentId; ?>" />
        <input type="hidden" name="parentContentType" value="<?php echo $contentType; ?>" />
        <input type="hidden" name="currentUrl" value="<?php echo Utils::getCurrentUrl(); ?>" />
        <input type="text"
            name="title"
            value=""
            class="letra_azul borde_puntos input"
            size="50"
            maxlength="50"
            required
            placeholder="Escribe un título para el contenido"/>

        <label>
            Tipo de contenido:
            <select name="contentType">
                <option value="" selected disabled>Selecciona un tipo de contenido</option>
                <option value="p">Párrafo</option>
                <option value="ul">Lista estándar</option>
                <option value="ol">Lista numerada</option>
                <option value="pe">Perfil</option>
            </select>
        </label>

        <input type="submit" name="crateContent" id="crateContent" class="button" value="insertar contenido"/>
    </form>
</div>