<script>

    var navegacion = document.getElementById('navegacion'),
        col2 = document.getElementById('col2'),
        margen = navegacion.offsetWidth;

    col2.style.width = $(window).width() - margen + 'px';
    col2.style.marginLeft =  margen + 'px';
</script>
<script type="text/javascript" src="components/main-image/main-image.js"></script>
<script type="text/javascript" src="edicion/editortexto.js"></script>
<!-- <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script src="js/general.js" type="text/javascript"></script> -->
<script src="js/main.js" type="text/javascript"></script>
<script src="components/text-edit-form/text-edit.js" type="text/javascript"></script>