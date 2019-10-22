<?php
    class MainImage {
        private static function parseData() {

        }

        public static function getData($contentData) {
            $contentData['btnValue'] = 'escoge una imagen';

            return $contentData;
        }
    }

    $mainImageDataArr = MainImage::getData($data['contentImage']);
?>