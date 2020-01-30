<?php require_once('nav.php'); ?>

<div id="menu">
	<div id="cnt_enlaces">
		<div id="enlaces1">
			<div id="hojasarriba"></div>
			<div id="logo_pq"></div>

			<div class="enlaces">
				<a href="./" class="link_verde">inicio</a>
			</div>

			<nav class="enlaces">
				<h3>Servicios</h3>

				<?php $navItems = Nav::getSectionLinksData(); ?>

				<?php for ($i = 0; $i < count($navItems); $i++): ?>
					<a href="index.php?sectionId=<?php echo $navItems[$i]['sectionId']; ?>&sectionTitle=<?php echo $navItems[$i]['sectionTitle']?>" class="link_gris1">
						<?php echo $navItems[$i]['sectionTitle']; ?>
					</a>
				<?php endfor; ?>

				<a href="musicoterapia-prenatal.php" class="link_gris1">musicoterapia prenatal</a>
				<a href="estimulacion-temprana.php" class="link_gris2">estimulacion temprana</a>
				<a href="metodo-suzuki.php" class="link_gris1" >Método Suzuki</a>
				<a href="terapia-de-sonido.php" class="link_gris2">terapia de sonido</a>
				<a href="fitzmaurice-voicework.php" class="link_gris1">Fitzmaurice Voicework</a>
				<a href="meditacion-sonora-y-vibratoria.php" class="link_gris2">Meditación sonora y vibratoria</a>
			</nav>

			<div id="l1"></div>

			<div class="enlaces">
				<a  href="info-talleres.php" class="link_gris3">info talleres</a>
			</div>

			<div id="l2"></div>

			<div class="enlaces">
				<a href="quienes-somos.php" class="link_hv">quienes somos</a>
			</div>

			<div id="l2"></div>

			<div class="enlaces">
				<a href="sedes.php" class="link_gris1">sedes</a>
				<a href="contacto.php" class="link_gris4">contacto</a>
			</div>

			<div id="l1"></div>

			<div class="enlaces">
				<h3>Imágenes</h3>
				<a href="instrumentos.php" class="link_gris5">los instrumentos</a>
				<a href="sesiones.php" class="link_gris6">sesiones</a>
			</div>

			<div id="cnt_logo">
				<div id="pentagrama"></div>

				<div id="logomenu"></div>
			</div>
		</div>
	</div>
</div>

<?php require_once('includes/menu-mv.php'); ?>