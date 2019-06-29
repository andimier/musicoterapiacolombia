<?php
    function getPhpQuery($q_string, $connection) {
        $q = mysqli_query($connection, $q_string);

        if (isset($q) && is_object($q) && !empty($q) && mysqli_num_rows($q)) {
            return $q;
        } else {
            return NULL;
        }

        if (mysqli_connect_errno()) echo 'NO CONNECTION';

        if (!isset($q)) echo 'NO MATCHING QUERY = ' . mysqli_error($connection);
    }

    function getFetchArray($query){
        return mysqli_fetch_array($query);;
    }
?>