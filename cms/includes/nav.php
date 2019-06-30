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

	<div id="user">
        <?php echo $_SESSION['username']; ?>
    </div>

	<nav class="navigation">
        <?php if ($utils->getSections()): ?>
            <?php while ($seccion = $pFunctions->getFetchArray($utils->getSections())): ?>
                <ul class="secciones1">
                    <li>
                        <a href="editar-seccion.php?seccion=<?php echo $seccion['id']; ?>">
                            <?php echo $seccion['titulo']; ?>
                        </a>
                    </li>
                </ul>
            <?php endwhile; ?>
        <?php endif; ?>

		<a href="albumes.php">+ albumes</a>
	</nav>
</section>