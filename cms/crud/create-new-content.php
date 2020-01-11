<?php
    require_once("../required/session.php");
    require_once("../required/connection.php");

    class CreateNewContent {
        static private function getDate() {
            date_default_timezone_set('America/Bogota');

            return date("Y-m-j");
        }

        static private function insertTable($table, $columns, $values) {
            global $connection;

            $insertedContent = NULL;
            $insertedId = NULL;

            $query  = " INSERT INTO $table ";
			$query .= "(" . $columns . ") ";
			$query .= "	VALUES 	";
            $query .= "(" . $values . ")";

            $r = mysqli_query($connection, $query);

            if (mysqli_affected_rows($connection) == 1) {
                $insertedContent = 'successful';
                $insertedId = mysqli_insert_id($connection);
            }

            return [
                'insertedContent' => $insertedContent,
                'insertedId' => $insertedId
            ];
        }

        static private function buildData($data, $type) {
            $columns_query = "";

            for ($i = 0; $i < count($data); $i++) {
                $separator = ", ";
                $value = $data[$i];

                if ($i == 0) {
                    $separator = "";
                }

                if ($type == "values" && $i != 0 && is_string($data[$i])) {
                    $value = "'" . $data[$i] . "'";
                }

                $columns_query = $columns_query . $separator . $value;
            };

            return $columns_query;
        }

        static private function getQueryData($data) {
            return [
                'columns' => self::buildData(array_keys($data), 'columns'),
                'values' => self::buildData(array_values($data), 'values')
            ];
        }

        static private function getNewTextParameters($data, $contentId) {
            return [
                "columns" => "sectionId, contentId, title, subTitle, text",
                "values" => "" . $data['sectionId'] . ", $contentId, 'Cambia este título', 'Cambia este subtítulo', 'Cambia este texto'"
            ];
        }

        static private function getNewContentParams($post) {
            return [
                'sectionId' => $post['sectionId'],
                'parentItemID' => 0,
                'contentType' => $post['contentType'],
                'contentDesignType' => isset($post['contentDesignType']) ? $post['contentDesignType'] : 'text',
                'galleryId' => 0,
                'isSubContent' => 0, // must make a function to see if is subcontent
                'visible' => 1,
                'date' => self::getDate(),
                'title' => $post['title'],
                'subtitle' => "unset",
                'contentImageSet' => "iconos/photo.png"
            ];
        }

        static public function createContent($post) {
            global $connection;

            $updateSuccessStr = "unsuccessful";

            $data = self::getNewContentParams($post);
            $queryData = self::getQueryData($data);

            $contentTableInsertion = self::insertTable('contentItems', $queryData['columns'], $queryData['values']);

            // $textaTableParams = self::getNewTextParameters($data, $contentTableInsertion['insertedId']);

            // $textTableInsertion = self::insertTable('texts', $textaTableParams['columns'], $textaTableParams['values']);

            // if ($contentTableInsertion['insertedContent'] != NULL && $textTableInsertion['insertedContent'] != NULL) {
            //     $updateSuccessStr = "successful";
            // }

            if ($contentTableInsertion['insertedContent'] != NULL) {
                $updateSuccessStr = "successful";
            }

            header("Location: " . $post['currentUrl'] . "&contentUpdate={$updateSuccessStr}");
        }
    }

    if (isset($_POST['crateContent']) && $_POST['sectionId']) {
        CreateNewContent::createContent($_POST);
    }

    global $connection;
    mysqli_close($connection);
?>