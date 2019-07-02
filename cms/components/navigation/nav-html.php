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
        <?php $navItems = $nav->getItemsData(); ?>

        <ul>
            <?php for ($i = 0; $i < count($navItems); $i++): ?>
                <li><?php echo $navItems[$i]['title']; ?></li>
            <?php endfor; ?>
        </ul>

		<a href="albumes.php">+ albumes</a>
	</nav>
</section>