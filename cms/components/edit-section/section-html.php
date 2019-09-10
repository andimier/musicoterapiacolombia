<div id="section" data-component="section">
    <h1>Edición de Sección</h1>
    <h2><?php echo Section::getSectionTitle(); ?></h2>

    <section>
        <a class="titulo-rojo" href="puente_metatags.php?seccion_id=' . $seccion_id . '&sec='. $seccion_tt.'">
            EDITAR META-TAGS
        </a>
    </section>

    <section>
        <?php
            $mainImageDataArr = $data['contentImage'];
            require_once('components/main-image/main-image.php');
            ?>
    </section>

    <section id="insert-section">
        <?php
            require_once('components/create-content-form/create-content-form-html.php');
        ?>
    </section>

    <section id="section-contents-container">
        <ul>
            <li>
            </li>
        </ul>
    </section>
</div>