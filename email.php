<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader NO BORRES VENDOR
require 'vendor/autoload.php';
//Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.hostinger.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'info@cotizacioneshoy.online';                     //SMTP 
    $mail->Password   = 'Karluncho2020';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients 
    $mail->setFrom( 'info@cotizacioneshoy.online', 'Cotizaciones Hoy'); // Hacer coincidir con el username. (preferentemente)
    $mail->addAddress('tengoganasdedormir01@gmail.com', 'Facu');     //Add a recipient
    //$mail->addAddress('ellen@example.com');               //Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name


    //NO TOQUES NADA ABAJO

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Consulta de: '.$_POST['nombre'];
   
    

    $mail->Body    = 
    'Nombre: '.$_POST['nombre'].
    '<br>Apellido: '. $_POST['apellido']. 
    '<br>Email: '.$_POST['email'].
    '<br>Telefono: '.$_POST['telefono'].
    '<br>Celular: '.$_POST['celular'];
   
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    //ACÁ ABAJO ESTÁN LOS MENSAJES DE SALIÓ EL MAIL Y ERROR

    $mail->send();
    header("location: gracias.html");
} catch (Exception $e) {
    // echo $e->getMessage();
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    header("location: error.html");
}

?>