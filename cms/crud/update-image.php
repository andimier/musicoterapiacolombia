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

    class ImageFileNameSet {
        static private $imageFileName = NULL;
        static private $temp_path = NULL;
        static private $imageFileBaseName = NULL;

        public function __construct($imageFile) {
            $this->imageFile = $_FILES['imageFile'];
            $this->tempPath = $imageFile['tmp_name'];
            $this->imageFileBaseName = basename($this->$imageFile['name']);
        }

        static private function getValidFileName() {
            // [^....] anything that is not in this group of characters
            return preg_replace('#[^a-z.0-9_-]#i', "-", $this->$imageFileBaseName);
        }

        static private function getFileExtension() {
            $imageFileBaseName = $this->getValidFileName();
            $ex_ext = explode('.', $fileName);

            return end($ex_ext);
        }

        static private function getFileErrors() {
            $errors = [];
            $validExtensionsArr = ['jpg','png'];
            $extension = $this->getFileExtension();

            if ($this->imageFile['error'] == 1) {
                array_push($errors, 'LARGE FILE');
            }

            if ($this->imageFile['error'] == 4) {
                array_push($errors, 'NOT AN IMAGE TYPE FILE');
            }

            if (file_exists('imagenes/pequenas/' . $imageFileBaseName)) {
                array_push($errors, 'FILE ALREADY EXISTS');
            }

            if (!in_array($extension, $validExtensionsArr)) {
                array_push($errors, 'NOTA VALID FILE EXTENSION');
            }

            return $errors;
        }

        static public function getFileNameSet() {
            $fileErrors = $this->getFileErrors();

            if (empty($fileErrors)) {
                return [
                    'imageFile' => $this->$imageFile,
                    'tempPath' => $this->$tempPath,
                    'imageFileBaseName' => $this->$imageFileBaseName,
                    'fileErrors' => $fileErrors
                ];
            }

            return ['fileErrors' => $fileErrors];
        }
    }

    class UploadImageFile {
        private static $existingFiles = [];

        private const IMAGE_PATHS = [
            "imagenes/pequenas/",
            "imagenes/medianas/",
            "imagenes/grandes/"
        ];

        private const ALLOWED_PLACEHOLDERS = [
            'photo.png',
            'iconos/photo.png'
        ];

        static private function getExistingFiles() {
            $arr = static::existingFiles;

            for ($i = 0; $i < 3; $i++) {
                $file = static::IMAGE_PATHS[$i] . $fileName;

                array_push($arr, $file);
            }

            return file_exists($file);
        }

        static private function deleteExistingFiles() {
            for ($i = 0; $i < 3; $i++) {
                unlink(static::IMAGE_PATHS[$i] . $fileName);
            }
        }

        static public function isFileUploaded() {
            $files = static::getExistingFiles();
            $fileExists = !empty($files);

            if ($fileExists) {
                echo 'FILE EXISTS <BR>';
                // delete existing files;
            }

            echo 'UPLOADING FILE <BR>';
            //return move_uploaded_file($temp_path, $destino);
        }
    }

    class UpdateImageTable {
        public static function getValue() {
            return 'the value';
        }

        private function updateTable() {
            if (UploadImageFile::isFileUploaded()) {
                $q_txt = "UPDATE textos_contenidos SET imagen1 = '{$ruta1}', imagen2 = '{$ruta2}', imagen3 = '{$ruta3}' WHERE texto_id = $id";
                $u_txt = mysql_query($q_txt, $connection);
            }

        }

        public static function isFileUploaded() {

        }
    }

    echo "hola";

    // crear nuevas los otros tamaños de las imégenes

?>
