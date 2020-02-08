<?php
    class Sections {
        public static function getSectionsData() {
            global $pFunctions;

            $section = Utils::getAllRows('sections');
            $data = [
                'items' => [],
                'nextItemPosition' => 0
            ];

            if ($section && !empty($section)) {
                while ($d = $pFunctions->getFetchArray($section)) {
                    array_push($data['items'], [
                        "sectionId" => $d['id'],
                        "sectionTitle" => $d['title'],
                        "sectionPosition" => $d['position']
                    ]);
                }

                $data['nextItemPosition'] = count($data) + 1;

                return $data;
            }

            echo 'ERROR => NO SECTION <br />';
        }
    }

    $data = Sections::getSectionsData();
?>