<div id="main-image" data-component="main-image">
    <img src="<?php echo $mainImage; ?>" width="165"/>

    <a href="crud/update-image.php?contentType=section">a crud por favor</a>

    <div class="cnt_nuevo_archivo">
        <form enctype="multipart/form-data" method="post" action="crud/update-image.php">
            <input type="hidden" name="contenido_id" value="<?php //echo $id; ?>" />
            <input type="hidden" name="tabla" value="<?php //echo $tabla; ?>" />
            <input type="hidden" name="ruta" value="<?php //echo $mainImage; ?>" />

            <div id="fileUpload">
                <input id="btn_foto" type="button" value="escoge una imagen" class="mascara">
                <input id="foto" type="file" name="imageFile" class="upload" onchange="myFunction(this.value)" >
            </div>

            <p id='nm_imagen'></p>

            <input id="bsubirimg" type="submit" name="submit-img-btn" value="" class="fondo_negro"/>
        </form>
    </div>
</div>
