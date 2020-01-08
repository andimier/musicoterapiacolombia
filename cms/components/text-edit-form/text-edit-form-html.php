<form enctype="multipart/form-data" action="" name="formularioedicion1" id="formularioedicion1" method="post">
    <!-- <input type="hidden" name="tabla" value="<?php echo $tabla;?>"/>
    <input type="hidden" name="contenido_id"  value="<?php echo $txt_contenido_id;?>"/>
    <input type="hidden" name="texto_id" value="<?php echo $txt_texto_id;?>"/>
    <input type="hidden" name="id" value="<?php echo $txt_id;?>"/>
    <input type="hidden" name="idioma" value="<?php echo $txt_idioma;?>"/>

    <input type="text" name="titulo" id="titulo" value="<?php echo $txt_titulo; ?>" size="50" maxlength="50" />
    <input type="text" name="fecha" id="fecha"  value="<?php echo $txt_fecha; ?>"  size="50" maxlength="50" /> -->

    <div id="cnt_botonesedicion">
        <img class="intLink" title="Quitar Formato" onClick="qFormato('removeFormat');" src="edicion/iconos/formato1.png">
        <img class="intLink" title="Negrilla" onClick="formatDoc('bold');" src="edicion/iconos/bold.png" />
        <img class="intLink" title="Enlazar" onClick="linkText('createLink');" src="edicion/iconos/link.png" />
        <img class="intLink" title="Desenlazar" onClick="formatDoc('unlink');" src="edicion/iconos/unlink.png" />
        <img class="intLink" title="Subrayar" onClick="formatDoc('underline');" src="edicion/iconos/underline.png" />

        <div id="btn_pegar">Pegar texto</div>
    </div>

    <div id="cnt_cajasdetexto">
        <div id="caja2" contenteditable="true" style="background-color:#ff0"></div>
    </div>

    <textarea name="areadetexto" style="border: 1px solid black;" id="areadetexto" cols="100" rows="14" ></textarea>

    <input type="submit" name="boton1" id="save-text" value="Guardar"/>
</form>