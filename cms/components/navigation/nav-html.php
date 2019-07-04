<section id="info-bar">
    <div class="etiquetalogout">
        <a href="logout.php" onclick="return confirm('estas a punto de cerrar sesion, se perderan los cambios que no hayas guardado!')">
            CERRAR SESION
        </a>
    </div>

    <div id="nav_fecha">
        <?php
            date_default_timezone_set('America/Bogota');
            echo date("F j, Y, g:i a");
        ?>
    </div>

	<h1 id="domain">
        WWW.NATALIABEHAINE.COM
    </h1>

	<div id="user" draggable="true">
        <?php echo $_SESSION['username']; ?>
    </div>

	<nav class="navigation">
        <?php $navItems = Nav::getItemsData(); ?>
        <?php if ($navItems): ?>
            <ul>
                <?php for ($i = 0; $i < count($navItems); $i++): ?>
                    <li data-item-id="<?php echo $navItems[$i]['id']; ?>">
                        <a
                            href=<?php echo Nav::getSectionUrl($navItems[$i]); ?>
                            target="_self"
                        >
                            <?php echo $navItems[$i]['title']; ?>
                        </a>
                    </li>
                <?php endfor; ?>
            </ul>
        <?php endif; ?>

		<a href="albumes.php">+ albumes</a>
	</nav>
</section>