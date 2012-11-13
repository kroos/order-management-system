<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
#############################################################################################################################
//*/
function send_email($recipient, $user, $subject, $message, $pop3_server, $pop3_port, $username, $password, $SMTP_auth, $smtp_server, $smtp_port, $SMTP_Secure, $addreplyto_email, $addreplyto_name, $from, $from_name)
	{
		require_once('phpmailer/class.phpmailer.php');
		require_once('phpmailer/class.pop3.php');

		$pop = new POP3();
		$pop->Authorise($pop3_server, $pop3_port, 30, $username, $password, 1);

		$mail = new PHPMailer();
		$mail->IsSMTP();
		//$mail->SMTPDebug  = 2;
		$mail->SMTPAuth   = $SMTP_auth;																// enable SMTP authentication
		$mail->Host       = $smtp_server;
		$mail->Port       = $smtp_port;																//change this port if you are using different port than mine
		$mail->SMTPSecure = $SMTP_Secure;

		$mail->Username   = $username;																//change this too
		$mail->Password   = $password;																//this too

		$mail->AddReplyTo($addreplyto_email,$addreplyto_name);
		$mail->IsHTML(TRUE);
		$mail->From = $from;
		$mail->FromName = $from_name;

		$mail->Subject = $subject;
		$mail->MsgHTML($message);
		$mail->AddAddress($recipient, $user);

		$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";		// optional, comment out and test

		if (!$mail->Send())
			{
				return $mail->ErrorInfo;
			}
			else
			{
				return TRUE;
			}
	}
//*/
#############################################################################################################################

?>