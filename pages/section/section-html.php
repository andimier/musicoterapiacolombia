<?php
    require_once('section.php');
    require_once('components/paragraph/paragraph.php');
    // require_once('components/u-list/u-list.php');
    // require_once('components/o-list/o-list.php');
    // require_once('components/profile/profile.php');
?>

<section class="section main-content-wrapper">
    <h1 class="section-title">
        <?php echo $_GET['sectionTitle']; ?>
    </h1>

    <?php foreach ($contentItems as &$val): ?>
        <?php
            $module = $val['module'];
            $class = new $module();
            $data = $class->getContentData($val['contentId']);

            require($val['component']);
        ?>
    <?php endforeach; ?>
</section>