<?php
    class Section {
        static private $sectionId = NULL;

        private static function getSectionId() {
            if (isset($_GET['sectionId'])) return $_GET['sectionId'];

            echo 'The sectionId have not been set <br />';
        }

        private static function getSectionContentItems($sectionId) {
            global $pFunctions;

            $data = [];

            $qStr = "sectionId = {$sectionId}";
            $q = Utils::getRow('contentItems', $qStr, FALSE);

            if (isset($sectionId) && $q != null) {
                while ($d = $pFunctions->getFetchArray($q)) {
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

            $q = "id = " . self::getSectionId();
            $section = Utils::getRow('sections', $q, TRUE);
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