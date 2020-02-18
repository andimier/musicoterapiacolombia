<?php
    require_once("../required/session.php");
    require_once("../required/connection.php");
    require_once("../required/php_functions.php");
    require_once("../required/utils.php");

    class CreateNewSection {

        public static function getUrl($currentUrl, $updateSuccessStr) {
            $url = $currentUrl;
            $qd = strpos($currentUrl, '&') ? '' : '&';

            if (strpos($currentUrl, 'contentUpdate')) {
                $arr = explode('contentUpdate', $currentUrl);
                $url = $arr[0];
            }

            return "${url}${qd}contentUpdate=${updateSuccessStr}";
        }

        public static function createSection($post) {
            global $connection;

            $insertedContent = NULL;
            $title = $post['title'];
            $url = SectionUtils::getParsedURL($title, NULL);
            $nextItemPosition = $post['nextItemPosition'];

            $q = "INSERT INTO sections (contentType, title, position, url, contentImageSet) ";
            $q .= " VALUES ('section', '${title}', $nextItemPosition, '${url}', 'default')";
            $r = mysqli_query($connection, $q);

            if (mysqli_affected_rows($connection) == 1) {
                $insertedContent = 'successful';
            } else {
                echo mysqli_error($connection);
            }

            return $insertedContent;
        }
    }

    if (isset($_POST['createSection']) && isset($_POST['nextItemPosition'])) {
        $new_section = CreateNewSection::createSection($_POST);
        $url = CreateNewSection::getUrl(
            $_POST['currentUrl'],
            $new_section != NULL  ?  'successful' : 'unseccessful'
        );

        header("Location: ${url}");

        global $connection;
        mysqli_close($connection);
    }
?>