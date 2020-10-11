<?php
/**
 * Requires the PHP Mail Form library
 * The PHP Mail Form library is available only in the pro version of the template
 * The library should be uploaded to: lib/php-mail-form/php-mail-form.php
 * For more info and help: https://templatemag.com/php-mail-form/
 */
/*
if( file_exists($php_mail_form_library = '../lib/php-mail-form/php-mail-form.php' )) {
include( $php_mail_form_library );
} else {
die( 'Unable to load the PHP Mail Form Library!');
}

$contactform = new PHP_Mail_Form;
$contactform->ajax = true;

// Replace with your real receiving email address
$contactform->to = 'contact@example.com';
$contactform->from_name = $_POST['name'];
$contactform->from_email = $_POST['email'];
$contactform->subject = $_POST['subject'];

$contactform->add_message( $_POST['name'], 'From');
$contactform->add_message( $_POST['email'], 'Email');
$contactform->add_message( $_POST['message'], 'Message', 10);

echo $contactform->send();
 */
?>

<?php

// Replace with your real receiving email address
$from_name = $_POST['name'];
$from_email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

/*##########Script Information#########
# Purpose: Send mail Using PHPMailer#
#          & Gmail SMTP Server       #
# Created: 24-11-2019               #
#    Author : Hafiz Haider              #
# Version: 1.0                      #
# Website: www.BroExperts.com       #
#####################################*/

//Include required PHPMailer files
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';
require './phpmailer/Exception.php';
//Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//Create instance of PHPMailer
$mail = new PHPMailer();
//Set mailer to use smtp
//$mail->isSMTP();
//Define smtp host
$mail->Host = gethostbyname('smtp.gmail.com');
//Enable smtp authentication
$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
$mail->SMTPSecure = "tls";
//Port to connect smtp
$mail->Port = "587";
//Set gmail username
$mail->Username = "mkm9744@gmail.com";
//Set gmail password
$mail->Password = "mohit@17181920";
//Email subject
$mail->Subject = "Test email using PHPMailer";
//Set sender email
$mail->setFrom('mkm9744@gmail.com');
//Enable HTML
$mail->isHTML(true);
//Attachment
//    $mail->addAttachment('img/attachment.png');
//Email body
$mail->Body = "<h1>This is HTML h1 Heading</h1></br><p>This is html paragraph</p>";
//Add recipient
$mail->addAddress('kumarmkm9744@gmail.com');
//Finally send email
if ($mail->send()) {
    echo "Email Sent..!";
} else {
    echo "Message could not be sent. Mailer Error: $mail->ErrorInfo ";
}
//Closing smtp connection
$mail->smtpClose();

?>