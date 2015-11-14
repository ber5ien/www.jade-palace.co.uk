<?
/*
----------------------------------------
Jade Palace Mailing List - Configuration file
----------------------------------------
The variables below are used for
configuring Jade Palace Mailing List.
----------------------------------------
*/


// ----------------------------------------------------
// 1. Database configuration variables (All required)
// ----------------------------------------------------

// Your database server (usually localhost)
$config['db_server'] = "jadepalace.db.6479645.hostedresource.com";

// A user that has access to your database
$config['db_user'] = "jadepalace";

// The password for the user that has access to your database
$config['db_password'] = "erzdfR12a33";

// The name of the database
$config['db_name'] = "jadepalace";


// -----------------------------------------------
// 2. List configuration variables (All required)
// -----------------------------------------------

// The name of your list. This will appear in the confirmation email body and subject line.
$config['list_name'] = "";

// The email address of the list owner. Messages will be sent from this address.
$config['owner_email'] = "admin@jade-palace.co.uk";

// 0 or 1. Make this a 1 if you would like to receive an email every time someone confirms their subscription.
$config['notify_on_confirm'] = 0;

// 0 or 1. Make this a 1 if you would like to receive an email every time someone unsubscribes.
$config['notify_on_unsub'] = 0;

// 0 or 1. Make this a 1 if you would like the user to receive an email after they confirm their subscription.
$config['notify_user_on_confirm'] = 0;

// 0 or 1. Make this a 1 if you would like the user to receive an email after they unsubscribe.
$config['notify_user_on_unsub'] = 0;

// URL to the page that contains your subscribe/unsubscribe form.
$config['unsub_url'] = "";

// Default message format (0=text, 1=html).
$config['default_format'] = 1;


// --------------------------------
// 3. Queue configuration variables
// --------------------------------

// Using a queue sends your message to each member individually. Not using the queue builds a list of addresses
// and sends your message to the list in the Bcc (blind carbon copy) field.
$config['use_queue'] = true;

// The number of email messages to send (per pass) when using the queue feature.
$config['queue_size'] = 1500;


// -------------------------------
// 4. Bounce maintenance variables
// -------------------------------

// 0 or 1. Set to zero to disable bounce checking, 1 to enable.
$config['check_bounces'] = 0;

// Email address (account) of mailbox to check for bounces
$config['bounce_mailbox'] = "";

// Password for above mailbox (account)
$config['bounce_password'] = "";


// -------------------------
// 5. Remote relay variables
// -------------------------

// 0 or 1. Set to zero to disable remote relay, 1 to enable.
$config['allow_relay'] = 0;

// An array of email addresses from which SML will relay messages. Leave empty to accept from any address.
$config['allow_relay_from'] = array();

// Email address (account) of mailbox to check for messages to relay
$config['relay_mailbox'] = "";

// Password for above mailbox (account)
$config['relay_password'] = "";


// -------------------------------
// 6. SMTP configuration variables
// -------------------------------

// 0 or 1. Whether to use SMTP(1) or sendmail(0). The default is sendmail(0).
$config['use_SMTP'] = 0;

// The SMTP server. For secure connections use the format ssl://smtp.gmail.com
$config['smtp_server'] = "";

// The domain you're sending from. Localhost is usually fine
$config['smtp_domain'] = "";

// The email address associated with the SMTP account
$config['smtp_from_address'] = "";

// The SMTP username. Commonly the email address
$config['smtp_username'] = "";

// The SMTP password
$config['smtp_password'] = "";

// The port to connect to your SMTP server on. Usually 25, 465, or 587
$config['smtp_port'] = "";

/*
----------------------------------------
That's it! Anything following this code
should not be changed unless you are
comfortable modifying PHP.
----------------------------------------
*/

$connection = mysql_connect($config['db_server'], $config['db_user'], $config['db_password']) or die("Could not connect : " . mysql_error());
mysql_select_db($config['db_name']) or die("Could not select database");

require_once("lang.inc.php");
define('SML_EOL', "\r\n");

function insert_message($subject,$message,$curr_timestamp,$queue_timestamp,$sent_count,$texthtml)
{
	if (((!empty($_GET) Or !empty($_POST)) And get_magic_quotes_gpc()) Or get_magic_quotes_runtime()) // Quotes in the message are automatically being escaped
	{
		$subject = strip_tags($subject);
	}
	else
	{
		$message = addslashes($message);
		$subject = strip_tags(addslashes($subject));
	}
	$query = "INSERT INTO mailinglist_messages (subject,message,created,queued,count,format) VALUES ('$subject','$message','$curr_timestamp','$queue_timestamp','$sent_count','$texthtml')";
	$result = mysql_query($query) or die("Query failed : " . mysql_error());
	return mysql_insert_id();
}

function get_confirmed_members()
{
	$address_query = "SELECT address FROM mailinglist_subscribers WHERE confirmed = '1'";
	$address_result = mysql_query($address_query) or die("Query failed[gfm] : " . mysql_error());
	return $address_result;
}

function get_confirmed_members_staustell()
{
	$address_query = "SELECT address FROM mailinglist_subscribers WHERE confirmed = '1' AND shop = 'St.Austell'";
	$address_result = mysql_query($address_query) or die("Query failed[gfm] : " . mysql_error());
	return $address_result;
}

function get_confirmed_members_roche()
{
	$address_query = "SELECT address FROM mailinglist_subscribers WHERE confirmed = '1' AND shop = 'Roche'";
	$address_result = mysql_query($address_query) or die("Query failed[gfm] : " . mysql_error());
	return $address_result;
}

function get_confirmed_members_truro()
{
	$address_query = "SELECT address FROM mailinglist_subscribers WHERE confirmed = '1' AND shop = 'Truro'";
	$address_result = mysql_query($address_query) or die("Query failed[gfm] : " . mysql_error());
	return $address_result;
}


function insert_recipients_into_queue($message_id,$address_row,$queue_timestamp)
{
	$queue_insert_query = "INSERT INTO mailinglist_queue (message_id,address,send_after) VALUES ('$message_id','$address_row','$queue_timestamp')";
	$queue_insert_result = mysql_query($queue_insert_query) or die("Query failed[iriq] : " . mysql_error());
	return $queue_insert_result;
}
?>
