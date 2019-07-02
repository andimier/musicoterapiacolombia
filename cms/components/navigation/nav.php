<?php
    class Navigation {
        function getSections() {
            global $connection;
            global $pFunctions;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM sections ORDER BY id ASC"
            );

            return ($q) ? $q : NULL;
        }

        function getItemsData() {
            global $pFunctions;

            $data = [];
            $sections = $this->getSections();

            if ($sections) {
                while ($item = $pFunctions->getFetchArray($sections)) {
                    array_push($data, [
                        'id' => $item['id'],
                        'title' => $item['title'],
                        'position' => $item['position']
                    ]);
                }

                return $data;
            }
        }
    }

    $nav = new Navigation();

    require_once('components/navigation/nav-html.php');
?>
