<?php
    $nombre_archivo = "uryry-009---576rur.png";
    $nombre = preg_replace('#[^a-z.0-9_-]#i', "-", $nombre_archivo);

    echo $nombre;

    function saludo() {
        echo 'HEY';
    }

    saludo();

?>