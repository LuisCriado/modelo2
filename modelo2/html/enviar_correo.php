<?php
// Incluimos los archivos de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // Servidor SMTP
    $mail->SMTPAuth = true;
    $mail->Username = 'luisdcriado1@gmail.com'; // Tu correo
    $mail->Password = '19058275a'; // Contraseña o clave de aplicación
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('TU_CORREO@gmail.com', 'Tu Nombre');
    $mail->addAddress('luisdcriado1@gmail.com'); // Cambia esto al correo donde quieres recibir los mensajes.

    // Datos del formulario
    $nombre = $_POST['name'];
    $email = $_POST['email'];
    $asunto = $_POST['subject'];
    $mensaje = $_POST['message'];

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = $asunto;
    $mail->Body = "
        <h1>Nuevo mensaje del formulario</h1>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Mensaje:</strong> $mensaje</p>
    ";

    // Enviar el correo
    $mail->send();
    echo "¡Mensaje enviado con éxito!";
} catch (Exception $e) {
    echo "No se pudo enviar el mensaje. Error: {$mail->ErrorInfo}";
}
?>