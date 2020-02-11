<?php
    class Nav {
        private static function getSections() {
            global $pFunctions;
            global $connection;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM sections ORDER BY position",
                $connection
            );

            return $q;
        }

        public static function getSectionLinksData() {
            global $pFunctions;

            $content = self::getSections();
            $data = [];

            while ($d = $pFunctions->getFetchArray($content)) {
                array_push($data, [
                    "sectionTitle" => $d['title'],
                    "position" => $d['position'],
                    "sectionId" => $d['id'],
                    "sectionUrl" => $d['url']
                ]);
            }

            return $data;
        }
    }
?>