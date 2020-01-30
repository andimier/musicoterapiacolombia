<?php
    require_once('section.php');
    require_once('components/paragraph/paragraph.php');
    // require_once('components/u-list/u-list.php');
    // require_once('components/o-list/o-list.php');
    // require_once('components/profile/profile.php');
?>

<h1>
    <?php
        echo $_GET['sectionTitle'] . '<br>';
    ?>
</h1>

<?php foreach ($contentItems as &$val): ?>
    <?php
        $module = $val['module'];
        $class = new $module();
    ?>

    <p>
        <?php echo $class->getContentData($val['contentId']); ?>
    </p>

<?php endforeach; ?>