<?php
       // Incluir la libreria PHPMailer
       use PHPMailer\PHPMailer\PHPMailer;
       use PHPMailer\PHPMailer\Exception;
       use PHPMailer\PHPMailer\SMTP;

function enviaremail($from, $name, $to, $asunto, $mensaje){
  
        // Mostrar errores PHP (Desactivar en producción)
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        // Inicio
        $mail = new PHPMailer(true);

        try {
            // Configuracion SMTP
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
            $mail->isSMTP();                                               // Activar envio SMTP
            $mail->Host  = 'smtp.gmail.com';                     // Servidor SMTP
            $mail->SMTPAuth  = true;                                       // Identificacion SMTP
            $mail->Username  = 'proyectointegradoaroa@gmail.com';                  // Usuario SMTP
            $mail->Password  = '123Ab+++';	          // Contraseña SMTP
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port  = 25;
            $mail->setFrom($from, 'CINEMAX');                // Remitente del correo

            // Destinatarios
            $mail->addAddress($to, $name);  // Email y nombre del destinatario

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = $asunto;
            $mail->Body  = $mensaje;
            $mail->AltBody = $mensaje;
             $mail->send();
             $mensaje="Su mensaje ha sido enviado con exito!";
         
        } catch (Exception $e) {
            $mensaje="El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
        }
            return $mensaje;
    }
?>