<?php require_once('edit-sections.php'); ?>

<div id="section" data-component="section" class="section">
    <h1>Editar secciones</h1>
    <p>En esta sección podrás crear, ordenar y cambiar los nombres a las secciones.</p>

    <section id="section-contents-container" class="">
        <ul>
            <?php for ($i = 0; $i < count($data['items']); $i++): ?>
                <li data-position="<?php echo $data['items'][$i]['sectionPosition']; ?>">
                    <?php echo $data['items'][$i]['sectionTitle']; ?>
                </li>
            <?php endfor; ?>
        </ul>
    </section>

    <section class="section-content-wrapper">
        <?php $nextItemPosition = $data['nextItemPosition']; ?>
        <?php require_once('components/create-section-form/create-section-form-html.php'); ?>
    </wrapper>
</div>