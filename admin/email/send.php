<?php
require '../../mainconfig.php';
require '../../lib/PHPMailer/PHPMailerAutoload.php';

if (isset($_POST['email']) AND isset($_POST['subject']) AND isset($_POST['message'])) {
    
    $mail = new PHPMailer;
    
    $mail->Host = opt_get('c210cF9ob3N0');
    $mail->SMTPAuth = true;
    $mail->Username = opt_get('c210cF91c2VybmFtZQ==');
    $mail->Password = opt_get('c210cF9wYXNzd29yZA==');
    $mail->SMTPSecure = 'tls';
    $mail->Port = opt_get('c210cF9wb3J0');
    
    $mail->setFrom(opt_get('c210cF9uYW1l'));
    $mail->addReplyTo(opt_get('c210cF9uYW1l'));
    $mail->isHTML(true);
    $mail->addAddress($_POST['email']);
    
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['message'];
    
    if(!$mail->send()){
        // echo 'Mailer Error: ' . $mail->ErrorInfo;
        echo '<font color="red">failed</fond>';
    } else {
        echo '<font color="green">success</fond>';
    }
}