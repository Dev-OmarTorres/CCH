<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "ceceldirecc@gmail.com"; // Cambia esto al correo donde quieres recibir los mensajes
    $subject = htmlspecialchars($_POST["asunto"]);
    $message = htmlspecialchars($_POST["mensaje"]);
    $email = htmlspecialchars($_POST["correo"]);
    $name = htmlspecialchars($_POST["nombre"]);

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";

    $fullMessage = "<h3>Nuevo mensaje de contacto</h3>
                    <p><strong>Nombre:</strong> $name</p>
                    <p><strong>Correo:</strong> $email</p>
                    <p><strong>Asunto:</strong> $subject</p>
                    <p><strong>Mensaje:</strong> $message</p>";

    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "¡Mensaje enviado con éxito!";
    } else {
        echo "Hubo un error al enviar el mensaje.";
    }
}
?>
