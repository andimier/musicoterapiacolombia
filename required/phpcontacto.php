<?php
    $message = "Tus datos han sido enviados correctamente!";
    $hostName = "Musicoterapia Colombia";
    $hostWebsite = "www.musicoterapiacolombia.com";
    $hostMail = "limefe18@gmail.com";
    //$hostMail = "andimier@gmail.com";
    $errorMessage = "Datos incompletos, por favor llena los campos e intenta de nuevo!";

    function getErrors() {
        $errores = [];
        $required_fields = array('nombre','correo', 'mensaje');

        foreach($required_fields as $fieldname){
            if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && !is_numeric($_POST[$fieldname]))) {
                $errores[] = $fieldname;
            }
        }

        return $errores;
    }

    function sendUserInfoToServer() {
        global $hostName;
        global $hostMail;

        $userName  = $_POST['nombre'];
        $userMessage = $_POST['mensaje'];
        $userMail = $_POST['correo'];
        $recipient = $hostMail;
        $subject = "Info Contacto";
        $body = "
            <html>
                <body>
                    <p>Esta información fue enviada por alguien que visitó tu sitio y quiere información adicional</p>
                    <h3>INFO DE CONTACTO DEL FORMULARIO DEL SITIO WEB</h3>
                    <h4>Correo: " . $userMail . " </h4>
                    <p>Nombre: " . $userName . " <p>
                    <p>Mensaje: <br /> " . $userMessage . "</p>
                </body>
            </html>";

        $headers = "From: <" . $userMail . ">\r\n";
        $headers .= "X-Mailer: PHP/" .phpversion(). "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";

        //echo $recipient . $subject . $body . $headers;

        mail($recipient, $subject, $body, $headers);
    }

    function sedUserAutomaticResponse() {
        global $hostName;
        global $hostWebsite;
        global $hostMail;

        $recipient = $_POST['correo'];
        $subject = "Gracias por enviarnos tus datos!";
        $automaticResponseBody = "
            <html>
                <body>
                    <h4>Gracias por tu tiempo.</h4>
                    <p>Estaremos respondiendo tu solicitud prontamente.</p>
                    <h3> " . $hostName . " | " . $hostWebsite . "</h3>
                </body>
            </html>";

        $headers = "From: " . strtoupper($hostName) . " <". $hostMail .">\r\n";
        $headers .= "X-Mailer: PHP/" .phpversion(). "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=iso-8859-1\r\n";

        //echo $recipient . $subject . $body . $headers;

        mail($recipient, $subject, $automaticResponseBody, $headers);
    }

    if (isset($_POST['enviarcontacto']) && empty(getErrors())) {
        sendUserInfoToServer();
        sedUserAutomaticResponse();
    }  else {
        $message = $errorMessage;
    }
?>