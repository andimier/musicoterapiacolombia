<?php
    function getPhpQuery($q_string, $connection) {
        $q = mysqli_query($connection, $q_string);

        if (isset($q)) return $q;

        if (mysqli_connect_errno()) echo 'NO CONNECTION';
        if (!isset($q)) echo 'NO MATCHING QUERY = ' . mysqli_error($connection);
    }
?>