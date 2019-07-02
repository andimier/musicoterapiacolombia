<?php
    class Section {
        function getSectionId() {
            if (isset($_GET['sectionId'])) {
                return $_GET['sectionId'];
            } else {
                echo 'The sectionId have not been set <br />';
            }
        }

        function getSectionContents() {
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

        function getSectionData() {
            global $pFunctions;

            $data = [];

            while ($d = $this->getSectionContents()) {
                $data = [
                    'title' => $d['title'],
                    'contentId' => $d['id']
                    //'linkUrl' => 'editar-subcontenido.php?contenido_id=' . $subContent['id'],
                ];
            }

            return $data;
        }

        function getMainImage() {
            $mainImage = $this->getSectionContents()['contentImageSet'];

            if (empty($mainImage)) {
                $mainImage = 'iconos/photo.png';
            }

            return $mainImage;
        }
    }

    $section = new Section();
    require_once('components/edit-content/edit-content-html.php');
?>