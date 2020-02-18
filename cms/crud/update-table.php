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
    }

    if (isset($_POST['update-sections-table'])) {
        $update = UpdateTable::updateRow($_POST);

        header("Location: " . $_POST['currentUrl'] . "&contentUpdate={$update}");
    }
?>