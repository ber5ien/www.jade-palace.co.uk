<?
include('admin/config.inc.php');
include('admin/SMLmailer.class.php');

/*
check address for basic validity (I have yet to find a perfect regex but this one work 99.9% of the time). if ok proceed, if not, return message and exit
if valid, insert in db with random md5 key of something (time?) and send email to address with link back to confirm.php
*/

function validate_email($email)
{
	// Create the syntactical validation regular expression
	$regexp = "^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$";

	// Presume that the email is invalid
	$valid = 0;

	// Validate the syntax
	if (eregi($regexp, $email))
	{
		$valid = 1;
	}
	else
	{
		$valid = 0;
	}

	return $valid;
}

if ($_POST[address]) // Submitting sub/unsub request from web page
{
	$email = $_POST[address];

	$blacklisted = false;
	$blacklist_query = "SELECT * FROM mailinglist_blacklist";
	$blacklist_result = mysql_query($blacklist_query) or die("Query failed : " . mysql_error());
	while ($blacklist_row = mysql_fetch_assoc($blacklist_result))
	{
		$pos = strpos($email, $blacklist_row[rule]);
		if ($pos !== false)
		{
			$blacklisted = true;
		}
	}

	if (validate_email($email) And !$blacklisted)
	{
		// Email is potentially valid
		// See if in db, if so, send unsub email
		// if not in db, insert record and send sub email

		$key = md5(time());
		$auth_link = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . "?address=$email&key=$key";
		$req_time = time();

		$query = "SELECT * FROM mailinglist_subscribers WHERE address = '$email'";
		$result = mysql_query($query) or die("Query failed : " . mysql_error());
		$num_rows = mysql_num_rows($result);

		if ($num_rows == 1) // Record exists in db, send unsub email
		{
			$row = mysql_fetch_assoc($result);

			if ($row[confirmed] == 1)
			{
				$subject = "Please confirm your unsubscribe request from $config[list_name]";
				$action = "unsubscribe from";
				$auth_link = "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . "?address=$email&key=$row[userkey]&c=0";
			}
			else
			{
				$subject = "Please confirm your subscribe request from $config[list_name]";
				$action = "subscribe to";
				$auth_link .= "&c=1";

				$query = "UPDATE mailinglist_subscribers SET userkey='$key', last_sub_req_date='$req_time' WHERE address = '$email'";
				$result = mysql_query($query) or die("Query failed : " . mysql_error());
			}
		}
		else // no record in db, insert record and send sub email
		{
			$query = "INSERT INTO mailinglist_subscribers VALUES ('$email', '$key', '0', '$req_time', '0')";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());

			$subject = "Please confirm your subscribe request to $config[list_name]";
			$action = "subscribe to";
			$auth_link .= "&c=1";
		}

		$message = "To confirm the request to $action the list: $config[list_name], ";
		$message .= "we ask that you follow this link:\n\n$auth_link\n\nIf you are unable to click ";
		$message .= "the link, please copy and paste it into your web browser.\n\n";
		$message .= "$config[owner_email]\n";

		$confirm = new SMLmailer;
		$confirm->subject = $subject;
		$confirm->mail_to = $email;
		$confirm->message = $message;
		$confirm->unsub_message = "";
		$confirm->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
		$confirm->send();

		$status_message = "A confirmation email has been sent to $email.";
	}
	else
	{
		// Email is invalid
		$status_message = "We're sorry, this email address seems to be invalid or it's not allowed to sign up for this list. 
					Please check the address and try again or email $config[owner_email] for assistance.";
	}

	echo $status_message;
}
elseif($_GET)	// Confirming a sub/unsub request from a link
{
	$email = trim($_GET[address]);
	$key = trim($_GET[key]);
	$confirm = trim($_GET[c]);

	$query = "SELECT * FROM mailinglist_subscribers WHERE address = '$email' AND userkey = '$key'";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());

	if(mysql_num_rows($result)) // The address and key match a record in the db. Proceed to verify request.
	{
		// if db has 0 and user has 0, that's an attempt to unsubscribe an unconfirmed address - denied
		// if db has 0 and user has 1, that's an attempt to confirm an unconfirmed address - allowed
		// if db has 1 and user has 0, that's an attempt to unsubscribe a confirmed address - allowed
		// if db has 1 and user has 1, that's an attempt to subscribe a confirmed address - denied

		$row = mysql_fetch_assoc($result);

		if($row[confirmed] == 0 And $confirm == 1)
		{
			// user is in db, email and key are correct, they have not confirmed so this is a confirmation,
			// update confirm and present message

			$query = "UPDATE mailinglist_subscribers SET confirmed = '1' WHERE address = '$email' AND userkey = '$key'";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());

			$confirm_message = "Thank you, your subscription to $config[list_name] has been confirmed. To unsubscribe at any time ";
			$confirm_message .= "just enter your email address below.\n";

			if($config['notify_on_confirm'])
			{
				// Count subscribers for admin email
				$count_query = "SELECT COUNT(*) FROM mailinglist_subscribers WHERE confirmed = '1'";
				$count_result = mysql_query($count_query) or die("Query failed : " . mysql_error());
				$count_confirmed = mysql_fetch_row($count_result);

				$admin_note = "$email has joined $config[list_name]. There are now $count_confirmed[0] members subscribing to this list.";

				$notify_confirm = new SMLmailer;
				$notify_confirm->subject = "$config[list_name] Subscription Confirmation";
				$notify_confirm->mail_to = $config['owner_email'];
				$notify_confirm->message = $admin_note;
				$notify_confirm->unsub_message = "";
				$notify_confirm->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
				$notify_confirm->send();
			}

			if($config['notify_user_on_confirm'])
			{
				$user_note = "Thank you for joining the $config[list_name] list.";

				$notify_user_confirm = new SMLmailer;
				$notify_user_confirm->subject = "$config[list_name] Subscription Confirmation";
				$notify_user_confirm->mail_to = $email;
				$notify_user_confirm->message = $user_note;
				$notify_user_confirm->unsub_message = "";
				$notify_user_confirm->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
				$notify_user_confirm->send();
			}
		}
		elseif($row[confirmed] == 1 And $confirm == 0)
		{
			// user is in db, email and key are correct, they were already confirmed so this is an unsubscribe req
			// remove user from db and present message

			$query = "DELETE FROM mailinglist_subscribers WHERE address = '$email' AND userkey = '$key'";
			$result = mysql_query($query) or die("Query failed : " . mysql_error());

			$confirm_message = "Thank you, you have been unsubscribed from $config[list_name].";

			if($config['notify_on_unsub'])
			{
				// Count subscribers for admin email
				$count_query = "SELECT COUNT(*) FROM mailinglist_subscribers WHERE confirmed = '1'";
				$count_result = mysql_query($count_query) or die("Query failed : " . mysql_error());
				$count_confirmed = mysql_fetch_row($count_result);

				$admin_note = "$email has unsubscribed from $config[list_name]. There are now $count_confirmed[0] members subscribing to this list.";

				$notify_unsub = new SMLmailer;
				$notify_unsub->subject = "$config[list_name] Unsubscription";
				$notify_unsub->mail_to = $config['owner_email'];
				$notify_unsub->message = $admin_note;
				$notify_unsub->unsub_message = "";
				$notify_unsub->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
				$notify_unsub->send();
			}

			if($config['notify_user_on_unsub'])
			{
				$user_note = "You have been successfully unsubsribed from the $config[list_name] list.";

				$notify_user_unsub = new SMLmailer;
				$notify_user_unsub->subject = "$config[list_name] Unsubscription Confirmation";
				$notify_user_unsub->mail_to = $email;
				$notify_user_unsub->message = $user_note;
				$notify_user_unsub->unsub_message = "";
				$notify_user_unsub->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
				$notify_user_unsub->send();
			}
		}
		else
		{
			// one of the two denied conditions above occurred.
			$confirm_message = "Error processing request. Please contact $config[owner_email] for assistance.\n";
		}
	}
	else
	{
		// No record found to confirm or unsubscribe in db
		$confirm_message = "Error processing request. Please contact $config[owner_email] for assistance.\n";
	}
	echo $confirm_message;
}


echo <<<EOT
<form method="POST" action="$PHP_SELF">
	<input type="text" name="address" size="20">
	<input type="submit" value="Submit" name="submit"><br>
	<font face="Tahoma" size="1">All subscribe/unsubscribe requests must be confirmed via email.</font>
</form>
EOT;
?>