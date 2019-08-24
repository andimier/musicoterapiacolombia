<?php
    require_once('image-resizing.php');

    class FileValidator {
        public $targetFolder = '../images/';

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

    class UploadImageFile {
        private const IMAGE_PATHS = [
            "imagenes/pequenas/",
            "imagenes/medianas/",
            "imagenes/grandes/"
        ];

        private const ALLOWED_PLACEHOLDERS = [
            'photo.png',
            'iconos/photo.png'
        ];

        private $file = [];

        private function getExistingFiles() {
            $arr = [];

            for ($i = 0; $i < count($this->IMAGE_PATHS); $i++) {
                $file = $this->IMAGE_PATHS[$i] . $this->file['validFileName'];

                array_push($arr, $file);
            }

            return $arr;
        }

        private function deleteExistingFiles() {
            $files = $this->getExistingFiles();

            for ($i = 0; $i < count($files); $i++) {
                unlink(static::IMAGE_PATHS[$i] . $files[$i]);
            }
        }

        private function uploadFile() {
            $tempPath = $this->file['temp_path'];
            $targetPath = $this->file['targetPath'];

            try {
                return move_uploaded_file($tempPath, $targetPath);
            } catch (Exception $e) {
                echo 'Excepción capturada: ' . $e;
            }
        }

        private function buildFileObject($fileObject) {
            $this->file['temp_path'] = $fileObject['newImageFileObject']['tmp_name'];
            $this->file['error'] = $fileObject['newImageFileObject']['error'];
            $this->file['name'] = $fileObject['newImageFileObject']['name'];
            $this->file['basename'] = basename($fileObject['newImageFileObject']['name']);
            $this->file['isFileUploaded'] = false;
            $this->file['validFileName'] = FileValidator::getValidFileName($this->file['basename']);
            // $this->file['targetPath'] = '../images/small/' . $this->file['validFileName'];
            $this->file['targetPath'] = $this->targetFolder . $this->file['validFileName'];
        }

        public function fileUpload($fileObject, $currentImageUrl) {
            $this->buildFileObject($fileObject);
            $this->errors = FileValidator::validateFile($this->file);

            $hasErrors = !empty($this->errors);
            $imagePathArr = explode('/', $currentImageUrl);
            $currentImage = end($imagePathArr);

            if (!$hasErrors) {
                if ($currentImage != 'photo.png') $this->deleteExistingFiles();

                $isFileUploaded = $this->uploadFile();

                return $this;
            } else {
                return $this->errors;
            }
        }
    }

    if (isset($_POST['submit-img-btn'])) {
        $newFileUpload = new UploadImageFile();
        $isFileUploaded = $newFileUpload->fileUpload($_FILES, $_POST['image']);

        if (is_bool($isFileUploaded) && $isFileUploaded == TRUE) {
            // crop;
            //ImageResizeSet::createNewImagesSet('../images/small/landscape.jpg');

            // private function updateTable() {
            //  $q_txt = "UPDATE textos_contenidos SET imagen1 = '{$ruta1}', imagen2 = '{$ruta2}', imagen3 = '{$ruta3}' WHERE texto_id = $id";
            //  $u_txt = mysql_query($q_txt, $connection);
            // }
        }

        if (is_array($isFileUploaded)) {
            $url = FileValidator::getLocationErrorsUrl($isFileUploaded);

            header('Location: ' . $url);
        }


    }
    // crear nuevas los otros tamaños de las imégenes

?>
