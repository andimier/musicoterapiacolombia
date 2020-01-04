
<?php require_once('main-image.php'); ?>

<div class="main-image" data-component="main-image">
    <section class="new-file-wrapper">
        <h2>Imagen principal de este contenido</h2>

        <?php if ($mainImageDataArr['image']): ?>
            <img src="<?php echo $mainImageDataArr['image'] ?>" width="165"/>
        <?php else: ?>
            <h4>No hay imagen seleccionada aún. </h4>
        <?php endif; ?>
    <!-- <a href="crud/update-image.php?contentType=section">a crud por favor</a> -->

        <form enctype="multipart/form-data" method="post" action="crud/update-image.php">
            <input type="hidden" name="contentId" value="<?php echo $mainImageDataArr['contentId']; ?>" />
            <input type="hidden" name="contentType" value="<?php echo $mainImageDataArr['contentType']; ?>" />
            <input type="hidden" name="image" value="<?php echo $mainImageDataArr['image']; ?>" />
            <input type="hidden" name="currentUrl" value="<?php echo Utils::getCurrentUrl(); ?>" />

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
