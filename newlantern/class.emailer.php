<?

//class.emailer.php

class Emailer
{
	private $sender;
	private $recipient;
	private $subject;
	private $body;
	function __construct($sender)
	{
		$this->sender = $sender;
		$this->recipient = array();		
	}
	
	public function setSubject($subject)
	{
		$this->subject = $subject;
	}
	
	public function addRecipient($recipient)
	{
		array_push($this->recipient, $recipient);
	}
	
	public function setSender($sender)
	{
		$this->sender = $sender;
	}
	
	public function setBody($body)
	{
		$this->body = $body;
	}
	
	public function sendEmail()
	{
		foreach ($this->recipient as $recipient)
		{
			$result = mail($recipient, $this->subject, $this->body,
			"From: {$this->sender}\r\n");
			if ($result) echo ("Message sent to <b>{$recipient}</b><br>");
		}
	}
}

?>