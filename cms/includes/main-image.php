<a href="<?php echo 'editar-imagen.php?contenido_id='.$id.'&src='.$mainImage; ?>">
    <img src="<?php echo $mainImage; ?>" width="165"/>
</a>

<div class="cnt_nuevo_archivo">
    <form enctype="multipart/form-data" method="post">
        <input type="hidden" name="contenido_id" value="<?php echo $id; ?>" />
        <input type="hidden" name="tabla" value="<?php echo $tabla; ?>" />
        <input type="hidden" name="ruta" value="<?php echo $mainImage; ?>" />

        <div id="fileUpload">
            <input id="btn_foto" type="button" value="escoge una imagen" class="mascara">
            <input id="foto"  type="file" name="nombre_archivo"  class="upload" onchange="myFunction(this.value)" >
        </div>

        <p id='nm_imagen'></p>

        <input id="bsubirimg" type="submit" name="botonsubirimagen" value="" class="fondo_negro"/>
    </form>
</div>


<script>
    function myFunction(val) {
        var rutaimagen = val.split('fakepath');
        var laimagen = rutaimagen[rutaimagen.length-1];

        $("#nm_imagen").text(laimagen);
        $("#bsubirimg").css('display', 'block');
    };
</script>