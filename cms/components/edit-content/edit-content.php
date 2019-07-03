<?php
    class Section {
        private function getSectionId() {
            if (isset($_GET['sectionId'])) {
                return $_GET['sectionId'];
            } else {
                echo 'The sectionId have not been set <br />';
            }
        }

        private function getContent() {
            global $connection;
            global $pFunctions;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM contents WHERE sectionId = " . $this->getSectionId(),
                $connection
            );

            if ($q) {
                return $pFunctions->getFetchArray($q);
            }

            return 'Not a valid query';
        }

        private function getMainImage() {
            $mainImage = $this->getContent()['contentImageSet'];

            if (empty($mainImage)) {
                $mainImage = 'iconos/photo.png';
            }

            return $mainImage;
        }

        static public function getContentData() {
            global $pFunctions;

            $data = [];

            while ($d = self::getContent()) {
                $data = [
                    'title' => $d['title'],
                    'contentId' => $d['id']
                    //'linkUrl' => 'editar-subcontenido.php?contenido_id=' . $subContent['id'],
                ];
            }

            return $data;
        }
    }

    require_once('components/edit-content/edit-content-html.php');
?>