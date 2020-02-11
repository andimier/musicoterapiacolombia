<?php
    class Section {
        static private function getSectionContents($sectionId) {
            global $pFunctions;
            global $connection;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM contentItems WHERE sectionId = " . $sectionId,
                $connection
            );

            return $q;
        }

        static private function getComponent($contentType) {
            return [
                "p" => 'components/paragraph/paragraph-html.php',
                "ul" => 'components/u-list/u-list-html.php',
                "ol" => 'components/u-list/o-list-html.php',
                "pe" => 'components/profile/profile-html.php'
            ][$contentType];
        }

        static private function getModule($contentType) {
            return [
                "p" => 'Paragraph',
                "ul" => 'UList',
                "ol" => 'OList',
                "pe" => 'Profile'
            ][$contentType];
        }

        static public function getContentItemsData() {
            global $pFunctions;
            $data = [];
            $content = self::getSectionContents($_GET['sectionId']);

            if ($content) {
                while ($d = $pFunctions->getFetchArray($content)) {
                    array_push($data, [
                        "contentId" => $d['id'],
                        "title" => $d['title'],
                        "contentType" => $d['contentType'],
                        "component" => self::getComponent($d['contentType']),
                        "module" => self::getModule($d['contentType'])
                        //"position" => $d['position'],
                    ]);
                }
            }

            return $data;
        }
    }

    $contentItems = Section::getContentItemsData();
?>