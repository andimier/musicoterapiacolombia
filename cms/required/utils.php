<?php
    class Utils {
        private const CONTENT_TYPES = [
            'sections',
            'content',
            'text'
        ];

        function redirect_to($location = NULL) {
            if ($location != NULL) {
                header("Location: {$location}");
                exit;
            }
        }

        function mysql_prep($value){
            $magic_quotes_active = get_magic_quotes_gpc();
            $new_enough_php = function_exists("mysql_real_scape_string");

            if( $new_enough_php) {
                if ($magic_quotes_active) $value = stripslashes($value);

                $value = mysql_real_scape_string($value);
            } else {
                if (!$magic_quotes_active) $value = addslashes($value);
            }

            return $value;
        }

        function confirm_query($result_set) {
            global $connection;
            global $pFunctions;

            if (!$result_set) {
                die("La busqueda en la Base de Datos fallo: " . $pFunctions->getError($connection));
            }
        }

        public static function getEditingComponent() {
            $editType = isset($_GET['editType']) ? $_GET['editType'] : 'content';

            /*
                sections
                content
                text
            */

            if (isset($editType)) {
                $parentFolder = 'components/edit-' . $editType;
                $file = '/edit-' . $editType . '.php';

                return  $parentFolder . $file;
            }
        }

        function traer_seccion_por_id($seccion_id){
            global $connection;
            $query = "SELECT * FROM secciones WHERE id=" . $seccion_id ." LIMIT 1";

            $result_set = mysql_query($query, $connection);
            confirm_query($result_set);

            if($seccion = mysql_fetch_array($result_set)){
                return $seccion;
            }else{
                return NULL;
            }
        }

        function traer_publicacion_seleccionada(){
            global $publicacion_seleccionada;

            if(isset($_GET['publicacion_id'])){
                $sel_publicacion = $_GET['publicacion_id'];
                $publicacion_seleccionada = traer_publicacion_por_id($sel_publicacion);
            }
        }

        function todas_las_noticias(){
            global $connection;
            $query = "SELECT * FROM noticias ORDER BY fecha DESC";
            $grupo_noticias = mysql_query($query, $connection);

            confirm_query($grupo_noticias);
            return $grupo_noticias;
        }

        function traer_noticia_por_id($noticia_id){
            global $connection;
            $query = "SELECT * FROM noticias WHERE id =" . $noticia_id ." LIMIT 1";

            $result_set = mysql_query($query, $connection);
            confirm_query($result_set);

            if($contenido = mysql_fetch_array($result_set)){
                return $contenido;
            }else{
                return NULL;
            }
        }

        function traer_noticia_seleccionada(){
            global $noticia_seleccionada;

            if(isset($_GET['noticia_id'])){
                $sel_noticia = $_GET['noticia_id'];
                $noticia_seleccionada = traer_noticia_por_id($sel_noticia);
            }
        }



        //===============================  SECCION Y CONTENIDO SELECCIONADO ==========================//

        function encontrar_seccion_y_contenido_seleccionados(){

            global $seccion_seleccionada;
            global $contenido_seleccionado;

            if(isset($_GET['seccion'])){
                $sel_seccion = $_GET['seccion'];
                $seccion_seleccionada = traer_seccion_por_id($sel_seccion);

                $sel_contenido = "";
                $contenido_seleccionado = NULL;

            }elseif(isset($_GET['contenido_id'])){
                $sel_contenido = $_GET['contenido_id'];
                $contenido_seleccionado = traer_contenido_por_id($sel_contenido);

                $sel_seccion = "";
                $seccion_seleccionada = NULL;

            }else{
                $sel_seccion = "";
                $sel_contenido = "";
                $seccion_seleccionada = NULL;
                $contenido_seleccionado = NULL;
            }
        }

        //============================= ARTICULOS ====================================

        function traer_articulo_por_id($articulo_id){
            global $connection;
            $query = "SELECT * FROM articulos WHERE id=" . $articulo_id ." LIMIT 1";

            $result_set = mysql_query($query, $connection);
            confirm_query($result_set);

            if($articulo = mysql_fetch_array($result_set)){
                return $articulo;
            }else{
                return NULL;
            }
        }

        function traer_articulo_seleccionado(){
            global $articulo_seleccionado;

            if(isset($_GET['articulo_id'])){
                $sel_articulo = $_GET['articulo_id'];
                $articulo_seleccionado = traer_articulo_por_id($sel_articulo);
            }
        }

        //============  IMAGENES ARTICULOS ==================//

        function traer_imagenes_articulo_por_id($id){
            global $connection;
            $query = "SELECT * FROM imagenes_articulos WHERE articulo_id = $id";

            $grupo_imagenes_articulo = mysql_query($query, $connection);
            confirm_query($grupo_imagenes_articulo);
            return $grupo_imagenes_articulo;
        }
    }

    $utils = new Utils();

?>