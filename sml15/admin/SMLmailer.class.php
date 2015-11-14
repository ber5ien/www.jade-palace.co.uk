<?
class SMLmailer
{
	var $subject;
	var $use_SMTP;
	var $SMTP_server;
	var $SMTP_port;
	var $SMTP_domain;
	var $SMTP_username;
	var $SMTP_password;
	var $SMTP_from_address;
	var $SMTP_response;
	var $mail_to;
	var $mail_from;
	var $mail_bcc;
	var $mail_replyto;
	var $use_queue;
	var $is_HTML;
	var $message;
	var $success;
	var $list_name;
	var $unsub_url;
	var $send_message;
	var $headers;
	var $unsub_message;

	function SMLmailer()
	{
		$this->is_HTML = false; // Set default message type to text

		// Initialize these using config file variables by default. These can be overridden by user
		global $config; // give class access to config.inc.php variables

		$this->mail_from = $config['owner_email'];
		$this->mail_replyto = $config['owner_email'];
		$this->list_name = $config['list_name'];
		$this->unsub_url = $config['unsub_url'];
		$this->use_queue = false;
		$this->SMTP_port = $config['smtp_port'];
		$this->SMTP_server = $config['smtp_server'];
		$this->SMTP_domain = $config['smtp_domain'];
		$this->SMTP_username = $config['smtp_username'];
		$this->SMTP_password = $config['smtp_password'];
		$this->SMTP_from_address = $config['smtp_from_address'];
		$this->SMTP_response = array();
		
		$this->use_SMTP = false;
		$this->success = false;
		$this->message = '';	// Initialize original message;
		$this->headers = '';	// Initialize headers
		$this->send_message = '';	// Initialize sent message
		$this->unsub_message = "";
	}

