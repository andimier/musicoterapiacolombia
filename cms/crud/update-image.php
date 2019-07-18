<?php

    // function redirect($tabla, $id, $subcontenido, $texto_id, $contenido){

    //     if($tabla=='secciones'){
    //         $redirect = 'Location: editar-seccion.php?seccion=' . $id;
    //     }elseif($tabla=='contenidos'){
    //         $redirect = 'Location: editar-contenido.php?contenido_id=' . $id;
    //     }else{
    //         $redirect = 'Location: editar-textos.php?sub-contenido='.$subcontenido.'&texto_id=' . $texto_id . '&contenido=' . $contenido;
    //     }
    //     return $redirect;
    // }

    class FileValidator {
        public static function getValidFileName($fileBaseName) {
            // [^....] anything that is not in this group of characters
            return preg_replace('#[^a-z.0-9_-]#i', "-", $fileBaseName);
        }

        private static function getFileExtension($fileBaseName) {
            $ex_ext = explode('.', $fileBaseName);

            return end($ex_ext);
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

            if (file_exists($file['fileTargetUrl'])) {
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

        private function uploadFile($fileObject) {

            // $isFileUploaded = move_uploaded_file($temp_path, $destino);
        }

        private function buildFileObject($fileObject) {
            $this->file['temp_path'] = $fileObject['newImageFileObject']['tmp_name'];
            $this->file['error'] = $fileObject['newImageFileObject']['error'];
            $this->file['name'] = $fileObject['newImageFileObject']['name'];
            $this->file['basename'] = basename($fileObject['newImageFileObject']['name']);
            $this->file['isFileUploaded'] = false;
            $this->file['validFileName'] = FileValidator::getValidFileName($this->file['basename']);
            $this->file['fileTargetUrl'] = 'images/small/' . $this->file['validFileName'];
        }

        public function fileUpload($fileObject, $currentImageUrl) {
            $this->buildFileObject($fileObject);
            $hasErrors = !empty(FileValidator::validateFile($this->file));
            $currentImage = end(explode('/', $currentImageUrl));

            if (!$hasErrors) {
                if ($currentImage != 'photo.png') $this->deleteExistingFiles();

                $this->uploadFile();

                echo 'UPLOADING FILE: ' . $this->file . '<BR>';
            }
        }
    }

    if (isset($_POST['submit-img-btn'])) {
        $newFileUpload = new UploadImageFile();

        $newFileUpload->fileUpload($_FILES, $_POST['image']);

        // private function updateTable() {
        //         $q_txt = "UPDATE textos_contenidos SET imagen1 = '{$ruta1}', imagen2 = '{$ruta2}', imagen3 = '{$ruta3}' WHERE texto_id = $id";
        //         $u_txt = mysql_query($q_txt, $connection);
        // }
    }
    // crear nuevas los otros tamaños de las imégenes

?>
