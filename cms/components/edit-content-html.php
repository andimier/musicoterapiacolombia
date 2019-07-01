<section>
    <?php require_once('includes/main-image.php'); ?>
</section>

<section>
    <a class="titulo-rojo" href="puente_metatags.php?seccion_id=' . $seccion_id . '&sec='. $seccion_tt.'">
        EDITAR META-TAGS
    </a>
</section>

<section id="insert-section">
    <h2>Insertar nuevo contenido</h2>
    <h3>Nuevo Contenido:</h3>

    <form enctype="multipart/form-data" method="post" action="edicion/insertar_contenidos.php">
        <input type="hidden" name="tabla" value="imagenes_publicaciones" />
        <input type="hidden" name="seccion_id" value="'.$seccion_id.'" />
        <input type="text"   name="titulo" value="" class="letra_azul borde_puntos" size="50" maxlength="50" />
        <input type="submit" name="insertar_contenido" id="insertar_contenido" class="fondo_azul" value="insertar contenido"/>
    </form>
</section>