<?php
    class Utils {
        public static function getContentType($type) {
            return [
                "section" => "sections",
                "content" => "contents",
                "text" => "texts"
            ][$type];
        }

        public static function replaceCharacters($str) {
            $arr = [
                "á" => "a",
                "é" => "e",
                "í" => "i",
                "ó" => "o",
                "ú" => "u",
                " " => "-"
            ];

            return str_replace(array_keys($arr), array_values($arr), $str);
        }

        function redirect_to($location = NULL) {
            if ($location != NULL) {
                header("Location: {$location}");
                exit;
            }
        }

        public static function getCurrentUrl() {
            return $_SERVER['REQUEST_URI'];
        }

        public static function mysql_prep($value){
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

        private static function getAllSectionsTypePage() {
            return 'components/edit-sections/edit-sections-html.php';
        }

        private static function getContentTypePage(){
            $editType = $_GET['contentType'];
            $parentFolder = 'components/edit-' . $editType;

            return $parentFolder . '/edit-' . $editType . '.php';
        }

        public static function getEditingComponent() {
            $contentType = $_GET['contentType'];
            $isContentTypeSet = isset($contentType);
            $pages = [
                "allSections" => self::getAllSectionsTypePage(),
                "section" => self::getContentTypePage(),
                "content" => self::getContentTypePage()
            ];

            return $pages[$contentType];
        }

        public static function getAllSections() {
            global $connection;
            global $pFunctions;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM sections",
                $connection
            );

            return $q;
        }

        public static function getMainImage($imageSet) {
            $mainImage = null;

            if (!empty($imageSet)) {
                $img_arr = explode($imageSet, ',');
                $mainImage = $img_arr[0];
            }

            return $mainImage;
        }

        public static function getRow($table, $qStr, $limit) {
            global $pFunctions;
            global $connection;

            $l = ($limit == TRUE) ? " LIMIT 1" : "";

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM $table WHERE " . $qStr . $l,
                $connection
            );

            return $q;
        }

        public static function getAllRows($table) {
            global $pFunctions;
            global $connection;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM $table",
                $connection
            );

            return $q;
        }
    }

    class SectionUtils {
        private static $sectionId = NULL;

        private static function filterData($data) {
            return array_filter($data, function($val) {
                return $val['id'] != self::$sectionId;
            });
        }

        private static function getSectionsData() {
            global $pFunctions;

            $sections = Utils::getAllSections();
            $data = [];

            if ($sections) {
                while ($s = $pFunctions->getFetchArray($sections)) {
                    array_push($data, [
                        'id' => $s['id'],
                        'title' => $s['title'],
                        'position' => $s['position'],
                        'url' => $s['url']
                    ]);
                }
            }

            return (self::$sectionId !== NULL) ? self::filterData($data) : $data;
        }

        private static function getUrls() {
            $data = self::getSectionsData();
            $urls = [];

            if (!empty($data)) {
                foreach ($data as $key => $val) {
                    array_push($urls, $val['url']);
                }
            }

            return $urls;
        }

        private static function getNormalStr($str) {
            $nTitle = Utils::replaceCharacters(trim($str));

            return strtolower(preg_replace('/[^A-Za-z0-9_-]/', '', $nTitle));
        }

        private static function getFilteredItems($title, $urls) {
            return array_filter($urls, function($val) use ($title) {
                return $val == $title;
            });
        }

        public static function getParsedURL($title, $sectionId) {
            self::$sectionId = $sectionId;

            $title = self::getNormalStr($title);
            $items = count(self::getFilteredItems($title, self::getUrls()));
            $n_title = NULL;

            if ($items > 0) {
                $n_title = $title . '-' . strval($items + 1);
            }

            return $n_title ? $n_title : $title;
        }
    }
?>