<div id="section" data-component="content" class="edit-content">
<h2>Edición de Contenido</h2>
    <h1><?php echo $data['title']; ?></h1>

    <!--
    <section class="section-content-wrapper">
        <?php // require_once('components/main-image/main-image-html.php'); ?>
    </section>
-->
    <!--
    ** Solo si hay subcontenidos

    <section id="insert-section">
        <h2>Insertar nuevo contenido</h2>
        <h3>Nuevo Contenido:</h3>

        <form enctype="multipart/form-data" method="post" action="edicion/insertar_contenidos.php">
            <input type="hidden" name="tabla" value="imagenes_publicaciones" />
            <input type="hidden" name="seccion_id" value="'.$seccion_id.'" />
            <input type="text"   name="titulo" value="" class="letra_azul borde_puntos" size="50" maxlength="50" />
            <input type="submit" name="insertar_contenido" id="insertar_contenido" class="fondo_azul" value="insertar contenido"/>
        </form>
    </section> -->

    <?php require_once('components/text-edit-form/text-edit-form-html.php'); ?>
</div>