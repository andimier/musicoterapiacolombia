<?php
    require_once("../required/session.php");
    require_once("../required/connection.php");
    require_once("../required/php_functions.php");
    require_once("../required/utils.php");

    class CreateNewSection {

        private static function getSectionsData() {
            global $pFunctions;

            $sections = Utils::getAllSections();
            $data = [];

            if ($sections) {
                while ($s = $pFunctions->getFetchArray($sections)) {
                    array_push($data, [
                        'id' => $s['id'],
                        'title' => $s['title'],
                        'position' => $s['position'],
                        'url' => $s['url']
                    ]);
                }
            }

            return $data;
        }

        private static function getUrls() {
            $data = self::getSectionsData();
            $urls = [];

            if (!empty($data)) {
                for ($i = 0; $i < count($data); $i++) {
                    array_push($urls, $data[$i]['url']);
                }
            }

            return $urls;
        }

        private static function getNormalStr($str) {
            $nTitle = Utils::replaceCharacters($str);

            return strtolower(preg_replace('/[^A-Za-z0-9_-]/', '', $nTitle));
        }

        private static function getFilteredItems($title, $urls) {
            return array_filter($urls, function($val) use ($title) {
                return $val == $title;
            });
        }

        private static function getParsedURL($title) {
            $title = self::getNormalStr($title);
            $items = count(self::getFilteredItems($title, self::getUrls()));
            $n_title = NULL;

            if ($items > 0) {
                $n_title = $title . '-' . strval($items + 1);
            }

            return $n_title ? $n_title : $title;
        }

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
            $url = self::getParsedURL($title);
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