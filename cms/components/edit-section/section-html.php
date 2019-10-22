<div id="section" data-component="section">
    <h2>Edición de Sección</h2>
    <h1><?php echo Section::getSectionTitle(); ?></h1>

    <section>
        <a class="titulo-rojo" href="puente_metatags.php?seccion_id=' . $seccion_id . '&sec='. $seccion_tt.'">
            EDITAR META-TAGS
        </a>
    </section>

    <section>
        <?php
            require_once('components/main-image/main-image-html.php');
        ?>
    </section>

    <section id="insert-section">
        <?php
            $table = $data['table'];
            $sectionId = $data['contentId'];
            $contentId = '';
            $contentType = 'section';

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