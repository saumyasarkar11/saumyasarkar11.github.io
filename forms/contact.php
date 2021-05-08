<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();
include '../includes/db.php'; 


require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = '';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '';                     // SMTP username
    $mail->Password   = '';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = '';                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('enquiry@ingeniva.co.in', Enquiry - Ingeniva);
    $mail->addAddress("saumyasarkar27@gmail.com", $_POST['name']);     // Add a recipient
   

    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $_POST['subject'].' - '.$_POST['email'];
    $main=$_POST['message'];
    
    $mail->Body    = '<pre style="font-size:12px; display: inline-block; word-wrap: break-word;">'.wordwrap($main, 175, "<br>").'</pre>';
   
    $result=$mail->send();
    
    if ($result['code']=="400"){
        $output .= html_entity_decode($result['full_error']);
    } else {
     $output.="Your message has been sent successfully. Thank you";
    echo $output;

	}
	
	
	

?>


