<?php
    require_once("../required/connection.php");

    class TableUpdate {
        static public function updateTable($table, $id, $content) {
            global $connection;

            $q = "UPDATE $table SET $content WHERE id = $id";
            $u_txt = mysqli_query($connection, $q);
        }

        static public function updateText($post) {
            if (isset($post['id'])) {
                echo 'Actualizando textos';
            }
        }
    }

    if (isset($_POST['update-text-btn'])) {
        TableUpdate::updateText($_POST);
    }
?>