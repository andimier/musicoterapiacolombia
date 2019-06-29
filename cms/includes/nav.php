<section id="navegacion">
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

	<div id="sitioyusuario">WWW.NATALIABEHAINE.COM</div>

	<div id="usuario">
        <?php echo $_SESSION['username']; ?>
    </div>

	<nav class="secciones">
        <?php while ($seccion = $pFunctions->getFetchArray($utils->getSections())): ?>
            <div class="secciones1">
                <a href="editar-seccion.php?seccion=<?php echo $seccion['id']; ?>">
                    <?php echo $seccion['titulo']; ?>
                </a>
            </div>
        <?php endwhile; ?>

		<a href="albumes.php">+ albumes</a>
	</nav>

	<script>
		var navegacion = document.getElementById('navegacion'),
			col2 = document.getElementById('col2'),
			margen = navegacion.offsetWidth;

		col2.style.width = $(window).width() - margen + 'px';
		col2.style.marginLeft =  margen + 'px';
	</script>
</section>