	function send()
	{
		if ($this->is_HTML)
		{
			$boundary = md5(uniqid(time()));

			$this->message .= "<br /><br />" . $this->unsub_message;

			$this->headers = "Content-Type: multipart/alternative; boundary=\"$boundary\"" . SML_EOL;
			$this->headers .= "MIME-Version: 1.0" . SML_EOL;
			$this->send_message = "If you can read this then you should upgrade to a MIME complaint email reader - try Thunderbird." . SML_EOL;
			$this->send_message .= "--$boundary" . SML_EOL;
			$this->send_message .= "Content-type: text/plain;" . SML_EOL;
			$this->send_message .= "Content-Transfer-Encoding: 7bit" . SML_EOL . SML_EOL;
			$this->send_message .= strip_tags($this->message)  . SML_EOL;
			$this->send_message .= "--$boundary" . SML_EOL;
			$this->send_message .= "Content-type: text/html;" . SML_EOL;
			$this->send_message .= "Content-Transfer-Encoding: 7bit" . SML_EOL . SML_EOL;
			$this->send_message .= $this->message  . SML_EOL;
			$this->send_message .= "--$boundary--" . SML_EOL;
		}
		else
		{
			$this->headers = SML_EOL; // no headers needed for plain text
			$this->message .=  SML_EOL . SML_EOL . $this->unsub_message;
			$this->send_message = $this->message;
		}

		if($this->use_SMTP)
		{
			$SMTP_failure = false;
			$this->send_message = "From:$this->SMTP_from_address\r\nTo:$this->mail_to\r\nBcc:\r\nSubject:$this->subject\r\n$this->headers\r\n$this->send_message";

			$username = base64_encode($this->SMTP_username);
			$password = base64_encode($this->SMTP_password);

			// Attempt SMTP connection
			$this->smtp_connect($this->SMTP_server, $this->SMTP_port, 10);
			$this->SMTP_response['connect']['expected'] = array('220');
			$this->SMTP_response['connect']['received'] = substr(trim($this->get_smtp_response()),0,3);

			// Send EHLO command
			$this->send_smtp_command("EHLO $this->SMTP_domain", $this->handle);
			$this->SMTP_response['EHLO']['expected'] = array('250');
			$this->SMTP_response['EHLO']['received'] = substr(trim($this->get_smtp_response()),0,3);

			// Send AUTH LOGIN command
			$this->send_smtp_command("AUTH LOGIN", $this->handle);
			$this->SMTP_response['AUTH LOGIN']['expected'] = array('334');
			$this->SMTP_response['AUTH LOGIN']['received'] = substr(trim($this->get_smtp_response()),0,3);

			// Send username
			$this->send_smtp_command("$username", $this->handle);
			$this->SMTP_response['username']['expected'] = array('334');
			$this->SMTP_response['username']['received'] = substr(trim($this->get_smtp_response()),0,3);

			// Send password
			$this->send_smtp_command("$password", $this->handle);
			$this->SMTP_response['password']['expected'] = array('235');
			$this->SMTP_response['password']['received'] = substr(trim($this->get_smtp_response()),0,3);

			// Send MAIL FROM command
			$this->send_smtp_command("MAIL FROM: <$this->SMTP_from_address>", $this->handle); // proper format encloses address in brackets <address>
			$this->SMTP_response['MAIL FROM']['expected'] = array('250');
			$this->SMTP_response['MAIL FROM']['received'] = substr(trim($this->get_smtp_response()),0,3);

			if(!empty($this->mail_bcc))
			{
				$recipients = explode(",",$this->mail_bcc);
				foreach($recipients as $recipient)
				{
					$this->send_smtp_command("RCPT TO: <$recipient>", $this->handle); // proper format encloses address in brackets <address>
					$this->SMTP_response['RCPT TO']['expected'] = array('250','251');
					$this->SMTP_response['RCPT TO']['received'] = substr(trim($this->get_smtp_response()),0,3);
				}
			}
			else
			{
				// Send RCPT TO command
				$this->send_smtp_command("RCPT TO: <$this->mail_to>", $this->handle); // proper format encloses address in brackets <address>
				$this->SMTP_response['RCPT TO']['expected'] = array('250','251');
				$this->SMTP_response['RCPT TO']['received'] = substr(trim($this->get_smtp_response()),0,3);
			}

			// Send DATA command
			$this->send_smtp_command("DATA", $this->handle);
			$this->SMTP_response['DATA']['expected'] = array('354');
			$this->SMTP_response['DATA']['received'] = substr(trim($this->get_smtp_response()),0,3);

			// Send period(.) to end message
			$this->send_smtp_command("$this->send_message\r\n.", $this->handle);
			$this->SMTP_response['period']['expected'] = array('250');
			$this->SMTP_response['period']['received'] = substr(trim($this->get_smtp_response()),0,3);

			// Send QUIT command
			$this->send_smtp_command("QUIT", $this->handle);
			$this->SMTP_response['QUIT']['expected'] = array('221');
			$this->SMTP_response['QUIT']['received'] = substr(trim($this->get_smtp_response()),0,3);

			// After sending the QUIT command, run though all expected command replies and compare to epected
			foreach($this->SMTP_response as $commandcheck)
			{
				if (!in_array($commandcheck['received'],$commandcheck['expected'])) $SMTP_failure = true;
			}
			$this->success = !$SMTP_failure;
		}
		else
		{
			if (!$this->is_HTML) $this->headers = '';
			$this->headers .= "From: ".$this->mail_from."\r\nBcc:".$this->mail_bcc."\r\nReply-To:".$this->mail_replyto."\r\nX-Mailer:Chinese Mail";
			if(mail($this->mail_to, $this->subject, $this->send_message, $this->headers))
			{
				$this->success = true;
			}
		}
	}

	function smtp_connect($host, $port, $timeout)
	{
		$this->handle = fsockopen($host, $port, $errno, $errstr, $timeout);
		return $this->handle;
	}

	function send_smtp_command($command)
	{
		$data_to_send = $command . "\r\n";
		return fwrite($this->handle,$data_to_send);
	}

	function get_smtp_response()
	{
		$return = '';
		$line = '';
		$loops = 0;
		while((strpos($return,"\r\n")==false Or substr($line,3,1)!=' ') And $loops<100)
		{
			$line = @fgets($this->handle,512);
			$return .= $line;
			$loops++;
		}
		return $return;
	}
}
?>