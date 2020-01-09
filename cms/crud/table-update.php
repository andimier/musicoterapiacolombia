<?php
    require_once("../required/session.php");
    require_once("../required/connection.php");

    class TableUpdate {
        static public function updateTable($table, $id, $content) {
            global $connection;

            $q = "UPDATE $table SET $content WHERE id = $id";
            $u_txt = mysqli_query($connection, $q);

            return mysqli_affected_rows($connection) == 1 ? TRUE : NULL;
        }

        static public function updateText($post) {
            if (isset($post['id'])) {
                $content = "title = '{$post['title']}',";
                $content .= "text = '{$post['item-text']}'";
                $updateSuccessStr = "successful";

                $textUpdate = self::updateTable('texts', $post['id'], $content);
                $parentUpdate = self::updateTable('contentItems', $post['contentId'], "title = '{$post['title']}'");

                if ($textUpdate == NULL && $parentUpdate == NULL) {
                    $updateSuccessStr = "unsuccessful";
                }

                header("Location: ../main.php?{$post['parentUrl']}&contentUpdate={$updateSuccessStr}");
            }
        }
    }

    if (isset($_POST['update-text-btn'])) {
        TableUpdate::updateText($_POST);
    }

?>