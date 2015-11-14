<?
include('config.inc.php'); 
include('SMLmailer.class.php');

if (isset($config['queue_size']))
{
	// Select rows in queue ready for processing
	$curr_unix_time = time();
	$query = "SELECT * FROM mailinglist_queue WHERE send_after <= '$curr_unix_time' ORDER BY message_id ASC";
	if ($_GET['all'] != 1) $query .= " LIMIT 0, $config[queue_size]";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());

	while ($row = mysql_fetch_assoc($result))
	{
		// For each row in queue, get the message to be sent to it
		$message_query = "SELECT subject,message,format FROM mailinglist_messages WHERE id = '$row[message_id]'";
		$message_result = mysql_query($message_query) or die("Query failed : " . mysql_error());
		$message_row = mysql_fetch_assoc($message_result);

		// send message to address and delete from queue
		$consume = new SMLmailer;
		$consume->mail_to = $row[address];
		$consume->mail_from = $config['owner_email'];
		$consume->subject = $message_row[subject];
		$consume->message = $message_row[message];
		$consume->is_HTML = ($message_row[format] == "html") ? true:false;
		$consume->use_SMTP = ($config[use_SMTP] == 1) ? true:false;
		$consume->send();

		// mail sent, remove from queue
		$delete_query = "DELETE FROM mailinglist_queue WHERE message_id = '$row[message_id]' AND address = '$row[address]'";
		$delete_result = mysql_query($delete_query) or die("Query failed : " . mysql_error());
	}
	// query queue for latest total
	$count_query = "SELECT COUNT(*) FROM mailinglist_queue WHERE send_after <= '$curr_unix_time'";
	$count_result = mysql_query($count_query) or die("Query failed : " . mysql_error());
	$count = mysql_fetch_row($count_result);
	echo $count[0];
}
else
{
	echo "ERROR: queue_size not set in config.inc.php.";
}
?>