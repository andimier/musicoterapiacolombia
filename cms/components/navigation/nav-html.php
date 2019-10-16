<section class="navigation-container">
    <button class="button logout-btn">
        CERRAR SESION
    </button>

    <!-- <a href="logout.php" onclick="return confirm('estas a punto de cerrar sesion, se perderan los cambios que no hayas guardado!')"> -->

    <p class="date">
        <?php
            date_default_timezone_set('America/Bogota');
            echo date("F j, Y, g:i a");
        ?>
    </p>

    <section class="user-info">
        <p class="user" draggable="true">
            <?php echo $_SESSION['username']; ?>
        </p>
        <p class="domain">
            WWW.MUSICOTERAPIACOLOMBIA.COM
        </p>
    </section>

	<nav class="navigation">
        <h2>Secciones</h2>

        <?php $navItems = Nav::getItemsData(); ?>
        <?php if ($navItems): ?>
            <ol class="nav-items-container">
                <?php for ($i = 0; $i < count($navItems); $i++): ?>
                    <li class="nav-item" data-item-id="<?php echo $navItems[$i]['id']; ?>">
                        <a
                            href=<?php echo Nav::getSectionUrl($navItems[$i]); ?>
                            target="_self"
                        >
                            <?php echo $navItems[$i]['title']; ?>
                        </a>
                    </li>
                <?php endfor; ?>
</ol>
        <?php endif; ?>

		<a href="albumes.php">+ albumes</a>
	</nav>
</section>