<?php
session_start();
         $id=$_SESSION['cname'];
		 $conn=mysqli_connect("localhost","root","","billing");
		 $sql="select * from users where Firstname='$id'";
		 $query=mysqli_query($conn,$sql);
		 $row=mysqli_fetch_assoc($query);
		 $email=$row['username'];
$date=Date('ddmmyy');


use AfricasTalking\SDK\AfricasTalking;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require_once "PHPMailer/src/PHPMailer.php";
require_once "PHPMailer/src/Exception.php";
require_once "PHPMailer/src/SMTP.php";
require_once"vendor/autoload.php";

$mail = new PHPMailer(true);

try {
	$mail->SMTPDebug = 2;									
	$mail->isSMTP();											
	$mail->Host	 = 'smtp.gmail.com;';					
	$mail->SMTPAuth = true;							
	$mail->Username = 'vincentbettoh@gmail.com';				
	$mail->Password = 'ozbivcyqnaaclkdu';						
	$mail->SMTPSecure = 'tls';							
	$mail->Port	 = 587;
	$mail->setFrom("lochodo@gmail.com", "Billing Management System");		
	$mail->addAddress($email);	
	$mail->isHTML(true);								
	$mail->Subject = 'Monthly Bills';
	$mail->Body="Dear $id Your monthly bill has been processed on Date:$date. Please visit your portal tom make payments. Your Bill is due next week. Thankyou.";
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "Mail has been sent successfully!";

} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
