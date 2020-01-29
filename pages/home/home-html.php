<div id="presentacion">
    <img src="imagenes/fondoliliana.png" />

    <div id="nombre">
        <h2>Musicoterapia Colombia</h2>
        <h3>Liliana Medina F.</h3>
    </div>
</div>
<br>

<div id="cnt_tarjetas">

    <div id="t3">
        <br />

        Ofrecemos un espacio en el que utilizamos la música y todos sus elementos
        al servicio del ser humano Integral.
    </div>

    <br>
    <br>
    <br>

    <div id="video_inicio">
        <div id="video1">
            <iframe src="//player.vimeo.com/video/120076633" width="100%" height="100%" frameborder="0" title="" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        </div>
    </div>

    <br>
    <br>

    <div id="t3">
        <h2 class="verde0">Últimas Noticias</h2>
        <br />
        <br />

        <?php while($noticia = mysqli_fetch_array($grupo1)):?>
            <div class="cnt_noticia">
                <div class="noticia">
                    <a href="noticias.php"><?php	echo $noticia['titulo']; ?><br /></a>
                    <a href="noticias.php"><?php	echo $noticia['fecha']; ?></a><br />
                </div>
            </div>
        <?php endwhile; ?>

    </div>
</div>

<div class="remate"></div>