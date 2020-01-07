<?php
    class Section {
        static private $sectionId = NULL;

        private static function getSectionId() {
            if (isset($_GET['sectionId'])) return $_GET['sectionId'];

            echo 'The sectionId have not been set <br />';
        }

        private static function getQuery($query) {
            global $connection;
            global $pFunctions;

            $q = NULL;

            if ($query) {
                $q = $pFunctions->getPhpQuery($query);
            }

            if ($q) return $q;

            echo "ERROR => THE QUERY WASN NOT SUCCESSFUL <br />";
        }

        private static function getSection() {
            $sectionId = self::getSectionId();

            if ($sectionId) {
                $query = "SELECT * FROM sections WHERE id = " . $sectionId;

                return self::getQuery($query);
            }
        }

        private static function getSectionContentItems($sectionId) {
            global $pFunctions;

            $q = NULL;
            $data = [];

            if ($sectionId) {
                $query = "SELECT * FROM contentItems WHERE sectionId = " . $sectionId;
                $r = self::getQuery($query);

                while ($d = $pFunctions->getFetchArray($r)) {
                    array_push($data, [
                        'id' => $d['id'],
                        'creationDate' => $d['date'],
                        'title' => $d['title']
                    ]);
                }
            }

            return $data;
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
                        'position' => $d['position'],
                        'table' => 'sections',
                        'contents' => '',
                        'contentImage' => [
                            "image" => Utils::getMainImage($d['contentImageSet']),
                            "contentId" => $d['id'],
                            "contentType" =>"section"
                        ],
                        'contentItems' => self::getSectionContentItems($d['id'])
                    ];
                }

                return $data;
            }

            echo 'ERROR => NO SECTION <br />';
        }

        public static function getSectionTitle() {
            return isset($_GET['sectionTitle']) ? urldecode($_GET['sectionTitle']) : 'NO SECTION TITLE';
        }

        static public function getContentUrl($contentItem) {
            $section = self::getSectionTitle();

            $url = 'main.php?';
            $url .= 'contentType=content';
            $url .= '&contentItemId=' . $contentItem['id'];
            $url .= '&sectionTitle=' . preg_replace('/\s/ ', '-', $section);

            return $url;
        }
    }

    $data = Section::getSectionData();
    require_once('components/edit-section/section-html.php');
?>