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
            global $connection;
            global $pFunctions;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM contentItems WHERE id = " . self::getSectionId(),
                $connection
            );

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

        static public function getContentData() {
            global $pFunctions;

            $data = [];
            $content = self::getContent();

            while ($d = $pFunctions->getFetchArray($content)) {
                $data = [
                    'title' => $d['title'],
                    'contentId' => $d['id'],
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