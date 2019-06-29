<?php
    $username = '';
    $password = '';
    $error_message = '';

    require_once("required/php_functions.php");
    require_once("includes/connection.php");
    require_once("includes/functions.php");

    function getErrors() {
        $errors = array();
        $required_fields = array('username','password');

        foreach($required_fields as $fieldname){
            if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname])  && !is_numeric($_POST[$fieldname]))) {
                $errors[] = $fieldname;
            }
        }

        return $errors;
    }

    function setErrorsMessages($errors) {
        $message = "<p>Hubo un error en el formulario";

        if (count($errors) > 1) $message = "<p>Hubo " . count($errors) . " errores en el formulario.";

        $message = "Por favor ingresa o corrige los siguientes campos: </p>";
        $message .= '<ul>';

        foreach($errors as $error){
            $message .= '<li>' . $error . '</li>';
        }

        $message .= '</ul>';

        return $message;
    }

    function getHPassword() {
        return trim(
            mysql_prep($_POST['password'])
        );

    }

    function getUsername() {
        $user = $_POST['username'];

        if (isset($user)) {
            return trim(
                mysql_prep($user)
            );
        }

        return '';
    }

    function getUser($connection) {
        $username = getUsername();
        $hashed_password = sha1(getHPassword());
        $q_string = "SELECT id, username FROM usuarios WHERE username = '{$username}' AND hashed_password = '{$hashed_password}'";

		return getPhpQuery($q_string, $connection);;
    }

    function initLogIn() {
        global $connection;
        $user = getUser($connection);

        if ($user) {
            $u = getFetchArray($user);

            $_SESSION['user_id'] = $u['id'];
            $_SESSION['username'] = $u['username'];

            header("Location: main.php");
            exit;
        }
    }

    if (!isset($_SESSION)) session_start();

    if (isset($_POST['submit'])) {
        if (empty(getErrors())) {
            initLogIn();
            $error_message = "El nombre de usuario o contraseña pueden estar errados.";
        } else {
            $error_message = setErrorsMessages(getErrors());
        }
    } else {
        if (isset($_GET['logout']) && $_GET['logout'] == 1) {
            $error_message = "Has cerrado tu sesión.";
        }
    }
?>