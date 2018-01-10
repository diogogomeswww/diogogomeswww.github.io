<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'diogo@diogogomes.pt'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Diogo Gomes Contact Form";

$email_body = "You have received a new message from your website, diogogomes.pt, contact form.\n\n";
$email_body .= "Here are the details:\n\n";
$email_body .= "<table>";
$email_body .= "<tr><td>Name:</td><td>$name</td></tr>";
$email_body .= "<tr><td>Email:</td><td>$email_address</td></tr>";
$email_body .= "<tr><td>Phone:</td><td>$phone</td></tr>";
$email_body .= "<tr><td>Message:</td><td>$message</td></tr>";
$email_body .= "</table>";

$headers = "From: noreply@diogogomes.pt\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
$mail = mail($to,$email_subject,$email_body,$headers);

return true;
?>
