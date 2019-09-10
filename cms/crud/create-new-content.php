<?php
    require_once("../required/session.php");
    require_once("../required/connection.php");

    class CreateNewContent {
        static private function getDate() {
            date_default_timezone_set('America/Bogota');

            return date("Y-m-j");
        }

        static public function createContent($post) {
            global $connection;

            $sectionId = $post['sectionId'];
            $parentItemID = 0;
            $contentType = $post['contentType'];
            $contentDesignType = isset($post['contentDesignType']) ? $post['contentDesignType'] : 'text';
            $galleryId = 0;
            $isSubContent = 0; // must make a function to see if is subcontent
            $visible = 1;
            $date = self::getDate();
            $title = $post['title'];
            $subtitle = '';
            $contentImageSet = 'iconos/photo.png';

            $query  = " INSERT INTO contentItems ";
			$query .= "(sectionId, parentItemID, contentType, contentDesignType, galleryId, isSubContent, visible, date, title, subtitle, contentImageSet) ";
			$query .= "	VALUES 	";
            $query .= "($sectionId, $parentItemID, '$contentType', '$contentDesignType', $galleryId, $isSubContent, $visible, '$date', '$title', '$subtitle', '$contentImageSet')";

            $r = mysqli_query($connection, $query);

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