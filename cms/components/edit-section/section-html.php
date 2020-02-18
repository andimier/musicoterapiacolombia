<div id="section" data-component="section" class="section">
    <h2>Edición de Sección</h2>
    <h1><?php echo Section::getSectionTitle(); ?></h1>

    <section>
        <a class="titulo-rojo" href="puente_metatags.php?seccion_id=' . $seccion_id . '&sec='. $seccion_tt.'">
            EDITAR META-TAGS
        </a>
    </section>

    <!--
    <section class="section-content-wrapper">
        <?php
            //require_once('components/main-image/main-image-html.php');
        ?>
    </section>
    -->

    <section id="insert-section" class="section-content-wrapper">
        <?php
            $table = $data['table'];
            $sectionId = $data['contentId'];
            $contentId = '';
            $contentType = 'section';

            require_once('components/create-content-form/create-content-form-html.php');
        ?>
    </section>

    <section id="section-contents-container" class="section-content-wrapper">
        <h3>Contenidos en esta sección:</h3>
        <ul>
            <?php for ($i = 0; $i < count($data['contentItems']); $i++): ?>
                <li>
                    <a href="<?php echo Section::getContentUrl($data['contentItems'][$i]) ?>">
                        <?php echo $data['contentItems'][$i]['title']; ?>
                    </a>
                </li>
            <?php endfor; ?>
        </ul>
    </section>
</div>