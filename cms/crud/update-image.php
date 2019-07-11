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
        private static function getValidFileName($fileBaseName) {
            // [^....] anything that is not in this group of characters
            return preg_replace('#[^a-z.0-9_-]#i', "-", $fileBaseName);
        }

        private static function getFileExtension($fileBaseName) {
            $ex_ext = explode('.', $fileBaseName);

            return end($ex_ext);
        }

        public static function validateFile($uploadedFileObject) {
            $error = $uploadedFileObject['newImageFileObject']['error'];
            $fileName = $uploadedFileObject['newImageFileObject']['name'];
            $fileBaseName = basename($uploadedFileObject['newImageFileObject']['name']);
            $filteredFileName = static::getValidFileName($fileBaseName);

            $errors = [];
            $validExtensionsArr = ['jpg','png'];

            if ($error == 1) {
                array_push($errors, 'LARGE FILE');
            }

            if ($error == 4) {
                array_push($errors, 'NOT AN IMAGE TYPE FILE');
            }

            if (file_exists('imagenes/pequenas/' . $fileBaseName)) {
                array_push($errors, 'FILE ALREADY EXISTS');
            }

            if (!in_array(static::getFileExtension($filteredFileName), $validExtensionsArr)) {
                array_push($errors, 'NOTA VALID FILE EXTENSION');
            }

            return [
                'fileName' => $filteredFileName,
                'error' => $errors
            ];
        }
    }

    class UploadImageFile {
        private $existingFiles = [];

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
            $arr = static::$existingFiles;

            for ($i = 0; $i < 3; $i++) {
                $file = static::IMAGE_PATHS[$i] . $fileName;

                array_push($arr, $file);
            }

            return file_exists($file);
        }

        private function deleteExistingFiles() {
            for ($i = 0; $i < 3; $i++) {
                unlink(static::IMAGE_PATHS[$i] . $fileName);
            }
        }

        public function fileUpload($uploadedFileObject) {
            $f = FileValidator::validateFile($uploadedFileObject);

            if (empty($f['errors'])) {
                $temp_path = $uploadedFileObject['newImageFileObject']['tmp_name'];
                $target_path ='images/small/' . $f['fileName'];

                $f['targetPath'] = $target_path;
                $f['isFileUploaded'] = false;

                echo 'UPLOADING FILE: ' . $f['fileName'] . '<BR>';

                // 1. borrar archivos
                // 2. subir nuevo
                // $isFileUploaded = move_uploaded_file($temp_path, $destino);

                return $f;
            }
        }
    }

    if (isset($_POST['submit-img-btn'])) {
        $newFileUpload = new UploadImageFile();

        $newFileUpload->fileUpload($_FILES);

        // private function updateTable() {
        //         $q_txt = "UPDATE textos_contenidos SET imagen1 = '{$ruta1}', imagen2 = '{$ruta2}', imagen3 = '{$ruta3}' WHERE texto_id = $id";
        //         $u_txt = mysql_query($q_txt, $connection);
        // }
    }
    // crear nuevas los otros tamaños de las imégenes

?>
