<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//Load composer's autoloader
require 'vendor/autoload.php';

function email($to, $subject, $body, $file){
$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->SMTPDebug = -1;  // Enable verbose debug output
	$mail->addCustomHeader('X-custom-header', 'MIME-Version:1.0');
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
    $mail->setFrom('harsh61997@gmail.com', 'cw_admin');
	$mail->addAddress($to);			// Add a recipient
	
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject ;
    $mail->Body    = $body ;
    //$mail->AltBody = 'This Email is Sent on behalf of team correspondance world to inform you that our SMTP is set up and is woring as expected. Do Not Reply To This Email ';

    $mail->send();

		echo 'email has been sent' ;
		header('location: ./../../ncw/applications/'.$file) ;
} catch (Exception $e) {
    echo 'Email could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}
}