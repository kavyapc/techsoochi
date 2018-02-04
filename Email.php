<?php

// $email and $message are the data that is being
// posted to this page from our html contact form
$email = $_REQUEST['email'] ;
$subject = $_REQUEST['subject'] ;
$message = $_REQUEST['message'] ;
$name = $_REQUEST['name'] ;
$phno = $_REQUEST['phone'] ;
// When we unzipped PHPMailer, it unzipped to
// public_html/PHPMailer_5.2.0
require('C:\xampp\htdocs\PHPMailer-master\PHPMailerAutoload.php');
//require 'PHPMailerAutoload.php'
$mail = new PHPMailer();

// set mailer to use SMTP
$mail->IsSMTP();

// As this email.php script lives on the same server as our email server
// we are setting the HOST to localhost
$mail->Host = "smtp.gmail.com";  // specify main and backup server
$mail->Port = 587;
$mail->SMTPAuth = true;     // turn on SMTP authentication

// When sending email using PHPMailer, you need to send from a valid email address
// In this case, we setup a test email account with the following credentials:
// email: send_from_PHPMailer@bradm.inmotiontesting.com
// pass: password
$mail->Username = "chaithragr.jacobian@gmail.com";  // SMTP username
$mail->Password = "8722679358"; // SMTP password
$smtp_debug = true;
// $email is the user's email address the specified
// on our contact us page. We set this variable at
// the top of this page with:
// $email = $_REQUEST['email'] ;
$mail->From = $email;

// below we want to set the email address we will be sending our email to.
$mail->AddAddress("chaithragr.jacobian@gmail.com", "8722679358");

// set word wrap to 50 characters
$mail->WordWrap = 50;
// set email format to HTML
$mail->IsHTML(true);

$mail->Subject = $subject;

// $message is the user's message they typed in
// on our contact us page. We set this variable at
// the top of this page with:
// $message = $_REQUEST['message'] ;
$mail->Body    = 'Message is:'.'&nbsp;&nbsp;&nbsp;&nbsp;'.$message.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'Phone no:'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$phno.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'Email Id:'.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$email;
$mail->AltBody = $message;
$mail->AddReplyTo = $email;
$mail->FromName = $name;
if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}

echo "Message has been sent";
?>