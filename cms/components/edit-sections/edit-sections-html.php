<?php require_once('edit-sections.php'); ?>

<div id="section" data-component="edit-sections" class="edit-sections">
    <h1>Editar secciones</h1>
    <p>En esta sección podrás crear, ordenar y cambiar los nombres a las secciones.</p>

    <h2>Modificaión de Secciones</h2>
    <p> * Para editar el título de una sección: haz click sobre ese título, modifícalo y luego, haz click en el potón "Guardar".</p>

    <section id="section-contents-container" class="">
        <form action="crud/update-table.php" method="POST" >
            <ul>
                <?php for ($i = 0; $i < count($data['items']); $i++): ?>
                    <li data-position="<?php echo $data['items'][$i]['sectionPosition']; ?>">
                        <input type="text"
                            name="section-<?php echo $data['items'][$i]['sectionId']; ?>"
                            value="<?php echo $data['items'][$i]['sectionTitle']; ?>"
                        />
                    </li>
                <?php endfor; ?>
            </ul>

            <input type="hidden" name="currentUrl" value="<?php echo Utils::getCurrentUrl(); ?>" />
            <input type="submit" name="update-sections-table" value="Guardar" class="button"/>
        </form>
    </section>

    <section class="section-content-wrapper">
        <?php $nextItemPosition = $data['nextItemPosition']; ?>
        <?php require_once('components/create-section-form/create-section-form-html.php'); ?>
    </wrapper>
</div>