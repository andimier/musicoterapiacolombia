<?php
    require_once("../required/session.php");
    require_once("../required/connection.php");

    class TableUpdate {
        static public function updateTable($table, $id, $content) {
            global $connection;

            $q = "UPDATE $table SET $content WHERE id = $id";
            $u_txt = mysqli_query($connection, $q);
        }

        static public function updateText($post) {
            if (isset($post['id'])) {
                $content = "title = '{$post['title']}',";
                $content .= "text = '{$post['item-text']}'";

                self::updateTable('texts', $post['id'], $content);

                // Update parent title
                self::updateTable('contentItems', $post['contentId'], "title = '{$post['title']}'");

                header("Location: ../main.php?{$post['parentUrl']}");
            }
        }
    }

    if (isset($_POST['update-text-btn'])) {
        TableUpdate::updateText($_POST);
    }

?>