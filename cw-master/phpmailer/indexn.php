<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

function emailn($to, $subject, $body, $file){
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = -1;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.sendgrid.net';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'apikey';                 // SMTP username
    $mail->Password = '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';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
	$mail->SMTPOptions = array(
					'ssl' => array(
					'verify_peer' => false,
					'verify_peer_name' => false,
					'allow_self_signed' => true
						)
					);
    //Recipients
    $mail->setFrom('harsh61997@gmail.com', 'admin_cw');
	$mail->addAddress($to);			// Add a recipient
	
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject ;
    $mail->Body    = $body ;
    //$mail->AltBody = 'This Email is Sent on behalf of team correspondance world to inform you that our SMTP is set up and is woring as expected. Do Not Reply To This Email ';

    $mail->send();
	if($file == 0){
		echo 'accpeted' ;
	}
	else if($file == 1){
		echo 'rejected' ;
	}
} catch (Exception $e) {
    echo 'Email could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
}