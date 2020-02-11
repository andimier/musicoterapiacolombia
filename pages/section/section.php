<?php
    class Section {
        public static $title = '';

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

        static private function getSection() {
            global $pFunctions;
            global $connection;

            $section = $_GET['section'];

            $q = $pFunctions->getPhpQuery(
                "SELECT id, title FROM sections WHERE url = '${section}'",
                $connection
            );

            return $q;
        }

        static public function getContentItemsData() {
            global $pFunctions;
            $data = [];
            $content = NULL;
            $section = $pFunctions->getFetchArray(self::getSection());

            if ($section) {
                $sectionId = $section['id'];
                $content = self::getSectionContents($sectionId);
                self::$title = $section['title'];
            }

            if ($content) {
                while ($d = $pFunctions->getFetchArray($content)) {
                    array_push($data, [
                        "contentId" => $d['id'],
                        "title" => $d['title'],
                        "contentType" => $d['contentType'],
                        "component" => self::getComponent($d['contentType']),
                        "module" => self::getModule($d['contentType'])
                    ]);
                }
            }

            return $data;
        }
    }

    $contentItems = Section::getContentItemsData();
    $sectionTitle = Section::$title;
?>