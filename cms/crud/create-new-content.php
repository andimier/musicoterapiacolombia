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

            $query  = " INSERT INTO $table ";
			$query .= "(" . $columns . ") ";
			$query .= "	VALUES 	";
            $query .= "(" . $values . ")";

            $r = mysqli_query($connection, $query);
        }

        static private function getKeysQuery($data, $type) {
            $columns = $type == "keys" ? array_keys($data) : array_values($data);
            $columns_query = "";

            for ($i = 0; $i < count($columns); $i++) {
                $separator = ", ";
                $value = $columns[$i];

                if ($i == 0) {
                    $separator = "";
                }

                if ($type == "values" && $i != 0 && is_string($columns[$i])) {
                    $value = "'" . $columns[$i] . "'";
                }

                $columns_query = $columns_query . $separator . $value;
            };

            return $columns_query;
        }

        static public function createContent($post) {
            global $connection;

            $data = [
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

            $columns = self::getKeysQuery($data, "keys");
            $values = self::getKeysQuery($data, "values");

            self::insertTable('contentItems', $columns, $values);

            if (mysqli_affected_rows($connection) == 1) {
                header("Location: " . $post['currentUrl'] . "contentUpdate=successful");
            } else {
                header("Location: " . $post['currentUrl'] . "&contentUpdate=unsuccessful");
            }
        }
    }

    if (isset($_POST['crateContent']) && $_POST['sectionId']) {
        CreateNewContent::createContent($_POST);
    }

    global $connection;
    mysqli_close($connection);
?>