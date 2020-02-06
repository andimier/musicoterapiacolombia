<?php
    class Sections {
        public static function getSectionsData() {
            global $pFunctions;

            $section = Utils::getAllRows('sections');
            $data = [];

            if ($section && !empty($section)) {
                while ($d = $pFunctions->getFetchArray($section)) {
                    array_push($data, [
                        "sectionId" => $d['id'],
                        "sectionTitle" => $d['title'],
                        "sectionPosition" => $d['position']
                    ]);
                }

                return $data;
            }

            echo 'ERROR => NO SECTION <br />';
        }
    }

    $data = Sections::getSectionsData();
?>