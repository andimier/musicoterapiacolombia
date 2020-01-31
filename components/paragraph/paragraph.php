<?php
    class Paragraph {
        private function getContentText($contentId) {
            global $connection;
            global $pFunctions;

            $q = $pFunctions->getPhpQuery(
                "SELECT * FROM texts WHERE contentId = " . $contentId,
                $connection
            );

            return $q;
        }

        public function getContentData($contentId) {
            global $pFunctions;

            $content = $this->getContentText($contentId);
            $data = [];

            while ($d = $pFunctions->getFetchArray($content)) {
                $data = [
                    "textId" => $d['id'],
                    "title" => $d['title'],
                    "subtitle" => $d['subTitle'],
                    "text" => $d['text']
                ];
            }

            return $data;
        }
    }
?>