<?php
    require_once('image-resizing.php');
    require_once('file-validator.php');

    class UploadImageFile {
        public $file = [];
        public $isFileUploaded = false;
        private const TARGET_FOLDER = '../images/';
        private const IMAGE_PATHS = [
            "imagenes/pequenas/",
            "imagenes/medianas/",
            "imagenes/grandes/"
        ];
        private const ALLOWED_PLACEHOLDERS = [
            'photo.png',
            'iconos/photo.png'
        ];

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
            $this->file['targetPath'] = static::TARGET_FOLDER . $this->file['validFileName'];
        }

        public function fileUpload($fileObject, $currentImageUrl) {
            $this->buildFileObject($fileObject);
            $this->errors = FileValidator::validateFile($this->file);

            $hasErrors = !empty($this->errors);
            $imagePathArr = explode('/', $currentImageUrl);
            $currentImage = end($imagePathArr);

            if (!$hasErrors) {
                // *** POR VALIDAR
                if ($currentImage != 'photo.png') $this->deleteExistingFiles();

                $this->isFileUploaded = $this->uploadFile();
            }

            return $this;
        }

        public function updateUrl($currentUrl) {
            preg_match('/fileUpload|errors/', $currentUrl, $matches, PREG_OFFSET_CAPTURE);

            if (!empty($matches)) {
                $x = explode('?', $currentUrl);
                $y = preg_replace('/(&fileUpload|&errors)=.+/', '', end($x));

                return "{$x[0]}?{$y}";
            }

            return $currentUrl;
        }

        public function getLocation($currentUrl, $errors) {
            $url = $this->updateUrl($currentUrl);
            $pathArr = explode('cms/', $url);
            $location = end($pathArr);

            if (!empty($errors)) {
                $errorsStr = implode('-', $errors);

                return '../' . $location . '&errors=' . urlencode($errorsStr);
            } else {
                return '../' . $location . '&fileUpload=successful';
            }
        }
    }

    if (isset($_POST['submit-img-btn'])) {
        $newFileUpload = new UploadImageFile();
        $file = $newFileUpload->fileUpload($_FILES, $_POST['image']);
        $fileVars = get_object_vars($file);
        $currentUrl = $_POST['currentUrl'];

        if ($fileVars['isFileUploaded'] == FALSE) {
            $url = $newFileUpload->getLocation($currentUrl, $fileVars['errors']);
        } else {
            // Image Resize;
            $newImagesSet = ImageResizeSet::createNewImagesSet(
                $fileVars['file']['targetPath'],
                [200, 300, 400]
            );

            $newImagesSetStr = implode(',', $newImagesSet);

            // private function updateTable() {
            // $q_txt = "UPDATE textos_contenidos SET imagen1 = '{$ruta1}', imagen2 = '{$ruta2}', imagen3 = '{$ruta3}' WHERE texto_id = $id";
            // $u_txt = mysql_query($q_txt, $connection);


            $url = $newFileUpload->getLocation($currentUrl, []);
        }

        header('Location: ' . $url);

        // return to page
    }

?>
