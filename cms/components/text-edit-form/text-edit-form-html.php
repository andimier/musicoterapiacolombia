<section class="text-edit-form">
    <div id="cnt_botonesedicion">
        <img class="intLink" title="Quitar Formato" onClick="qFormato('removeFormat');" src="edicion/iconos/formato1.png">
        <img class="intLink" title="Negrilla" onClick="formatDoc('bold');" src="edicion/iconos/bold.png" />
        <img class="intLink" title="Enlazar" onClick="linkText('createLink');" src="edicion/iconos/link.png" />
        <img class="intLink" title="Desenlazar" onClick="formatDoc('unlink');" src="edicion/iconos/unlink.png" />
        <img class="intLink" title="Subrayar" onClick="formatDoc('underline');" src="edicion/iconos/underline.png" />
    </div>

    <?php if ($data['textData'] != NULL): ?>
        <form enctype="multipart/form-data" action="crud/table-update.php" name="formularioedicion1" id="text-edit-form" method="post">
            <!-- <input type="hidden" name="idioma" value="<?php echo $txt_idioma;?>"/> -->
            <input type="hidden" name="id" value="<?php echo $data['textData']['textId'];?>"/>
            <input type="hidden" name="parentUrl" value="<?php echo $data['textData']['parentUrl']; ?>"/>

            <label>Título
                <input type="text" name="title" value="<?php echo $data['textData']['title']; ?>" size="50" maxlength="50" />
            </label>

            <label>Texto del contenido
                <div id="text-input-box" class="text-input-box" contenteditable="true">
                    <?php echo $data['textData']['text']; ?>
                </div>
            </label>

            <textarea name="item-text" id="item-text" cols="100" rows="14" ></textarea>

            <label> Tipo de contenido
                <select name="contentDesignType">
                    <option value="p" selected>Párrafo</option>
                    <option value="ul">Lista estándar</option>
                    <option value="ol">Lista numerada</option>
                    <option value="pe">Perfil</option>
                </select>
            </label>

            <input type="submit" name="update-text-btn" class="button" id="save-text-btn" value="Guardar"/>
        </form>
    <?php endif; ?>
</section>