<?php
    require_once("../required/session.php");
    require_once("../required/connection.php");
    require_once("../required/php_functions.php");
    require_once("../required/utils.php");

    class UpdateTable {
        static private function getSectionId($key) {
            $arr = explode('-', $key);

            return end($arr);
        }

        static public function updateRow($post) {
            global $connection;

            $insertedContent = 'unsuccessful';
            $insertedId = NULL;
            $counter = 0;

            foreach ($post as $key => $val) {
                $sectionId = intval(self::getSectionId($key));
                $url = SectionUtils::getParsedURL($val, $sectionId);

                if (is_numeric($sectionId)) {
                    $q = "UPDATE sections SET title = '{$val}', url = '{$url}' WHERE id = $sectionId";
                    $r = mysqli_query($connection, $q);

                    if (mysqli_affected_rows($connection) == 1) {
                        $counter += 1;
                    }
                }
            }

            if ($counter >= 1) {
                $insertedContent = 'successful';
            }

            return  $insertedContent;
        }

        static private function deleteSectionContents($table, $sectionId) {
            global $connection;

            $q = "DELETE FROM $table WHERE sectionId = " . $sectionId;

            mysqli_query($connection, $q);
        }

        static public function deleteSections($post) {
            global $connection;

            if (isset($post)) {
                for ($i = 0; $i < count($post); $i++) {
                    $sectionId = $post[$i];

                    $q = "DELETE FROM sections WHERE id = " . $post[$i];
                    mysqli_query($connection, $q);

                    self::deleteSectionContents('contentItems', $sectionId);
                    self::deleteSectionContents('texts', $sectionId);
                }
            }
        }
    }

    if (isset($_POST['update-sections-table'])) {
        $filteredPost = array_filter($_POST, function($val) {
            return !is_array($val);
        });

        $update = UpdateTable::updateRow($filteredPost);

        if (isset($_POST['eliminar']) && !empty($_POST['eliminar'])) {
            UpdateTable::deleteSections($_POST['eliminar']);
		}

        header("Location: " . $_POST['currentUrl'] . "&contentUpdate={$update}");
    }
?>