<?php
    class FileValidator {
        public static function getValidFileName($fileBaseName) {
            /**
             * [^....] anything that is not in this group of characters
             */

            return preg_replace('#[^a-z.0-9_-]#i', "-", $fileBaseName);
        }

        private static function getFileExtension($fileBaseName) {
            $ex_ext = explode('.', $fileBaseName);

            return end($ex_ext);
        }

        public static function getLocationErrorsUrl($errors) {
            $pathArr = explode('cms/', $_POST['currentUrl']);
            $location = end($pathArr);
            $errorsStr = implode('-', $errors);

            return '../' . $location . '&errors=' . urlencode($errorsStr);
        }

        public static function validateFile($file) {
            $errors = [];
            $extension = static::getFileExtension($file['validFileName']);
            $validExtensionsArr = [
                'jpg',
                'jpeg',
                'png'
            ];

            if ($file['error'] == 1) {
                array_push($errors, 'LARGE FILE');
            }

            if ($file['error'] == 4) {
                array_push($errors, 'NOT AN IMAGE TYPE FILE');
            }

            if (file_exists($file['targetPath'])) {
                array_push($errors, 'FILE ALREADY EXISTS');
            }

            if (!in_array($extension, $validExtensionsArr)) {
                array_push($errors, 'NOTA VALID FILE EXTENSION');
            }

            return $errors;
        }
    }
?>