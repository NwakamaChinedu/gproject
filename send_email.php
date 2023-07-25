<!-- send_email.php -->

<?php
//https://www.coderanks.com/articles/send-email-from-localhost-php reference 

// Define email server details
define('SMTP_HOST', 'smtp.example.com');
define('SMTP_PORT', 587);
define('SMTP_USERNAME', 'your_username');
define('SMTP_PASSWORD', 'your_password');

// // Use the constants in your email sending code
// $transport = (new Swift_SmtpTransport(SMTP_HOST, SMTP_PORT))
//     ->setUsername(SMTP_USERNAME)
//     ->setPassword(SMTP_PASSWORD);

// $mailer = new Swift_Mailer($transport);

// $message = (new Swift_Message($subject))
//     ->setFrom([$email => $name])
//     ->setTo([$to])
//     ->setBody($body, 'text/html');

// $result = $mailer->send($message);

// instanciate the variables
$name=$email=$subject=$message= "";

// Get form data
if(isset($_POST['submit'])){
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
}

// Set up email headers
$headers = "From: $name <$email>" . "\r\n";
$headers .= "Reply-To: $email" . "\r\n";
$headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

// Set up email body
$body = "<p><b>Name:</b> $name</p>";
$body .= "<p><b>Email:</b> $email</p>";
$body .= "<p><b>Subject:</b> $subject</p>";
$body .= "<p><b>Message:</b> $message</p>";

// Send email
$to = "leerix_b@yahoo.com"; // Replace with your own email address
$mail_sent = mail($to, $subject, $body, $headers);

// Check if mail was sent successfully
if ($mail_sent) {
    echo "Thank you for your message. We will get back to you soon!";
} else {
    echo "Sorry, something went wrong. Please try again later.";
}
?>
