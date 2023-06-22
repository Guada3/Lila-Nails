<?php
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = $_POST["nombre"];
  $correo = $_POST["correo"];
  $mensaje = $_POST["mensaje"];
  $destinatario = "tu_correo@gmail.com";
  $asunto = "Nuevo mensaje de contacto";

  // Crear una nueva instancia de PHPMailer
  $mail = new PHPMailer();

  // Configurar el servidor SMTP
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com'; // Cambia esto según tu servidor de correo
  $mail->SMTPAuth = true;
  $mail->Username = 'contactlilanails@gmail.com'; // Tu dirección de correo electrónico
  $mail->Password = 'GuadaXD2014'; // Tu contraseña de correo electrónico
  $mail->SMTPSecure = 'tls';
  $mail->Port = 587;

  // Configurar los detalles del remitente y destinatario
  $mail->setFrom($correo, $nombre);
  $mail->addAddress($destinatario);

  // Establecer el asunto y el contenido del correo electrónico
  $mail->Subject = $asunto;
  $mail->Body = $mensaje;

  // Enviar el correo electrónico
  if ($mail->send()) {
    // Redireccionar a página de éxito o agradecimiento
    header("Location: gracias.html");
    exit;
  } else {
    echo "Hubo un error al enviar el mensaje.";
  }
}
?>
