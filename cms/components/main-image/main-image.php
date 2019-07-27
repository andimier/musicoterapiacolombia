<div id="main-image" data-component="main-image">
    <img src="<?php echo $mainImageDataArr['image']; ?>" width="165"/>

    <a href="crud/update-image.php?contentType=section">a crud por favor</a>

    <div class="cnt_nuevo_archivo">
        <form enctype="multipart/form-data" method="post" action="crud/update-image.php">
            <input type="hidden" name="contentId" value="<?php echo $mainImageDataArr['contentId']; ?>" />
            <input type="hidden" name="contentType" value="<?php echo $mainImageDataArr['contentType']; ?>" />
            <input type="hidden" name="image" value="<?php echo $mainImageDataArr['image']; ?>" />
            <input type="hidden" name="currentUrl" value="<?php echo Utils::getCurrentUrl(); ?>" />

            <div id="fileUpload">
                <input id="btn_foto" type="button" value="escoge una imagen" class="mascara">
                <input id="foto" type="file" name="newImageFileObject" class="upload" onchange="myFunction(this.value)" >
            </div>

            <p id='nm_imagen'></p>

            <input id="bsubirimg" type="submit" name="submit-img-btn" value="subir imagen" class="fondo_negro"/>
        </form>
    </div>
</div>
