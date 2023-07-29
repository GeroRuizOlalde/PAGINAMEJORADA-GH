<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars(trim($_POST["nombre"]));
    $asunto = htmlspecialchars(trim($_POST["asunto"]));
    $mensaje = htmlspecialchars(trim($_POST["mensaje"]));

    // Aquí agregamos el código para enviar el correo electrónico
    $destinatario = "gruiz-olalde@uade.edu.ar"; // Cambia esto por tu correo electrónico
    $asunto_email = "Nuevo mensaje de contacto: " . $asunto;
    
    $contenido = "Nombre: " . $nombre . "\r\n";
    $contenido .= "Asunto: " . $asunto . "\r\n";
    $contenido .= "Mensaje: " . $mensaje;
    
    // Configurar encabezados adicionales
    $headers = "From: no-reply@tudominio.com" . "\r\n";
    $headers .= "Reply-To: " . $nombre . "\r\n";
    $headers .= "X-Mailer: PHP/" . phpversion();
    
    // Enviar el correo electrónico
    if (mail($destinatario, $asunto_email, $contenido, $headers)) {
        echo "Mensaje enviado con éxito.";
    } else {
        echo "Error al enviar el mensaje. Intente nuevamente.";
    }
} else {
    // Redireccionar al formulario si el método no es POST
    header("Location: index.html");
    exit();
}

?>