<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail/src/Exception.php';
require 'mail/src/PHPMailer.php';
require 'mail/src/SMTP.php';

$mail = new PHPMailer(true); 
  
	//$mail->SMTPDebug = 2;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'cgs@cgstechlab.com';                 // SMTP username
    $mail->Password = 'pwupgeqllrsfgxpz';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('cgs@cgstechlab.com', 'CGS Website');
    $mail->addAddress('sonu@cgstechlab.com', 'Sales');     // Add a recipient
    
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'New Enquiry form website';
    
		$mail->Body  = !empty($_POST['name']) ? 'Name: '.$_POST['name'] .'<br>' : '';
    $mail->Body .= !empty($_POST['subject']) ? 'Subject: '.$_POST['subject'] .'<br>' : '';
    $mail->Body .= !empty($_POST['company']) ? 'Company: '.$_POST['company'] .'<br>' : '';
		$mail->Body .= !empty($_POST['email']) ? 'Email: '.$_POST['email'] .'<br>' : '';
    $mail->Body .= !empty($_POST['phone']) ? 'Phone: '.$_POST['phone'] .'<br>' : '';
    $mail->Body .= 'message:<br>';
		$mail->Body .= $_POST['message'];
		
		
	/* $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; */

    if (!$mail->Send()) {
	  echo "Error sending: " . $mail->ErrorInfo;;
	} else {
   echo 'Message Sent Successfully';
	}
	