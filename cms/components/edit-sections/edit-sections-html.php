<?php require_once('edit-sections.php'); ?>

<div id="section" data-component="section" class="section">
    <h1>Editar secciones</h1>

    <section id="section-contents-container" class="">
        <ul>
            <?php for ($i = 0; $i < count($data); $i++): ?>
                <li>
                    <?php echo $data[$i]['sectionTitle']; ?>
                </li>
            <?php endfor; ?>
        </ul>
    </section>
</div>