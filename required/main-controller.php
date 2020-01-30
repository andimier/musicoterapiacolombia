<?php
    class MainController {
        static private function getSectionContents($sectionId) {
            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM contentItems WHERE sectionId = " . $sectionId,
                $connection
            );

            return $q;
        }

        public static function getPage() {
            $page = 'pages/home/home-html.php';

            if (isset($_GET['sectionId'])) {
                $page = 'pages/section/section-html.php';
            }

            return $page;
        }
    }
?>