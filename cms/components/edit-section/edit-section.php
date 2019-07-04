<?php
    class Section {
        static private $sectionId = NULL;

        private static function getSectionId() {
            if (isset($_GET['sectionId'])) return $_GET['sectionId'];

            echo 'The sectionId have not been set <br />';
        }

        private static function getSection() {
            global $connection;
            global $pFunctions;

            $sectionId = self::getSectionId();
            $q = NULL;

            if ($sectionId) {
                $q = $pFunctions->getPhpQuery("SELECT * FROM sections WHERE id = " . $sectionId);
            }

            if ($q) return $q;

            echo "ERROR => THE QUERY WASN NOT SUCCESSFUL <br />";
        }

        public static function getSectionData() {
            global $pFunctions;

            $section = self::getSection();
            $data = [];

            if ($section && !empty($section)) {
                while ($d = $pFunctions->getFetchArray($section)) {
                    $data = [
                        'title' => $d['title'],
                        'contentId' => $d['id'],
                        'contentImage' => Utils::getMainImage($d['contentImageSet']),
                        'position' => $d['position'],
                        'contents' => ''
                    ];
                }

                return $data;
            }

            echo 'ERROR => NO SECTION <br />';
        }

        public static function getSectionTitle() {
            return isset($_GET['sectionTitle']) ? urldecode($_GET['sectionTitle']) : 'NO SECTION TITLE';
        }
    }

    $data = Section::getSectionData();
    require_once('components/edit-section/section-html.php');
?>