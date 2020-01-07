<div id="section" data-component="content">
<h2>Edición de Contenido</h2>
    <h1><?php echo $data['title']; ?></h1>

    <section>
        <?php require_once('components/main-image/main-image-html.php'); ?>
    </section>

    <!--
    ** Solo si hay subcontenidos

    <section id="insert-section">
        <h2>Insertar nuevo contenido</h2>
        <h3>Nuevo Contenido:</h3>

        <form enctype="multipart/form-data" method="post" action="edicion/insertar_contenidos.php">
            <input type="hidden" name="tabla" value="imagenes_publicaciones" />
            <input type="hidden" name="seccion_id" value="'.$seccion_id.'" />
            <input type="text"   name="titulo" value="" class="letra_azul borde_puntos" size="50" maxlength="50" />
            <input type="submit" name="insertar_contenido" id="insertar_contenido" class="fondo_azul" value="insertar contenido"/>
        </form>
    </section> -->

    <?php require_once('components/text-edit-form/text-edit-form-html.php'); ?>
    <script>

        var textLength = document.querySelector('#caja2').innerText.length;

        function parseLink(link, text) {
            var hRef = link.match(/href=[-_\/\w":.;?&=]+/);

            return "<a " + hRef + ">" + text + "</a>";
        }

        function getLinksText(link) {
            var div = document.createElement('DIV');
            div.innerHTML = link;
            var text = div.innerText;

            return text;
        }

        function getLinks(html, links) {
            var str = html;
            var linksLength = html.match(/<a/g) && html.match(/<a/g).length;

            if (linksLength) {
                for (var i = 0; i < linksLength; i++) {
                    var startIndex = str.indexOf('<a');
                    var endIndex = str.indexOf('</a>') + 4;
                    var link = str.slice(startIndex, endIndex);
                    var str = str.slice(endIndex);

                    var text = getLinksText(link);
                    var parsedLink = parseLink(link, text);

                    if (text) {
                        links.push({'link': parsedLink, 'text': text});
                    }
                }

                return links;
            }
        }

        function replaceText(textbox, links) {
            var text = textbox;

            for (var i = 0; i < links.length; i++) {
                text = text.replace(links[i].text, links[i].link);
            }

            return text;
        }

        document.querySelector('#caja2').addEventListener('input', function() {
            var text = this.innerText;

            if ((text.length - textLength) > 1) {
                var html = this.innerHTML;
                var links = getLinks(html, []);

                if (links) {
                    var newText = replaceText(this.innerText, links);
                    this.innerHTML = newText;

                    document.querySelector('textarea').value = newText;
                }
            }

            textLength = this.innerText.length;
        });
    </script>
</div>