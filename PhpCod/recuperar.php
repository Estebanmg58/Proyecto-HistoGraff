<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


    require_once 'conexion.php';
    $email = $_REQUEST['email'];
    $sql = "SELECT usuario FROM administrador WHERE usuario = '$email'"; 
    $result = mysqli_query($conex, $sql);
    $row = mysqli_fetch_array($result);

    if(mysqli_num_rows($result) == 1){
        $token = uniqid();
        $sql = "UPDATE administrador SET token = '$token' WHERE usuario = '$email'";
        $act = mysqli_query($conex, $sql);

        $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'histograff.c13@gmail.com';                     // SMTP username
        $mail->Password   = 'HistoGraffc13';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('histograff.c13@gmail.com', 'HistoGraff');
        $mail->addAddress($email);     // Add a recipient

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "Recuperar Clave";
        $mail->Body    = "Hola, solicitaste cambiar tu contraseña, ingresa al siguiente link\n\n";
        $mail->Body .= "http://localhost:8080/histograff/PhpCod/confirmContrase%C3%B1a.php";
        $mail->CharSet = 'utf-8';
        $mail->send();
        
        echo "<script>
                alert('Te hemos enviado un email para cambiar tu contraseña');
                window.history.go(-1);
            </script>";
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado {$mail->ErrorInfo}";
    }

    }else {
        echo "<script>
                alert('Esta dirección de correo electrónico no existe, vuelve a intentar.');
                window.history.go(-1);
            </script>";
    }


mysqli_free_result($result);
mysqli_close($conex);

?>