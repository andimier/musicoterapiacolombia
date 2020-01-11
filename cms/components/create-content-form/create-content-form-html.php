<h3>Insertar nuevo Contenido:</h3>

<form enctype="multipart/form-data" method="post" action="crud/create-new-content.php">
    <input type="hidden" name="tabla" value="<?php echo $table; ?>" />
    <input type="hidden" name="sectionId" value="<?php echo $sectionId; ?>" />
    <input type="hidden" name="contentId" value="<?php echo $contentId; ?>" />
    <input type="hidden" name="contentType" value="<?php echo $contentType; ?>" />
    <input type="hidden" name="currentUrl" value="<?php echo Utils::getCurrentUrl(); ?>" />
    <input type="text" name="title" value="" class="letra_azul borde_puntos" size="50" maxlength="50" />

    <label>
        Tipo de contenido:
        <select name="contentDesignType">
            <option value="p" selected>Párrafo</option>
            <option value="ul">Lista estándar</option>
            <option value="ol">Lista numerada</option>
            <option value="pe">Perfil</option>
        </select>
    </label>

    <input type="submit" name="crateContent" id="crateContent" class="button" value="insertar contenido"/>
</form>