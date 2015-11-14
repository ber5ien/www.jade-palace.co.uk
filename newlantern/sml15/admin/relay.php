<?
include('config.inc.php');
include('SMLmailer.class.php');

// Run through all messages in the relay mailbox and build a queue of all messages found
// extract subject and body and send as SML owner

if ($config['allow_relay'])
{
	// Attempt to open mailbox and read headers
	$mbox = imap_open("{localhost:143}", $config['relay_mailbox'], $config['relay_password']);
	$headers = imap_sort($mbox,SORTDATE,1);

	foreach($headers as $key=>$val)
	{
		$relay_from = '';
		$relay_subject = '';
		$content_text = '';
		$content_html = '';

		$structure = imap_fetchstructure ($mbox, $val);

		// Get the structure of each message. Possible structure values are:
		// 0-text, 1-multipart, 2-message, 3-application, 4-audio, 5-image, 6-video, 7-other
		// We are only interested in 0 or 1. Once we have a message, check to see if it's plain text
		// (PLAIN), MIME text/html (ALTERNATIVE), or a message with attachment (MIXED). We ignore
		// Attachments and then check the message to see if it's PLAIN or ALTERNATIVE

		if($structure->type == "0" Or $structure->type == "1")
		{
			if($structure->ifsubtype)
			{
				if($structure->subtype == "PLAIN") // Plain text email
				{
					$headerinfo = imap_headerinfo($mbox, $val);
					$relay_from = $headerinfo->from[0]->mailbox . "@" . $headerinfo->from[0]->host;
					$relay_subject = $headerinfo->subject;
					$content_text = imap_fetchbody($mbox, $val, '1');
				}
				if($structure->subtype == "ALTERNATIVE") // MIME text/html email
				{
					$headerinfo = imap_headerinfo($mbox, $val);
					$relay_from = $headerinfo->from[0]->mailbox . "@" . $headerinfo->from[0]->host;
					$relay_subject = $headerinfo->subject;
					$content_text = imap_fetchbody($mbox, $val, '1');
					$content_html = imap_fetchbody($mbox, $val, '2');
				}
				if($structure->subtype == "MIXED") // MIME email with attachment
				{
					if($structure->parts[0]->subtype == "PLAIN")
					{
						$headerinfo = imap_headerinfo($mbox, $val);
						$relay_from = $headerinfo->from[0]->mailbox . "@" . $headerinfo->from[0]->host;
						$relay_subject = $headerinfo->subject;
						$content_text = imap_fetchbody($mbox, $val, '1');
					}
					if($structure->parts[0]->subtype == "ALTERNATIVE")
					{
						$headerinfo = imap_headerinfo($mbox, $val);
						$relay_from = $headerinfo->from[0]->mailbox . "@" . $headerinfo->from[0]->host;
						$relay_subject = $headerinfo->subject;
						$content_text = imap_fetchbody($mbox, $val, '1.1');
						$content_html = imap_fetchbody($mbox, $val, '1.2');
					}
				}
			}
		}

		if($structure->subtype == "PLAIN")
		{
			$texthtml = "text";
			$message = $content_text;
		}
		if($structure->subtype == "ALTERNATIVE")
		{
			$texthtml = "html";
			$message = $content_html;
		}
		if($structure->subtype == "MIXED")
		{
			if($structure->parts[0]->subtype == "PLAIN")
			{
				$texthtml = "text";
				$message = $content_text;
			}
			if($structure->parts[0]->subtype == "ALTERNATIVE")
			{
				$texthtml = "html";
				$message = $content_html;
			}
		}

		if (in_array($relay_from,$config['allow_relay_from']) Or empty($config['allow_relay_from']))
		{
			$curr_timestamp = time();
			$query = "SELECT address FROM mailinglist_subscribers WHERE confirmed = '1'";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());
			$sent_count = mysql_num_rows($result);
			if($config['use_queue'])
			{
				// check subject to see if a queue was set in the subject. If so, parse date pieces
				// and rewrite the subject without the queue info. If not, queue with current date/time
				if($relay_queue=strpos(trim($relay_subject),'[q]'))
				{
					list($year,$month,$day,$hour,$min) = explode("-",substr($relay_subject,$relay_queue+3,-4));
					$relay_subject = trim(substr($relay_subject,0,$relay_queue));

					$str = "$month/$day/$year $hour:$min";
					$queue_timestamp = strtotime($str); // strtotime handles dates/times w/o leading zeros fine

					// Compare current date/time to queue date/time if queue is before current, set queue to current
					if ($curr_timestamp > $queue_timestamp) $queue_timestamp = $curr_timestamp;
				}
				else
				{
					$queue_timestamp = $curr_timestamp;
				}

				// Insert message in queue - no need to stripslashes or mysql_real_escape_string
				$message_id = insert_message($relay_subject,$message,$curr_timestamp,$queue_timestamp,$sent_count,$texthtml);

				// Add subscribers to queue
				$address_result = get_confirmed_members();
				while ($address_row = mysql_fetch_assoc($address_result))
				{
					insert_recipients_into_queue($message_id,$address_row[address],$queue_timestamp);
				}
			}
			else
			{
				// Insert message in queue - no need to stripslashes or mysql_real_escape_string
				insert_message($relay_subject,$message,$curr_timestamp,$curr_timestamp,$sent_count,$texthtml);

				// not using the queue. send immediately
				// build list of confirmed recipients to bcc to (send to owner)
				$bcc = array();
				while ($row = mysql_fetch_assoc($result))
				{
					$bcc[] = "$row[address],";
				}
				$subscribers = implode(",",$bcc);

				$noqueue = new SMLmailer;
				$noqueue->mail_to =  $config['owner_email'];
				$noqueue->mail_from = $config['owner_email'];
				$noqueue->mail_bcc = $subscribers;
				$noqueue->subject = $relay_subject;
				$noqueue->message = stripslashes($message);
				$noqueue->is_HTML = ($texthtml == "html") ? true:false;
				$noqueue->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
				$noqueue->send();
			}

			// Mailing or queueing complete. Send email to the address the message came from confirming receipt and processing

			$confirm = new SMLmailer;
			$confirm->subject = "Simple Mailing List - Relay Receipt";
			$confirm->mail_to = $relay_from;
			$confirm->message = "Your message has been successfully received by Simple Mailing List ";
			$confirm->message .= "and is being processed.";
			$confirm->unsub_message = "";
			$confirm->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
			$confirm->send();
		}

		// Mark the message for deletion (doesn't delete the message, just marks it)
		imap_delete($mbox,$val);
	}

	imap_expunge($mbox);
	imap_close($mbox);
}
?>