<?php
    class Nav {
        static private function getSections() {
            global $connection;
            global $pFunctions;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM sections ORDER BY id ASC"
            );

            return ($q) ? $q : NULL;
        }

        static public function getItemsData() {
            global $pFunctions;

            $sections = static::getSections();
            $data = [];

            if (!$sections) return NULL;

            while ($item = $pFunctions->getFetchArray($sections)) {
                array_push($data, [
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'position' => $item['position']
                ]);
            }

            return $data;
        }

        static public function getSectionUrl($navItem) {
            $url = 'main.php?';
            $url .= 'contentType=section';
            $url .= '&sectionId=' . $navItem['id'];
            $url .= '&sectionTitle=' . urlencode($navItem['title']);

            return $url;
        }
    }

    require_once('components/navigation/nav-html.php');
?>
