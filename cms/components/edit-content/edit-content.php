<?php
    class Content {
        static private function getSectionId() {
            if (isset($_GET['contentItemId'])) {
                return $_GET['contentItemId'];
            } else {
                echo 'The contentItemId have not been set <br />';
            }
        }

        static private function getContent() {
            $sectionId = self::getSectionId();

            $qStr = "id = {$sectionId}";
            $q = Utils::getRow('contentItems', $qStr, TRUE);

            if ($q) return $q;

            return 'Not a valid query';
        }

        private function getMainImage() {
            $mainImage = self::getContent()['contentImageSet'];

            if (empty($mainImage)) {
                $mainImage = 'iconos/photo.png';
            }

            return $mainImage;
        }

        private static function getTextData($contentId) {
            global $pFunctions;

            $qStr = "contentId = {$contentId}";
            $q = Utils::getRow('texts', $qStr, TRUE);
            $data = [];

            $parentUrl = "contentType={$_GET['contentType']}";
            $parentUrl .= "&contentItemId={$_GET['contentItemId']}";
            $parentUrl .= "&sectionTitle={$_GET['sectionTitle']}";

            if ($q) {
                while ($d = $pFunctions->getFetchArray($q)) {
                    $data = [
                        'textId' => $d['id'],
                        'title' => $d['title'],
                        'text' => $d['text'],
                        'parentUrl' => $parentUrl
                    ];
                }

                return $data;
            }

            return NULL;
        }

        static public function getContentData() {
            global $pFunctions;

            $data = [];
            $content = self::getContent();

            while ($d = $pFunctions->getFetchArray($content)) {
                $data = [
                    'title' => $d['title'],
                    'contentId' => $d['id'],
                    'textData' => self::getTextData($d['id']),
                    'contentImage' => [
                        "image" => Utils::getMainImage($d['contentImageSet']),
                        "contentId" => $d['id'],
                        "contentType" =>"section"
                    ],
                    //'linkUrl' => 'editar-subcontenido.php?contenido_id=' . $subContent['id'],
                ];
            }

            return $data;
        }
    }

    $data = Content::getContentData();
    require_once('components/edit-content/edit-content-html.php');
?>