<?php

namespace Model;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{
    private $mail;

    public function __construct()
    {
        $this->mail = new PHPMailer(true);

        // Server settings
        $this->mail->isSMTP();
        $this->mail->Host = MAIL_HOST;
        $this->mail->SMTPAuth = true;
        $this->mail->Username = MAIL_USERNAME;
        $this->mail->Password = MAIL_PASSWORD;
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->mail->Port = MAIL_PORT;

        // Sender
        $this->mail->setFrom(MAIL_USERNAME, ucwords(APP_NAME));
    }

    public function send_email($to, $subject, $message)
    {
        try {
            $this->mail->addAddress($to);
            $this->mail->isHTML(true);
            $this->mail->Subject = $subject;
            $this->mail->Body    = $message;
            $this->mail->AltBody = strip_tags($message); // Optional: Plain text version
            $this->mail->send();
            return true;
            
        } catch (Exception $e) {
            return $this->mail->ErrorInfo;
        }
    }

    /** function to send email **/
	public function send_message($recipient, $subject, $message)
	{
		$message = $this->email_content($message);

		$this->send_email($recipient, $subject, $message);
	}

    /** function for email content**/
	public function email_content($data)
	{
		$file2Path = EMAIL_VIEW . '/content.view.php';
		$file2Content = file_get_contents($file2Path);
		$updatedContent = str_replace('Email content', $data, $file2Content);

		return $updatedContent;
	}
}
