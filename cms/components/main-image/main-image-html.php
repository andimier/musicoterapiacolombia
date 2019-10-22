
<?php require_once('main-image.php'); ?>

<div class="main-image" data-component="main-image">
    <section class="new-file-wrapper">
        <img src="<?php echo $mainImageDataArr['image']; ?>" width="165"/>
    <!-- <a href="crud/update-image.php?contentType=section">a crud por favor</a> -->

        <form enctype="multipart/form-data" method="post" action="crud/update-image.php">
            <input type="hidden" name="contentId" value="<?php echo $mainImageDataArr['contentId']; ?>" />
            <input type="hidden" name="contentType" value="<?php echo $mainImageDataArr['contentType']; ?>" />
            <input type="hidden" name="image" value="<?php echo $mainImageDataArr['image']; ?>" />
            <input type="hidden" name="currentUrl" value="<?php echo Utils::getCurrentUrl(); ?>" />

            <h3>Selecciona una imagen de tu computador</h3>
            <label for="image-file" class="button select-image-btn">Seleccionar imagen</label>
            <input id="image-file"
                type="file"
                value="<?php echo $mainImageDataArr['btnValue']; ?>"
                name="newImageFileObject"
                style="visibility: hidden;"
                onchange="myFunction(this.value)"
            >

            <input type="submit" name="submit-img-btn" value="subir imagen" class="button upload-image-btn"/>
        </form>
    </section>
</div>
