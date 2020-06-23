

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HistoGraff</title>
</head>
<body>
    <?php

include ('conexion.php');

use  PHPMailer \ PHPMailer \ PHPMailer ; 
use  PHPMailer \ PHPMailer \ Exception ;

require  'PHPMailer/Exception.php'; 
require  'PHPMailer/PHPMailer.php'; 
require  'PHPMailer/SMTP.php';


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cel = $_POST['cel'];
$email = $_POST['email'];
$cantidad = $_POST['cantidad'];
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$total = 0;

$total = 35000 * intval($cantidad);

$captcha = $_POST['g-recaptcha-response'];

$secret = '6LflOuMUAAAAAL_65vlp5LTS2veRIHOwbD6_SBK0';

$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
    

$arr = json_decode($response, TRUE);

 

$inser = "INSERT INTO solicitar_tour(`id_solicitante`, `nombre`, `apellido`, `telefono`, `Email`, `cantidad`, `fecha_tour`, `hora_tour`, `idAdministrador`)
VALUES('$id','$nombre','$apellido','$cel','$email','$cantidad','$fecha','$hora','4567890')";

$insert2="INSERT INTO notificaciones(id,mensaje,fecha) VALUES ('','',now())";
$resultado2=mysqli_query($conex,$insert2);

$resultado = mysqli_query($conex, $inser);  


if (!$captcha){
    echo "<script>alert ('Por favor verifica el captcha');
    
    </script>";
} else if (!$resultado || !$arr['success']){
    echo "<script> alert ('Error al agendar verifique el captcha');
    
    </script>";
    echo $resultado;
} else if ($arr['success'] && $resultado){
    echo "<script> alert ('El tour se solicitó con éxito');
    
    </script>";

    $mail = new PHPMailer(true);

try {
                        
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'histograff.c13@gmail.com';                     
    $mail->Password   = 'HistoGraffc13';                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;                                    

    
    $mail->setFrom('histograff.c13@gmail.com', 'HistoGraff');
    $mail->addAddress($email);

    
    $mail->isHTML(true);                                  
    $mail->Subject = 'La solicitud del tour ha sido exitosa';
    $mail->Body    = 'Señor(a) ' .$nombre. ', cordial saludo. Este correo es enviado para la confirmación de su tour el día ' .$fecha. ' a las ' .$hora. 
    '. Y el valor del tour es de $' .$total. ', este dinero se tendrá que depositar mínimo dos días antes del tour a la cuenta de ahorros Bancolombia #01925465,
    y deberá enviar el soporte de pago al WhatsApp #3135314567. Muchas gracias por elegirnos, feliz día.';

    $mail->send();
} catch (Exception $e) {
    echo "<script> alert ('Hubo un error al enviar el mensaje, compruebe que la dirección de correo ingresada sea correcta: {$mail->ErrorInfo}');</script>";
}

} 


mysqli_close($conex);

?>
</body>
</html>
